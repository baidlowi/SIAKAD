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
 * @copyright (c) 2019 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @author    Yogesh Shirsath
 * @author    Sudam
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_multiple_structure;
use external_value;
use edwiserform;
use stdClass;

trait delete_submissions {

    /**
     * Describes the parameters for delete form
     * @return external_function_parameters
     * @since  Edwiser Form 1.3.2
     */
    public static function delete_submissions_parameters() {
        return new external_function_parameters(
            [
                'id' => new external_value(PARAM_INT, 'Form id', VALUE_REQUIRED),
                'submissions' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'Submission id'),
                    VALUE_DEFAULT,
                    []
                )
            ]
        );
    }

    /**
     * Deleting form record. Form's delete column will be marked as true to delete on cron
     * @param  integer $formid      id of form
     * @param  array   $submissions Submission id array to delete
     * @return array   [status, msg] of form deletion
     * @since  Edwiser Form 1.3.2
     */
    public static function delete_submissions($formid, $submissions) {
        global $DB, $USER, $CFG;
        $form = $DB->get_record('efb_forms', array('id' => $formid));
        if ($form == false) {
            return ['status' => false, 'msg' => get_string('efb-form-not-found', 'local_edwiserform', $formid)];
        }

        // If empty submissions array then return error message.
        if (empty($submissions)) {
            return ['status' => false, 'msg' => get_string('emptysubmission', 'local_edwiserform')];
        }

        // Prepare sql to fetch submissions data.
        list($insql, $inparam) = $DB->get_in_or_equal($submissions, SQL_PARAMS_NAMED, 'id');
        $submissions = $DB->get_records_sql(
            'SELECT * FROM {efb_form_data}
              WHERE formid = :formid AND id ' . $insql,
            array('formid' => $formid) + $inparam
        );

        // If selected submissions are already deleted or not present then return error message.
        if (empty($submissions)) {
            return ['status' => false, 'msg' => get_string('emptysubmission', 'local_edwiserform')];
        }

        // Check if user is admin or author/author2 of form.
        $adminorauthor = is_siteadmin() || $form->author == $USER->id || $form->author2 == $USER->id;

        $edwiserform = new edwiserform();

        foreach ($submissions as $key => $submission) {

            // If current user is not admin or author/author2 or current submission is not submitted.
            // By him then remove it from array for preventing deletion.
            if (!$adminorauthor) {
                if ($submission->userid != $USER->id) {
                    unset($key);
                    continue;
                }
            }
        }
        if (count($inparam) > 1) {
            $msg = get_string('submissionsdeleted', 'local_edwiserform');
        } else {
            $msg = get_string('submissiondeleted', 'local_edwiserform');
        }

        // Delete submissions from database.
        $DB->delete_records_select(
            'efb_form_data',
            ' formid = :formid AND id ' . $insql,
            array('formid' => $formid) + $inparam
        );
        return array("status" => true, "msg" => $msg);
    }

    /**
     * Returns description of method parameters for delete form
     * @return external_single_structure
     * @since  Edwiser Form 1.3.2
     */
    public static function delete_submissions_returns() {
        return new external_single_structure(
            [
                'status' => new external_value(PARAM_BOOL, 'Form deletion status.'),
                'msg'    => new external_value(PARAM_RAW, 'Form deletion message.')
            ]
        );
    }
}
