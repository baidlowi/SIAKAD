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
 * Trait for delete_form service
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use stdClass;

/**
 * Service definition for delete form.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait delete_form {

    /**
     * Describes the parameters for delete form
     * @return external_function_parameters
     * @since  Edwiser Forms 1.0.0
     */
    public static function delete_form_parameters() {
        return new external_function_parameters(
                [
            'id' => new external_value(PARAM_INT, 'Form id', VALUE_REQUIRED),
                ]
        );
    }

    /**
     * Deleting form record. Form's delete column will be marked as true to delete on cron
     * @param  integer $formid of form
     * @return array   [status, msg] of form deletion
     * @since  Edwiser Form 1.0.0
     */
    public static function delete_form($formid) {
        global $DB;
        $response = array("status" => false, "msg" => get_string("msg-form-delete-fail", "local_edwiserform"));
        if (!$formid) {
            return $response;
        }
        $data          = new stdClass();
        $data->id      = $formid;
        $data->deleted = true;
        $status        = $DB->update_record("efb_forms", $data);
        if ($status) {
            $msg = get_string("msg-form-delete-success", "local_edwiserform");
        }
        return array("status" => $status, "msg" => $msg);
    }

    /**
     * Returns description of method parameters for delete form
     * @return external_single_structure
     * @since  Edwiser Form 1.0.0
     */
    public static function delete_form_returns() {
        return new external_single_structure(
                [
            'status' => new external_value(PARAM_BOOL, 'Form deletion status.'),
            'msg'    => new external_value(PARAM_TEXT, 'Form deletion message.')
                ]
        );
    }
}
