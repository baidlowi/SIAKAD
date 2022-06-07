<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Edwiser Forms settings
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

// Add admin menues.
$ADMIN->add('modules', new admin_category('edwiserform', new lang_string("pluginname", "local_edwiserform")));
$ADMIN->add('edwiserform',
            new admin_externalpage(
                'efbnewform',
                new lang_string("heading-newform", "local_edwiserform"),
                new moodle_url("/local/edwiserform/view.php", array("page" => "newform"))
            )
        );
$ADMIN->add('edwiserform',
            new admin_externalpage(
                'efblistforms',
                new lang_string("heading-listforms", "local_edwiserform"),
                new moodle_url("/local/edwiserform/view.php", array("page" => "listforms"))
            )
        );
$ADMIN->add('edwiserform',
            new admin_externalpage(
                'efbsettings',
                new lang_string("settings", "local_edwiserform"),
                new moodle_url("/admin/settings.php", array("section" => "local_edwiserform"))
            )
        );

// General settings.
$settings = new admin_settingpage('local_edwiserform', new lang_string('pluginname', 'local_edwiserform'));
$ADMIN->add('localplugins', $settings);

// Checkbox for enabling teacher to create new form.
$settings->add(new admin_setting_configcheckbox(
    "local_edwiserform/enable_teacher_forms",
    new lang_string("enable-user-level-from-creation", "local_edwiserform"),
    new lang_string("des-enable-user-level-from-creation", "local_edwiserform"),
    false
));

// Google Recaptcha site key.
$settings->add(new admin_setting_configtext(
    "local_edwiserform/google_recaptcha_sitekey",
    new lang_string("google-recaptcha-sitekey", "local_edwiserform"),
    new lang_string("desc-google-recaptcha-sitekey", "local_edwiserform"),
    'null'
));

// Enable navigation using sidebar.
$settings->add(new admin_setting_configcheckbox(
    "local_edwiserform/enable_sidebar_navigation",
    new lang_string("enable-site-navigation", "local_edwiserform"),
    new lang_string("desc-enable-site-navigation", "local_edwiserform"),
    true
));

// Usage tracking GDPR setting.
$settings->add(new admin_setting_configcheckbox(
    'local_edwiserform/enableusagetracking',
    new lang_string('enableusagetracking', 'local_edwiserform'),
    new lang_string('enableusagetrackingdesc', 'local_edwiserform'),
    true
));
