/*
 * Edwiser_Forms - https://edwiser.org/
 * Version: 0.1.0
 * Author: Yogesh Shirsath
 */
define(['jquery', 'core/ajax', './iefixes', 'local_edwiserform/formviewer'], function ($, ajax) {
    return {
        init: function(title, sitekey) {
            $(document).ready(function (e) {
                $('body').addClass('edwiserform-fullpage');
                var form = $('#preview-form')[0];
                let formeoOpts = {
                    container: form,
                    sitekey: sitekey,
                    localStorage: false, // Changed from session storage to local storage.
                };
                var formeo;
                formeo = new Formeo(formeoOpts, definition);
                formeo.render(form);
                $(form).prepend('<h2>' + title + '</h2>');
            });
        }
    };
});
