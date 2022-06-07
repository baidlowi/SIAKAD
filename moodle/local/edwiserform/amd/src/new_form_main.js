/*
 * Edwiser_Forms - https://edwiser.org/
 * Version: 0.1.0
 * Author: Yogesh Shirsath
 */
define([
    'jquery',
    'core/ajax',
    'core/notification',
    'core/templates',
    'local_edwiserform/efb_form_basic_settings',
    './iefixes',
    'local_edwiserform/formbuilder'
], function ($, ajax, notification, Templates) {

    var SELECTORS = {
        FORMTYPE: '#id_type',
        COMPONENT: 'local_edwiserform',
        FORM_STYLE: '.efb-form-style',
        RENDER_FORM: '.render-form',
        PANEL: '.efb-panel-btn',
        TEMPLATE_OVERLAY: '.efb-forms-template-overlay',
        TITLE: '#id_title',
        ACTIVE: 'active',
        FORM_TITLE: '#efb-form-title'
    };

    let container = document.querySelector('.build-form');
    let renderContainer = document.querySelector(SELECTORS.RENDER_FORM);
    let saved = false;
    var fastselect = null;
    var get_form_def;
    var get_form_settings;
    var formeo;
    let formeoOpts = {
        container: container,
        svgSprite: M.cfg.wwwroot + '/local/edwiserform/pix/formeo-sprite.svg',
        localStorage: false,
    };

    var PROMISES = {
        /**
         * Call moodle service edwiser_get_template
         * @param  {String}  type Type of form
         * @return {Promise}      Ajax promise call
         */
        GET_TEMPLATE: function(type) {
            return ajax.call([{
                methodname: 'edwiserform_get_template',
                args: {
                    name: type
                }
            }])[0];
        },
        /**
         * Call moodle service edwiser_get_template
         * @param  {Object}  settings JSON form settings
         * @param  {String}  formdef  JSON form definition
         * @return {Promise}          Ajax promise call
         */
        CREATE_NEW_FORM: function(settings, formdef) {
            return ajax.call([{
                methodname: "edwiserform_create_new_form",
                args: {
                    setting: settings,
                    formdef: formdef.toString()
                }
            }])[0];
        },
        /**
         * Call moodle service edwiser_get_template
         * @param  {Object}  settings form settings object
         * @param  {String}  formdef  JSON form definition
         * @return {Promise}          Ajax promise call
         */
        UPDATE_FORM: function(settings, formdef) {
            return ajax.call([{
                methodname: "edwiserform_update_form_settings",
                args: {
                    setting: settings,
                    formdef: formdef.toString()
                }
            }])[0];
        }
    };

    /**
     * Check whether admin/teacher can save current form
     * @return {Boolean} True is admin/teacher can save form
     */
    function can_save_form() {
        var status = check_template() && check_title(false) && !empty_form_definition();
        $('#efb-btn-save-form-settings').parents('.efb-editor-button').toggleClass('d-none', !status);
        $('.efb-form-save').toggleClass('d-none', !status);
        return status;
    }

    /**
     * Reset form definition to selected template
     */
    formeoOpts.resetForm = function() {
        formeo.dom.loading();
        var formtype = $(SELECTORS.FORMTYPE).val();
        PROMISES.GET_TEMPLATE(formtype)
        .done(function(response) {
            formeo.dom.loadingClose();
            if (response.status == true) {
                formeoOpts.container = container;
                formeo = new Formeo(formeoOpts, response.definition);
                return;
            }
        }).fail(function(ex) {
            formeo.dom.loadingClose();
            notification.exception(ex);
        });
    };

    /**
     * Get pro feature demo url of youtube video
     * @param  {string} video type of feature
     * @return {string}       Youtube embed video url
     */
    formeoOpts.get_pro_demo_url = function(video) {
        return videotypes.hasOwnProperty(video) ? videotypes[video] : videotypes['default'];
    };

    /**
     * Check whether template is selected or not
     * @return {Boolean} False if not selected
     */
    function check_template() {
        return $('.efb-forms-template.active').length > 0;
    }

    /**
     * Switch between panel
     * @param  {String} id Panel id
     */
    function switch_panel(id) {
        $(SELECTORS.PANEL).removeClass(SELECTORS.ACTIVE);
        $('#efb-' + id).addClass(SELECTORS.ACTIVE);
        $('.efb-tabcontent').removeClass(SELECTORS.ACTIVE);
        $('#efb-cont-' + id).addClass(SELECTORS.ACTIVE);
    }

    /**
     * Check title of form and prevent from switching template
     * @param  {Boolean} showError if true then error will be shown
     * @return {Boolean}           True if title is empty
     */
    function check_title(showError = true) {
        settings = get_form_settings();
        var active = $('.efb-panel-btn.active').attr('id');
        var emptytitle = settings.title != '';
        if (!showError) {
            return emptytitle;
        }
        if (!emptytitle) {
            switch(active) {
                case 'efb-form-setup':
                case 'efb-form-builder':
                case 'efb-form-preview':
                    switch_panel('form-settings');
                case 'efb-form-settings':
                    $(SELECTORS.TITLE).parents('.fitem').addClass('has-danger');
                    break;
            }
            formeo.dom.toaster(M.util.get_string('lbl-title-warning', SELECTORS.COMPONENT), 3000);
        } else {
            $('.efb-form-title-container').removeClass('has-danger');
            $(SELECTORS.TITLE).parents('.fitem').removeClass('has-danger');
        }
        return emptytitle;
    }

    /**
     * Get form settings
     * @return {Object} form settings
     */
    get_form_settings = function() {
        var type = $(SELECTORS.FORMTYPE).val();
        var data = {
            "title": $("#id_title").val(),
            "description": $("#id_description").val(),
            "type": type,
            "notifi_email": $("#id_notifi_email").val(),
            "message": $("#id_confirmation_msg").val(),
            "draftitemid": $('[name="confirmation_msg[itemid]"]').val(),
            "data_edit": $("#id_editdata").prop('checked')
        };
        return data;
    }

    /**
     * Get form definition from formeo object
     * @return {Object} Json form data
     */
    get_form_def = function() {
        return formeo.formData;
    }

    /**
     * Check if form is empty
     * @return {Boolean} True if empty
     */
    function empty_form_definition() {
        formdef = JSON.parse(get_form_def());
        return Object.keys(formdef.fields).length == 0;
    }

    /**
     * Call ajax service to save form settings
     * @param {String}   action     Service name
     * @param {Object}   settings   Form settings
     * @param {String}   formdef    Form definition
     * @param {Function} callable   Callback function
     */
    function save_form_settings(action, settings, formdef, callable) {
        (action == 'create' ? PROMISES.CREATE_NEW_FORM(settings, formdef) : PROMISES.UPDATE_FORM(settings, formdef))
        .done(callable).fail(function (ex) {
            formeo.dom.alert('danger', ex.message);
        });
    }

    /**
     * Change heading of form
     * @param  {String} formName Name of form
     */
    function change_heading(formName) {
        $(".efb-form-title").text(formName);
        $(".efb-editor-action").toggleClass("efb-hide", formName.length < 0);
        if (formName.length < 0) {
            $("#id_error_template_title").show();
        } else {
            $("#id_error_template_title").hide();
        }
    }

    /**
     * Select clicked/choosen template
     * @param  {String} formtype Form type
     * @param  {String} template template definition
     */
    function select_template(formtype, template = '') {
        $(SELECTORS.FORMTYPE).val(formtype);
        var changeEvent = new CustomEvent("change", {target: $(SELECTORS.FORMTYPE)[0]});
        $(SELECTORS.FORMTYPE)[0].dispatchEvent(changeEvent);
        formeoOpts.container = container;
        formeo = new Formeo(formeoOpts, template);
        $("#efb-form-settings").trigger('click');
    }

    /**
     * Innitialize form events
     */
    function initializeEvents() {
        $('.efb-form-style-container .controls-toggle').click(function() {
            $(this).parents('.preview-form').toggleClass('show-styles');
            $('#efb-cont-form-builder .formeo-controls').closest('.build-form').toggleClass('hidden-controls');
        });
        $(SELECTORS.FORM_STYLE).mouseenter(function() {
            $('.form-style-preview').attr('src', $(this).find('img').attr('src')).css('top', $(this).offset().top).show();
        }).mouseleave(SELECTORS.FORM_STYLE, function() {
            $('.form-style-preview').attr('src', '').hide();
        });

        let label = $('#id_allowsubmissionsfromdate_enabled').parent();
        let container = $(label).parent();
        label.detach().prependTo(container);
        label = $('#id_allowsubmissionstodate_enabled').parent();
        container = $(label).parent();
        label.detach().prependTo(container);

        $('.efb-settings-tab-list-item').click(function() {
            $('.efb-settings-tab-list-item').removeClass(SELECTORS.ACTIVE);
            $(this).addClass(SELECTORS.ACTIVE);
            $('.efb-settings-tab').removeClass(SELECTORS.ACTIVE);
            $('#' + $(this).data('target')).addClass(SELECTORS.ACTIVE);
        });

        $(document).on('formeoUpdated', function(event) {
            can_save_form();
        });
        $(document).on('controlsCollapsed', function(event) {
            $('.efb-form-step-preview').toggleClass('collapsed', event.detail.collapsed);
        });

        $(".efb-form-step").click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('#' + id).click();
        });
        $(".efb-panel-btn").click(function (event) {
            if (!check_template()) {
                formeo.dom.toaster(M.util.get_string('select-template-warning', SELECTORS.COMPONENT), 3000);
                switch_panel('form-setup');
                event.preventDefault();
                return;
            }
            var id = $(this).attr('id');
            if (id != 'efb-form-setup' && id != 'efb-form-settings' && !check_title()) {
                return 0;
            }
            can_save_form();
            var eleCont = $(this).data("panel");
            $("#efb-form-settings, #efb-form-builder, #efb-form-preview, #efb-form-setup").removeClass("active");
            $("#efb-cont-form-settings, #efb-cont-form-builder, #efb-cont-form-preview, #efb-cont-form-setup").removeClass("active");

            $(eleCont).addClass("active");
            $(this).addClass("active");
            $(".efb-forms-panel-heading").text($(this).data("panel-lbl"));

            if ("#efb-cont-form-preview" == eleCont) {
                formeo.render(renderContainer);
            }
        });

        // This will save the form settings using ajax.
        $("body").on("click", "#efb-btn-save-form-settings", function (event) {
            if (!check_template()) {
                formeo.dom.toaster(M.util.get_string('select-template-warning', SELECTORS.COMPONENT), 3000);
                switch_panel('form-setup');
                event.preventDefault();
                return;
            }
            if (!check_title() || !formeo.validator.validate()) {
                return 0;
            }
            var settings = get_form_settings();
            var formdef = get_form_def();
            var formid = $("[name='id']").val();
            var action = "create";
            var form_create_action = function (response) {
                if (response.status == true) {
                    saved = true;
                    window.onbeforeunload = null;
                    formeo.dom.alert('success', response.msg, function() {
                        formeo.reset();
                        $(location).attr('href', M.cfg.wwwroot + "/local/edwiserform/view.php?page=listforms");
                    });
                    setTimeout(function() {
                        $(location).attr('href', M.cfg.wwwroot + "/local/edwiserform/view.php?page=listforms");
                    }, 4000);
                } else {
                    formeo.dom.alert('danger', response.msg);
                }
            }
            if (formid) {
                var form_update_action = function (response) {
                    if (response.status == true) {
                        window.onbeforeunload = null;
                        formeo.dom.multiActions(
                            'success',
                            M.util.get_string("success", SELECTORS.COMPONENT),
                            response.msg,
                            [{
                                title: M.util.get_string("heading-listforms", SELECTORS.COMPONENT),
                                type: 'primary',
                                action: function() {
                                    $(location).attr('href', M.cfg.wwwroot + "/local/edwiserform/view.php?page=listforms");
                                }
                            }, {
                                title: M.util.get_string("close", SELECTORS.COMPONENT),
                                type: 'default'
                            }]
                        );
                    } else {
                        formeo.dom.alert('danger', response.msg);
                    }
                }
                formeo.dom.multiActions(
                    'warning',
                    M.util.get_string("attention", SELECTORS.COMPONENT),
                    M.util.get_string("forms-update-confirm", SELECTORS.COMPONENT),
                    [{
                        title: M.util.get_string("forms-update-create-new", SELECTORS.COMPONENT),
                        type: 'primary',
                        action: function() {
                            save_form_settings(action, settings, formdef, form_create_action);
                        }
                    }, {
                        title: M.util.get_string("forms-update-overwrite-existing", SELECTORS.COMPONENT),
                        type: 'warning',
                        action: function() {
                            action = "update";
                            settings["id"] = formid;
                            save_form_settings(action, settings, formdef, form_update_action);
                        }
                    }]
                );
                return;
            }
            if (!saved) {
                save_form_settings(action, settings, formdef, form_create_action);
            } else {
                formeo.dom.toaster(M.util.get_string('form-setting-saved', SELECTORS.COMPONENT), 3000);
            }
        });

        $(SELECTORS.FORM_TITLE).keyup(function () {
            var formName = $(this).val();
            var empty = formName == '';
            $(this).parent().toggleClass('has-danger', empty);
            $("#id_title").val(formName);
            change_heading(formName);
        }).change(function() {
            can_save_form();
        });
        $("#id_title").keyup(function () {
            var formName = $(this).val();
            $("#id_title").val(formName);
            change_heading(formName);
        }).change(function() {
            var formName = $(this).val();
            $(SELECTORS.FORM_TITLE).val(formName);
            can_save_form();
        });

        $(SELECTORS.FORMTYPE).change(function() {
            $(".efb-forms-template").removeClass("active");
            var type = $(this).val();
            $("#efb-forms-template-" + type).addClass("active");
            $('#id_registration-enabled').prop('checked', true);
        });

        $(".efb-forms-template.pro").click(function() {
            formeo.dom.proWarning({
                type: $(this).find('.efb-forms-template-name').text(),
                video: $(this).data('template'),
                message: $(this).find('.efb-forms-template-details .desc').text()
            });
        });
        $(".efb-forms-template-select").click(function(event){
            var _this = this;
            can_save_form();
            var select = function() {
                var formtype = $(_this).data("template");
                $(_this).parents(SELECTORS.TEMPLATE_OVERLAY).addClass('loading');
                PROMISES.GET_TEMPLATE(formtype)
                .done(function(response) {
                    $(_this).parents(SELECTORS.TEMPLATE_OVERLAY).removeClass('loading');
                    if (response.status == true) {
                        select_template(formtype, response.definition);
                        return;
                    }
                    formeo.dom.alert('warning', response.msg, function() {
                        select_template(formtype, response.definition);
                    });
                }).fail(function(ex) {
                    $(_this).parents(SELECTORS.TEMPLATE_OVERLAY).removeClass('loading');
                    formeo.dom.alert('danger', ex.message);
                });
            }
            if ($(".efb-forms-template.active").length && !empty_form_definition()) {
                formeo.dom.multiActions(
                    'warning',
                    M.util.get_string("attention", SELECTORS.COMPONENT),
                    M.util.get_string("template-change-warning", SELECTORS.COMPONENT),
                    [{
                        title: M.util.get_string('proceed', SELECTORS.COMPONENT),
                        type: 'warning',
                        action: select
                    }, {
                        title: M.util.get_string('cancel', SELECTORS.COMPONENT),
                        type: 'success'
                    }]
                );
            } else {
                select();
            }
        });

        can_save_form();
    }

    var init = function(sitekey, prourl) {
        formeoOpts.sitekey = sitekey;
        formeoOpts.prourl = prourl;
        $(document).ready(function (e) {
            if (typeof formdefinition != 'undefined') {
                formeo = new Formeo(formeoOpts, formdefinition);
            } else {
                formeoOpts.localStorage = true;
                formeo = new Formeo(formeoOpts);
            }
            initializeEvents();
            $('#id_type').closest('.fitem').hide();
            $('#root-page-loading').hide();
            $('.efb-form-builder-wrap').show();
        });
    }
    return {
        init: init
    };
});
