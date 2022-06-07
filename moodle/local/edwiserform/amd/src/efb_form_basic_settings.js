/*
 * Edwiser_Forms - https://edwiser.org/
 * Version: 0.1.0
 * Author: Yogesh Shirsath
 */
define(['jquery'], function ($) {
    $(document).ready(function() {
        function validateEmail(email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {
                if (emails.indexOf(email) != -1) {
                    return 2;
                }
                return 1;
            }
            return 0;

        }
        function validateEditEmail(index, email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {;
                if (emails.indexOf(email) != -1 && emails.indexOf(email) != index) {
                    return 2;
                }
                return 1;
            }
            return 0;

        }
        function addEmail(index, email) {
            var classes = [
                'primary',
                'warning',
                'success',
                'info',
            ];
            var emailElement = document.createElement("span");
            $(emailElement).html(email);
            $(emailElement).attr("data-email", email);
            $(emailElement).attr("class", 'email-tag btn btn-' + classes[Math.floor((Math.random() * classes.length))]);
            var deleteEmail = document.createElement("span");
            $(deleteEmail).attr("class", "email-tag-delete");
            $(deleteEmail).html("X");
            $(emailElement).append($(deleteEmail));
            $(emailElement).insertBefore($(".notifi-email-group").children()[index]);
        }
        function changeToEmailEdit(tag) {
            let email = $(tag).data('email');
            let index = $(".email-tag").index(tag);
            editing = index;
            var emailElement = document.createElement("input");
            $(tag).remove();
            $(emailElement).val(email);
            $(emailElement).attr("class", "notifi-email-group-edit");
            $(emailElement).attr("data-index", index);
            $(emailElement).insertBefore($(".notifi-email-group").children()[index]);
            $(emailElement).focus();
        }
        function changeToEmailTag(edit) {
            if (editing != -1) {
                var index = $(edit).data('index');
                var status = validateEditEmail(index, $(edit).val());
                switch (status) {
                    case 0:
                        showEmailError(M.util.get_string("lbl-notifi-email-warning", "local_edwiserform"));
                        return;
                    case 1:
                        editing = -1;
                        let email = $(edit).val();
                        $(edit).remove();
                        addEmail(index, email);
                        emails[index] = email;
                        $("#id_notifi_email").val(emails.join(','));
                        hideEmailError();
                        return;
                    case 2:
                        showEmailError(M.util.get_string("lbl-notifi-email-duplicate", "local_edwiserform"));
                        return;
                }
            }
        }
        $("#id_notifi_email").parent().prepend('<div class="notifi-email-group"><input type="email" class="notifi-email-group-input form-control" id="notifi-email-group-input"/><div>' + M.util.get_string('recipient-email-desc', 'local_edwiserform') + '</div></div>');
        $("#id_notifi_email").hide();
        $('#id_notifi_email_body').after(M.util.get_string('email-body-restore-desc', 'local_edwiserform', {
            id: '#id_notifi_email_bodyeditable',
            string: 'notify-email-body'
        }));
        $('#id_confirmation_msg').after(M.util.get_string('email-body-restore-desc', 'local_edwiserform', {
            id: '#id_confirmation_msgeditable',
            string: 'confirmation-default-msg'
        }));
        $('.efb-email-body-restore').click(function() {
            $($(this).data('id')).html(M.util.get_string($(this).data('string'), 'local_edwiserform'))
        });
        function get_body_tags() {
            var tags = M.util.get_string('email-body-tags', 'local_edwiserform');
            var container = "<div class='efb-email-tags show'><ul>";
            $.each(tags, function(tag, info) {
                container += '<li><a href="#" class="efb-email-tag" title="' + info + '">' + tag + '<label class="efb-forms-pro-label m-0">' + M.util.get_string('pro-label', 'local_edwiserform') + '</label></a></li>';
            });
            return container += "</ul></div>";
        }
        $('body').on('click', '.efb-email-show-tags>a', function() {
            $(this).next().toggleClass('show');
            $(this).text($(this).next().hasClass('show') ? M.util.get_string('email-hide-tags', 'local_edwiserform') : M.util.get_string('email-show-tags', 'local_edwiserform'));
        });
        $("#id_notifi_email_body").parents('.felement').siblings().append(
            '<div class="efb-email-show-tags"><a href="#">' + M.util.get_string('email-hide-tags', 'local_edwiserform') + '</a>' + get_body_tags() + '</div>'
        );
        $("#id_confirmation_msg").parents('.felement').siblings().append(
            '<div class="efb-email-show-tags"><a href="#">' + M.util.get_string('email-hide-tags', 'local_edwiserform') + '</a>' + get_body_tags() + '</div>'
        );
        var emails = $("#id_notifi_email").val().trim();
        var editing = -1;
        if (emails.length > 0) {
            emails = emails.split(",");
        } else {
            emails = [];
        }
        $.each(emails, function(index, email) {
            addEmail(index, email);
        });
        $("body").on("click", ".email-tag-delete", function() {
            var email = $(this).parent();
            var index = $(".email-tag").index(email);
            emails.splice(index, 1);
            email.remove();
            $("#id_notifi_email").val(emails.join(','));
        });
        $("body").on("dblclick", ".email-tag", function() {
            changeToEmailEdit($(this));
        });
        $("body").on("focusout", ".notifi-email-group-edit", function(event) {
            changeToEmailTag($(this));
        });
        $("body").on("keyup", ".notifi-email-group-edit", function(event) {
            if (event.keyCode == 13 || event.keyCode == 27) {
                changeToEmailTag($(this));
            }
        });
        function showEmailError(string) {
            $("#id_error_notifi_email").html(string);
            $("#id_error_notifi_email").show();
            $("#id_error_notifi_email").parent(".felement").addClass('has-danger');
        }
        function hideEmailError() {
            $("#id_error_notifi_email").hide().parent(".felement").removeClass('has-danger');
            $("#id_notifi_email").val(emails.join(','));
        }
        function checkAndAdd(elem) {
            if ($(elem).val() == '') {
                hideEmailError();
                return;
            }
            var status = validateEmail($(elem).val());
            switch (status) {
                case 0:
                    showEmailError(M.util.get_string("lbl-notifi-email-warning", "local_edwiserform"));
                    return;
                case 1:
                    var nextIndex = $(elem).siblings('.email-tag').length;
                    var email = $(elem).val().trim();
                    addEmail(nextIndex, email);
                    emails.push(email);
                    $(elem).val('');
                    hideEmailError();
                    return;
                case 2:
                    showEmailError(M.util.get_string("lbl-notifi-email-duplicate", "local_edwiserform"));
                    return;
            }
        }
        $("body").on("keyup", "#notifi-email-group-input", function(event) {
            if (event.keyCode == 13 || event.keyCode == 32) { // Enter key or space key.
                checkAndAdd(this);
            } else if (event.keyCode == 188) { // Comma key.
                $(this).val($(this).val().slice(0, -1));
                checkAndAdd(this);
            }
        });
        $("body").on("focusout", "#notifi-email-group-input", function(event) {
            event.preventDefault();
            checkAndAdd(this);
        });
    });
});
