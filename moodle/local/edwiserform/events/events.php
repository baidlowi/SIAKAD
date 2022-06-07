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
 * Edwiser Form events class
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Common functions for Edwiser Form events plugin.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class edwiserform_events_plugin {
    /**
     * Return does event require logged in user
     * @return boolean
     * @since  Edwiser Form 1.0.0
     */
    public function login_required() {
        return false;
    }

    /**
     * Return does event viewed while user logged in
     * @return boolean
     * @since  Edwiser Form 1.0.0
     */
    public function login_allowed() {
        return true;
    }

    /**
     * Return action of form
     * @return string url
     * @since  Edwiser Form 1.0.0
     */
    public function get_action_url() {
        return '';
    }

    /**
     * Execute event action after form submission
     * @param  object $form Form object
     * @param  object $data Data submitted by user
     * @return string
     * @since  Edwiser Form 1.0.0
     */
    public function event_action($form, $data) {
        return [
            "status" => true,
            "msg" => "",
            "errors" => "{}"
        ];
    }

    /**
     * Execute event action after form submission
     * @param  object $form Form object
     * @param  object $data Data submitted by user
     * @return object       Data with attached event data
     * @since  Edwiser Form 1.0.0
     */
    public function attach_data($form, $data) {
        return $data;
    }

    /**
     * Returns can user submit data for this event
     * @return boolean
     * @since Edwiser Form 1.0.0
     */
    public function can_save_data() {
        return true;
    }

    /**
     * Does plugin support actions on form data list view
     * @return boolean
     * @since  Edwiser Form 1.0.0
     */
    public function support_form_data_list_actions() {
        return false;
    }

    /**
     * Validate submitted form data
     * @param  object $form Form object
     * @param  array  $data Form data
     * @return array
     * @since  Edwiser Form 1.0.0
     */
    public function validate_form_data($form, $data) {
        return [];
    }

    /**
     * Does plugin support actions on form data list view
     * @param  object $form Form object
     * @return boolean
     * @since  Edwiser Form 1.0.0
     */
    public function form_data_list_actions($form) {
        return [];
    }

    /**
     * Form data list js files
     * @since Edwiser Form 1.0.0
     */
    public function form_data_list_js() {
        // Require js files or call amd.
    }

    /**
     * Perform action while enabling and disabling form
     * @param  object $form     Form object
     * @param  string $action   Enable or Disable
     * @param  array  $response Previous response
     * @return array            Processed response
     * @since  Edwiser Form 1.0.0
     */
    public function enable_disable_form($form, $action, $response) {
        return $response;
    }

    /**
     * Creating new form
     * @param  integer         $formid   id of form
     * @param  string|stdClass $settings Settings
     * @return intger                    new form id
     * @since  Edwiser Form 1.0.0
     */
    public function create_new_form($formid, $settings) {
        return null;
    }

    /**
     * Update form settings
     * @param  integer         $formid   id of form
     * @param  string          $settings Settings
     * @return integer|boolean           status of form updation
     * @return Edwiser Form 1.0.0
     */
    public function update_form($formid, $settings) {
        return null;
    }

    /**
     * Verify form settings
     * @param  array $settings Form settings
     * @return string          Form verification status. If empty then no error otherwise error string
     * @since  Edwiser Form 1.0.0
     */
    public function verify_form_settings($settings) {
        return '';
    }

    /**
     * Load strings of event
     * @param string $type Type of event
     * @since Edwiser Form 1.0.0
     */
    public function load_event_strings($type) {
        global $PAGE;
        $stringmanager = get_string_manager();
        $strings = $stringmanager->load_component_strings("edwiserformevents_$type", 'en');
        $PAGE->requires->strings_for_js(array_keys($strings), "edwiserformevents_$type");
    }

    /**
     * Does event support form data update
     * @return boolean
     * @since  Edwiser Form 1.0.0
     */
    public function support_form_data_update() {
        return true;
    }

    /**
     * Has field value in form data
     * @param  array   $formdata Form data object
     * @param  string  $field    Field to search
     * @return boolean           True if found
     * @since  Edwiser Form 1.0.0
     */
    public function has_field($formdata, $field) {
        if ($formdata == null) {
            return false;
        }
        foreach ($formdata as $fieldobj) {
            if ((is_array($fieldobj) && $fieldobj['name'] == $field) || (is_object($fieldobj) && $fieldobj->name == $field)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Attach common data to user data such profile fields
     * @param  stdClass $form Object
     * @param  string   $data Submitted by user or empty data
     * @return string         Data
     * @since  Edwiser Form 1.0.0
     */
    public function attach_common_data($form, $data) {
        global $USER;
        $data = json_decode($data);
        if ($USER->id != 0) {
            $fields = [
                "firstname" => $USER->firstname,
                "lastname" => $USER->lastname,
                "email" => $USER->email,
                "mobile" => $USER->phone2
            ];
            foreach ($fields as $key => $value) {
                if (!$this->has_field($data, $key)) {
                    $data[] = [
                        "name"     => $key,
                        "value"    => $value
                    ];
                }
            }
        }
        return json_encode($data);
    }

    /**
     * Returns does plugin support multiple submissions for single user
     * @return bool
     * @since  Edwiser Form 1.2.0
     */
    public function support_multiple_submissions() {
        return false;
    }

    /**
     * Returns does teacher can create this type of form
     * @return bool
     * @since  Edwiser Form 1.2.0
     */
    public function teacher_allowed() {
        return true;
    }
}
