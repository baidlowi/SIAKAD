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
 * Trait for update form settings and definition service.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use local_edwiserform\controller;
use external_function_parameters;
use external_value;
use context_system;
use stdClass;

/**
 * Service definition for update form.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait update_form {

    /**
     * Describes the parameters for update form
     * @return external_function_parameters
     * @since  Edwiser Forms 1.0.5
     */
    public static function update_form_parameters() {
        return self::get_create_update_form_parameters(true);
    }

    /**
     * Creating new form using form definition and settings.
     * @param  array $settings The settings of form including id, title, description, data_edit, type,
     *                         notifi_email, message, draftitemid
     * @param  string $formdef json string of form definition
     * @return array  [status, msg, formid] of form creation process
     * @since  Edwiser Form 1.0.0
     */
    public static function update_form($settings, $formdef) {
        global $CFG;

        $controller = controller::instance();

        $response = array(
            'status' => false,
            'msg' => get_string("form-setting-update-fail-msg", "local_edwiserform"),
        );
        $type = $controller->get_array_val($settings, "type");
        $formid = $controller->get_array_val($settings, "id");
        $eventsettings = $controller->get_array_val($settings, "eventsettings");
        $params = self::validate_parameters(self::update_form_parameters(), array("setting" => $settings, "formdef" => $formdef));
        $settings = $controller->get_array_val($params, 'setting');
        $formid = $controller->get_array_val($settings, "id");
        $formdefinition = $controller->get_array_val($params, 'formdef');
        $response["formid"] = $formid;
        $formsettings = self::get_form_settings($settings);
        $status = self::update_form_status($formid, $formdefinition, $formsettings);
        if ($status == true) {
            $response['status'] = true;
            $response['msg'] = get_string("form-setting-update-msg", "local_edwiserform");
        } else if ($status == false) {
            $response['msg'] = get_string("form-def-update-fail-msg", "local_edwiserform", PRO_URL);
        } else {
            $response['msg'] = $status;
        }
        return $response;
    }

    /**
     * Getting form settings from setting array and copying that in data standard class object.
     * Also saving files from email body template to plugin area and return data object
     * @param  array $setting of form admin want to update
     * @return stdClass data
     * @since  Edwiser Form 1.0.0
     */
    private static function get_form_settings($setting) {
        global $DB, $USER, $CFG;

        $controller = controller::instance();

        $data = new stdClass();
        $data->id = $controller->get_array_val($setting, "id");
        $data->title = $controller->get_array_val($setting, "title");
        $data->description = $controller->get_array_val($setting, "description");
        $data->type = $controller->get_array_val($setting, "type");
        $data->notifi_email = $controller->get_array_val($setting, "notifi_email");
        $data->data_edit = $controller->get_array_val($setting, "data_edit", false);
        $context = context_system::instance();
        require_once($CFG->libdir . "/filelib.php");
        $data->message = file_save_draft_area_files(
            $controller->get_array_val($setting, "draftitemid", 0),
            $context->id,
            EDWISERFORM_COMPONENT,
            EDWISERFORM_FILEAREA,
            $data->id,
            array('subdirs' => false),
            $controller->get_array_val($setting, "message", "")
        );
        $data->author2 = $USER->id;
        $data->modified = time();
        return $data;
    }

    /**
     * Comparing form definition for the change in settings, stage, row, column or fields
     * @param  string $def1 previous form definition in json format
     * @param  string $def2 new form definition in json format
     * @return boolean true if form definition is same
     * @since  Edwiser Form 1.0.0
     */
    private static function compare_form_definition($def1, $def2) {
        $def1 = json_decode($def1, true);
        $def2 = json_decode($def2, true);
        error_reporting(E_ALL & ~E_NOTICE);
        $status = empty(array_diff_assoc($def1['fields'], $def2['fields'])) &&
                  empty(array_diff_assoc($def2['fields'], $def1['fields']));
        error_reporting(E_ALL);
        return $status;
    }

    /**
     * Updating form definition if new definition is different than previous
     * @param  integer $formid         The form id
     * @param  string  $formdefinition Form definition in json format
     * @param  object  $formsettings   Form object with settings and form definition
     * @return boolean                 true if form definition is updated
     * @since  Edwiser Form 1.0.0
     */
    private static function update_form_status($formid, $formdefinition, $formsettings) {
        global $DB;
        $submissions = $DB->count_records("efb_form_data", array("formid" => $formid));
        $oldform = $DB->get_field("efb_forms", "definition", array("id" => $formid));
        $overwrite = self::compare_form_definition($formdefinition, $oldform);
        $formsettings->definition = $formdefinition;
        if (!$submissions || $overwrite) {
            $DB->update_record("efb_forms", $formsettings);
            return true;
        }
        return false;
    }

    /**
     * Returns description of method parameters for update form
     * @return external_single_structure
     * @since  Edwiser Form 1.0.0
     */
    public static function update_form_returns() {
        return self::get_create_update_form_returns();
    }
}
