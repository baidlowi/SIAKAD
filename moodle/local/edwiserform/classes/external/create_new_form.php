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
 * Trait for create_new_form service
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use external_function_parameters;
use local_edwiserform\controller;
use external_single_structure;
use context_system;
use external_value;
use Exception;
use stdClass;

/**
 * Service definition for create new form
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait create_new_form {

    /**
     * Returns the functional parameter for create and update form methods
     * @param  boolean                      $id true if want to add id in parameters
     * @return external_function_parameters     Functional parameters
     * @since  Edwiser Form 1.2.1
     */
    public static function get_create_update_form_parameters($id = false) {
        $settings = array(
            'title' => new external_value(PARAM_TEXT, 'Form title', VALUE_REQUIRED),
            'description' => new external_value(PARAM_TEXT, 'Form description.', VALUE_DEFAULT, ''),
            'data_edit' => new external_value(PARAM_BOOL, 'Is form editable. Boolean true/flase', VALUE_REQUIRED),
            'type' => new external_value(PARAM_TEXT, 'Type of the form', VALUE_REQUIRED),
            'notifi_email' => new external_value(
                PARAM_TEXT,
                'Notification email address. This value is required if the form type is contact us',
                VALUE_DEFAULT,
                ''
            ),
            'message' => new external_value(PARAM_RAW, 'Message to show after successfull submission', VALUE_DEFAULT, ''),
            "draftitemid" => new external_value(PARAM_INT, 'Draft item id form message', VALUE_DEFAULT, 0)
        );
        if ($id == true) {
            $settings['id'] = new external_value(PARAM_INT, 'Form id', VALUE_REQUIRED);
        }
        return new external_function_parameters(
            array(
                "setting" => new external_single_structure(
                    $settings
                ),
                'formdef' => new external_value(PARAM_RAW, 'Form signuture in json format.', VALUE_REQUIRED),
            )
        );
    }

    /**
     * Return the response structure of create and update form services
     * @return external_single_structure return structure
     * @since  Edwiser Form 1.2.1
     */
    public static function get_create_update_form_returns() {
        return new external_single_structure(
            array(
                'status' => new external_value(PARAM_BOOL, 'Form deletion status.'),
                'formid' => new external_value(PARAM_INT, 'Form id.'),
                'msg' => new external_value(PARAM_RAW, 'Form deletion message.')
            )
        );
    }

    /**
     * Describes the parameters for create new form
     * @return external_function_parameters
     * @since  Edwiser Forms 1.1.0
     */
    public static function create_new_form_parameters() {
        return self::get_create_update_form_parameters();
    }

    /**
     * Creating new form using form definition and settings.
     * @param  array $settings The settings of form including title, description, data_edit, type,
     *                         notifi_email, message, draftitemid
     * @param  string $formdef json string of form definition
     * @return array  [status, msg, formid] of form creation process
     * @since  Edwiser Form 1.0.0
     */
    public static function create_new_form($settings, $formdef) {
        $controller = controller::instance();

        $response = array(
            'status' => false,
            'msg' => get_string("form-setting-save-fail-msg", "local_edwiserform"),
            'formid' => 0
        );
        $type = $controller->get_array_val($settings, "type");
        $eventsettings = $controller->get_array_val($settings, "eventsettings");
        $params = self::validate_parameters(
            self::create_new_form_parameters(),
            array("setting" => $settings, "formdef" => $formdef)
        );
        $formid = self::save_form($params['setting'], $params['formdef']);
        if ($formid > 0) {
            if ($type != 'blank') {
                $plugin = $controller->get_plugin($type);
                $plugin->create_new_form($formid, $eventsettings);
            }
            $response['status'] = true;
            $response['msg'] = get_string("form-setting-save-msg", "local_edwiserform");
            $response['formid'] = $formid;
        }
        return $response;
    }

    /**
     * Save form definition and settings
     * @param  array  $setting of form
     * @param  string $definition json format string
     * @return mixes  id of created form or error message
     * @since  Edwiser Form 1.0.0
     */
    private static function save_form($setting, $definition) {
        global $DB, $USER, $CFG;

        $controller = controller::instance();

        $data = new stdClass();
        $data->title = $controller->get_array_val($setting, "title");
        $data->description = $controller->get_array_val($setting, "description");
        $data->author = $USER->id;
        $data->type = $controller->get_array_val($setting, "type");
        $data->notifi_email = $controller->get_array_val($setting, "notifi_email");
        $data->message = $controller->get_array_val($setting, "message", "");
        $data->data_edit = $controller->get_array_val($setting, "data_edit");
        $data->definition = $definition;
        $data->created = time();
        $data->enabled = 0;
        $data->deleted = 0;
        try {
            $result = $DB->insert_record("efb_forms", $data, $returnid = true, $bulk = false);
            $form = new stdClass;
            $form->id = $result;
            $context = context_system::instance();
            require_once($CFG->libdir . "/filelib.php");
            $form->message = file_save_draft_area_files(
                $controller->get_array_val($setting, "draftitemid", 0),
                $context->id,
                EDWISERFORM_COMPONENT,
                EDWISERFORM_FILEAREA,
                $result,
                array('subdirs' => false),
                $controller->get_array_val($setting, "message", "")
            );
            $DB->update_record("efb_forms", $form);
        } catch (Exception $ex) {
            $result = $ex->getMessage();
        }
        return $result;
    }

    /**
     * Returns description of method parameters for create new form
     * @return external_single_structure
     * @since  Edwiser Form 1.0.0
     */
    public static function create_new_form_returns() {
        return self::get_create_update_form_returns();
    }
}
