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
 * Trait of enable disable form service.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam Chakor
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use external_function_parameters;
use external_single_structure;
use external_value;

/**
 * Service definition for enable disable form
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait enable_disable_form {

    /**
     * Describes the parameters for enable disable form
     * @return external_function_parameters
     * @since  Edwiser Forms 1.0.0
     */
    public static function enable_disable_form_parameters() {
        return new external_function_parameters(
            [
                "id" => new external_value(PARAM_INTEGER, "Form id", VALUE_REQUIRED),
                "action" => new external_value(PARAM_BOOL, "Enable or disable login page", VALUE_REQUIRED)
            ]
        );
    }

    /**
     * Enable or disable form
     * @param  interger $id of form
     * @param  boolean  $action to perform [true - enable|false - disable]
     * @return array    [status|msg]
     * @since  Edwiser Form 1.0.0
     */
    public static function enable_disable_form($id, $action) {
        global $DB, $CFG;
        $action = $action ? "enable" : "disable";
        $response = array(
            "status" => false,
            "msg" => get_string("form-action-" . $action . "-failed", "local_edwiserform")
        );
        $form = $DB->get_record("efb_forms", array("id" => $id));
        if ($form) {
            $form->enabled = $action == "enable";
            $DB->update_record("efb_forms", $form);
            $response = array(
                "status" => true,
                "msg" => get_string("form-action-" . $action . "-success", "local_edwiserform")
            );
        }
        return $response;
    }

    /**
     * Returns description of method parameters for enable disable form
     * @return external_single_structure
     * @since  Edwiser Form 1.0.0
     */
    public static function enable_disable_form_returns() {
        return new external_single_structure(
            [
                "status" => new external_value(PARAM_BOOL, "Login form enable/disable status"),
                "msg"    => new external_value(PARAM_TEXT, "Login form enable/disable operation message")
            ]
        );
    }
}
