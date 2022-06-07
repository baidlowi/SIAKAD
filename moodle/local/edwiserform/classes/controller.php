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
 * Edwiser Forms controller methods.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace local_edwiserform;

defined('MOODLE_INTERNAL') || die;

define("EDWISERFORM_COMPONENT", "local_edwiserform");
define("EDWISERFORM_FILEAREA", "successmessage");
define("UNAUTHORISED_USER", 1);
define("ADMIN_PERMISSION", 2);
define("PRO_URL", "https://edwiser.org/forms/#pricing");
define("SUPPORTED_FORM_STYLES", 4);

require_once($CFG->dirroot . '/local/edwiserform/events/events.php');

use edwiserform_events_plugin;
use core_component;
use context_system;
use stdClass;

/**
 * Class contains general methods of Edwiser Forms.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class controller {

    /**
     * $instance for this class
     * @var controller
     */
    private static $instance = null;

    /**
     * Private constructor for singletone class
     */
    private function __construct() {
    }

    /**
     * Return singletone controller instance
     *
     * @return controller Controller class instance
     */
    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new controller();
        }
        return self::$instance;
    }

    /**
     * Return events sub plugin object
     *
     * @return object
     * @since Edwiser Form 1.0.0
     */
    public function get_plugins() {
        global $CFG;
        $result = array();

        $names = core_component::get_plugin_list('edwiserformevents');
        foreach ($names as $name => $path) {
            if (file_exists($path . '/locallib.php')) {
                require_once($path . '/locallib.php');
                $shortsubtype = substr('edwiserformevents', strlen('edwiserform'));
                $pluginclass = 'edwiserform_' . $shortsubtype . '_' . $name;
                $result[$name] = new $pluginclass($this, $name);
            }
        }
        return $result;
    }

    /**
     * Return events sub plugins array object
     *
     * @param string $type of subplugin
     * @return array
     * @since Edwiser Form 1.0.0
     */
    public function get_plugin($type) {
        global $CFG;
        $result = null;

        $names = core_component::get_plugin_list('edwiserformevents');
        foreach ($names as $name => $path) {
            if ($name == $type && file_exists($path . '/locallib.php')) {
                require_once($path . '/locallib.php');
                $shortsubtype = substr('edwiserformevents', strlen('edwiserform'));
                $pluginclass = 'edwiserform_' . $shortsubtype . '_' . $name;
                $result = new $pluginclass($this, $name);
            }
        }
        return $result;
    }

    /**
     * Returns value from array at given key. If key not found then returning third parameter or empty value
     *
     * @param  array  $array The array of value
     * @param  string $key to find in the array
     * @param  string $value optional value to return if key not found
     * @return mixed  value found at key location in array
     * @since  Edwiser Form 1.0.0
     */
    public function get_array_val($array, $key, $value = "") {
        // Check if key exist in the array.
        if (isset($array[$key]) && !empty($array[$key])) {
            $value = $array[$key];
        }
        return $value;
    }

    /**
     * Check whether user can save data into form
     *
     * @param  stdClass $form object of form with definition and settings
     * @param  object   $plugin object of selected event
     * @return array    [status 0-cannot submit but have data|1-can submit|2-can submit and have data,
     *                   data previous submitted data]
     * @since  Edwiser Form 1.2.0
     */
    public function can_save_data($form, $plugin) {
        global $DB, $USER;
        $response = ['status' => 1];
        if ($USER->id == 0) {
            return $response;
        }
        if ($plugin != null && $plugin->support_multiple_submissions()) {
            return $response;
        }
        $formid = $form->id;
        $sql = "SELECT f.type, f.data_edit, fd.submission FROM {efb_forms} f
                  JOIN {efb_form_data} fd ON f.id = fd.formid
                 WHERE f.id = ?
                   AND fd.userid = ?";
        $form = $DB->get_record_sql($sql, array($formid, $USER->id));
        if ($form && ($form->type == 'blank' || $plugin->can_save_data())) {
            if ($form->data_edit) {
                $response['data'] = $form->submission;
                $response['status'] = 2;
            } else {
                $response['status'] = 0;
            }
        }
        return $response;
    }

    /**
     * Return base class of events plugin
     *
     * @return array
     * @since Edwiser Form 1.2.0
     */
    public function get_events_base_plugin() {
        global $CFG;
        return new edwiserform_events_plugin();
    }

    /**
     * Generate user to send email
     *
     * @param string $email email id
     * @param string $name name of user (optional)
     * @param integer $id id of user (optional)
     * @return stdClass emailuser
     * @since Edwiser Form 1.0.0
     */
    public function generate_email_user($email, $name = '', $id = -99) {
        $emailuser = new stdClass();
        $emailuser->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailuser->email = '';
        }
        $name = format_text($name, FORMAT_HTML, array('trusted' => false, 'noclean' => false));
        $emailuser->firstname = trim(filter_var($name, FILTER_SANITIZE_STRING));
        $emailuser->lastname = '';
        $emailuser->maildisplay = true;
        $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML emails.
        $emailuser->id = $id;
        $emailuser->firstnamephonetic = '';
        $emailuser->lastnamephonetic = '';
        $emailuser->middlename = '';
        $emailuser->alternatename = '';
        return $emailuser;
    }

    /**
     * Send email to user
     *
     * @param  stdClass $from user
     * @param  stdClass $to user
     * @param  stdClass $subject of email
     * @param  stdClass $messagehtml email body
     * @return boolean email sending status
     * @since Edwiser Form 1.0.0
     */
    public function edwiserform_send_email($from, $to, $subject, $messagehtml) {
        global $PAGE;
        $context = context_system::instance();
        $PAGE->set_context($context);
        $fromemail = $this->generate_email_user($from);
        $toemail = $this->generate_email_user($to);
        $messagetext = html_to_text($messagehtml);
        return email_to_user($toemail, $fromemail, $subject, $messagetext, $messagehtml, '', '', true, $fromemail->email);
    }

    /**
     * Check whether current user is enrolled as teacher in any course
     *
     * @param  int $userid id of user or no parameter for current user
     *
     * @return bool true if user is teacher
     * @since  Edwiser Form 1.2
     */
    public function is_teacher($userid = false) {
        global $USER, $DB;
        if ($userid == false) {
            $userid = $USER->id;
        }

        $sql = "SELECT count(ra.id) FROM {role_assignments} ra
                  JOIN {role} r ON ra.roleid = r.id
                 WHERE ra.userid = ?
                   AND r.archetype IN ('editingteacher', 'teacher')";
        $teachers = $DB->get_field_sql($sql, array($userid));
        return $teachers > 0;
    }

    /**
     * Check whether user can create, view form list or form data.
     *
     * @param  integer $userid id of user
     * @param  boolean $return true if return wheather user can create form
     * @return boolean
     * @since Edwiser Form 1.0.0
     */
    public function can_create_or_view_form($userid = false, $return = false) {
        global $USER, $DB;
        if (!$userid) {
            $userid = $USER->id;
        }
        // User is not logged in so not allowed.
        if (!$userid) {
            if ($return) {
                return false;
            }
            throw new moodle_exception('efb-cannot-create-form', 'local_edwiserform', new moodle_url('/my/'));
        }

        // User is site admin so allowed.
        if (is_siteadmin($userid)) {
            return true;
        }
        $sql = "SELECT count(ra.id) teacher FROM {role_assignments} ra
                  JOIN {role} r ON ra.roleid = r.id
                 WHERE ra.userid = ?
                   AND r.archetype REGEXP 'editingteacher|teacher'";
        $count = $DB->get_record_sql($sql, array($userid));

        // User is not teacher so not allowed.
        if ($count->teacher == 0) {
            if ($return) {
                return false;
            }
            throw new moodle_exception(
                'cannot-create-form',
                'local_edwiserform',
                new moodle_url('/my/'),
                null,
                get_string('contact-admin', 'local_edwiserform')
            );
        }

        // User is teacher.
        if (!get_config('local_edwiserform', 'enable_teacher_forms')) {

            // Admin disallowed teacher from creating/viewing form.
            if ($return) {
                return false;
            }
            throw new moodle_exception(
                'admin-disabled-teacher',
                'local_edwiserform',
                new moodle_url('/my/'),
                null,
                get_string('contact-admin', 'local_edwiserform')
            );
        }

        // User is teacher and admin allowing teacher to create/view form.
        return true;
    }
}
