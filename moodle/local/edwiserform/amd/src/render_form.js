/*
 * Edwiser_Forms - https://edwiser.org/
 * Version: 0.1.0
 * Author: Yogesh Shirsath
 */
define([
    'jquery',
    'core/ajax',
    'core/notification',
    './iefixes',
    'local_edwiserform/formviewer'
], function ($, Ajax, Notification) {
    var SELECTORS = {
        CONTAINER: '.edwiserform-container',
        FULLPAGE: '#edwiserform-fullpage',
        UPLOADED_FILE: 'efb-uploaded-file',
        DELETE_FILE: 'efb-delete-user-file',
        DELETE_CANCEL: 'efb-delete-user-file-cancel',
        FILE: 'input[type="file"]',
        COMPONENT: 'local_edwiserform'
    };

    var ATTRIBUTE = {
        DATA_DELETING: 'data-deleting',
        DATA_PROCESSING: 'data-processing'
    };

    var forms = null;

    var formeo = [];

    var fullpage = false;

    var PROMISES = {
        /**
         * Call moodle service edwiser_get_form_definition
         * @param  {Number}  id Form id
         * @return {Promise}    Ajax promise call
         */
        GET_FORM_DEFINITION: function(id) {
            var promise = Ajax.call([{
                methodname: 'edwiserform_get_form_definition',
                args: {
                    form_id: id
                }
            }]);
            return promise[0];
        },
        /**
         * Call moodle service edwiser_submit_form_data
         * @param  {Number}  formid   Form id
         * @param  {String}  formdata Submitted form data
         * @return {Promise}    Ajax promise call
         */
        SUBMIT_FORM_DATA: function(formid, formdata) {
            var promise = Ajax.call([{
                methodname: 'edwiserform_submit_form_data',
                args: {
                    formid: formid,
                    data: formdata
                }
            }]);
            return promise[0];
        }
    }

    /**
     * Load data to form fields and trigger events
     * @param  {DOM} form DOM form object
     * @param  {Object} data Previously + Default data of user
     */
    function load_form_data(form, data) {
        var formData = JSON.parse(data);
        $.each(formData, function(index, attr) {
            $.each($(form).find('[name="' + attr.name + '"]'), function(i, elem) {
                switch (elem.tagName) {
                    case 'INPUT':
                        switch (elem.type) {
                            case 'radio':
                                if (elem.value == attr.value) {
                                    $(elem).prop('checked', true);
                                }
                                var changeEvent = new CustomEvent("click", {target: $(elem)[0]});
                                $(elem)[0].dispatchEvent(changeEvent);
                                break;
                            case 'checkbox':
                                if (elem.value == attr.value) {
                                    $(elem).prop('checked', true);
                                }
                                break;
                            default:
                                $(elem).val(attr.value);
                                break;
                        }
                        break;
                    case 'SELECT':
                        if ($(elem).is('[multiple="true"]')) {
                            let value = $(elem).val();
                            value.push(attr.value);
                            attr.value = value;
                        }
                    case 'TEXTAREA':
                        $(elem).val(attr.value);
                        break;
                }
                var changeEvent = new CustomEvent("change", {target: $(elem)[0]});
                $(elem)[0].dispatchEvent(changeEvent);
                if ($(elem).val() != '') {
                    $(elem).parents('.f-field-group').addClass('active');
                }
            });
        });
    }

    /**
     * Display validation errors to form element
     * @param {DOM}   form Form DOM element object
     * @param {Array}      errors errors list
     */
    function display_validation_errors(form, errors) {
        var errors = JSON.parse(errors);
        $('.custom-validation-error').remove();
        $.each(errors, function(name, error) {
            var errorview = $(form).find('#' + name + '-error');
            if (errorview.length == 0) {
                $(form).find('[name="' + name + '"]').after('<span id="' + name + '-error" class="text-error custom-validation-error"></span>');
                errorview = $(form).find('#' + name + '-error');
            }
            errorview.text(error);
        });
    }

    /**
     * Filter form data
     * @param  {Array} formdata Submitted form data array
     * @return {String}           JSON formdata
     */
    function filter_formdata(formdata) {
        var removeList = ['g-recaptcha-response'];
        var filteredList = [];
        formdata.forEach(function(element, index) {
            if (removeList.indexOf(element.name) == -1) {
                filteredList.push(element);
            }
        });
        return JSON.stringify(filteredList);
    }

    /**
     * Upload form data to service
     * @param {DOM}      form            Form DOM element object
     * @param {Formeo}   formeo          Formeo object
     * @param {DOM}      submitButton    Submit button DOM object
     * @param {String}   label           Label for submit button
     * @param {String}   processingLabel Label for submit button when form data is being submit
     * @param {Number}   formid          Form id
     * @param {String}   formdata        Submitted form data
     * @param {Function} afterSubmit     Function to be called after form submission
     */
    function upload_form_data(form, formeo, submitButton, label, processingLabel, formid, formdata, afterSubmit = null) {
        $(submitButton).text(processingLabel);
        PROMISES.SUBMIT_FORM_DATA(formid, formdata)
        .done(function(response) {
            if (response.status) {
                $(form).html(response.msg);
                formeo.dom.alert('success', response.msg);
                if (afterSubmit != null) {
                    afterSubmit(form, formdata);
                }
            } else {
                if (response.msg != '') {
                    formeo.dom.alert('warning', response.msg);
                }
                if (response.hasOwnProperty('errors')) {
                    display_validation_errors(form, response.errors);
                }
            }
            formeo.dom.loadingClose();
            $(submitButton).text(label);
        }).fail(function(ex) {
            formeo.dom.loadingClose();
            $(submitButton).text(label);
            Notification.exception(ex);
        });
    }

    /**
     * Prepare and submit form data to server
     * @param  {DOM}    _this  Clicked form object
     * @param  {Formeo} formeo Formeo object
     */
    function submit_form(_this, formeo) {
        var form = $(_this).closest('form');
        var submitButton = _this;
        var valid = formeo.dom.checkValidity(form[0]);
        var label = $(_this).text();
        var processingLabel = $(_this).attr(ATTRIBUTE.DATA_PROCESSING);
        var formid = $(form).parent().find('.id').val();
        if (valid) {
            if ($(form).attr('action') != '') {
                $(form).submit();
                return;
            }
            formeo.dom.loading();
            setTimeout(function() {
                var formdata = form.serializeArray();
                formdata = filter_formdata(formdata);
                upload_form_data(form, formeo, submitButton, label, processingLabel, formid, formdata);
            }, 1000);
        }
    }

    /**
     * Initialize events on elements
     */
    function initializeEvents() {
        // Handle form field arrangement on resize.
        $(window).resize(function() {
            $.each(forms, function(index) {
                formeo[index].dom.manageFormWidth(fullpage);
            });
        });
        $('.step-navigation #previous-step').click(function() {
            return;
        });
        $('.step-navigation #next-step').click(function() {
            return;
        });

        $('body').on('click', '.efb-view-fullpage', function() {
            // View form on full page.
            var id = $(this).closest('.edwiserform-container').find('input[class="id"]').val();
            window.open(M.cfg.wwwroot + '/local/edwiserform/form.php?id=' + id);
            $(this).closest('.edwiserform-container').html(M.util.get_string('fullpage-link-clicked', 'local_edwiserform'));
        });
    }

    /**
     * Apply form action attribute
     * @param  {Object} form   Form object
     * @param  {String} action Action link
     */
    function apply_action(form, action) {
        $(form).attr('action', action);
    }

    /**
     * Render all forms on the page
     * @param  String sitekey sitekey for Google recaptcha
     */
    function render_forms(sitekey) {
        let formeoOpts = {
            container: '',
            sitekey: sitekey,
            localStorage: false, // Changed from session storage to local storage.
        };
        formeo = [];
        forms = $('.edwiserform-container');
        fullpage = $('#edwiserform-fullpage') && $('#edwiserform-fullpage').val();
        $.each(forms, function(index, form) {
            var idElement = $(form).parent().find('.id');
            var id = idElement.val();
            PROMISES.GET_FORM_DEFINITION(id)
            .done(function(response) {
                if (response.status != false) {
                    formeoOpts.container = form;
                    formeo[index] = new Formeo(formeoOpts, response.definition);
                    formeo[index].render(form);
                    $(form).prepend('<h2>' + response.title + '</h2>');
                    $(form).prepend(idElement);
                    if (response.data) {
                        load_form_data(form, response.data);
                    }
                    if (response.action && response.action != '') {
                        apply_action(form, response.action);
                    }
                    $(form).keyup(function(event) {
                        if (event.keyCode == 13) {
                            submit_form(this, formeo[index], response.formtype);
                        }
                    });
                    $(form).find('#submit-form').click(function() {
                        submit_form(this, formeo[index], response.formtype);
                    });
                } else {
                    $(form).html(response.msg).addClass("empty");
                }
            }).fail(function(ex) {
                console.log(ex);
            });
        });
    }
    return {
        init: function(sitekey) {
            $(document).ready(function (e) {
                if ($('#edwiserform-fullpage').length != 0 && $('#edwiserform-fullpage').val() == true) {
                    $('body').addClass('edwiserform-fullpage');
                }
                render_forms(sitekey);
                initializeEvents();
            });
        }
    }
});
