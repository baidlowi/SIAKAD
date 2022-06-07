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
 * Form submission external service definition
 * @package    local_edwiserform
 * @copyright  (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Yogesh Shirsath
 */

namespace local_edwiserform\external;

defined('MOODLE_INTERNAL') || die();

use stdClass;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;
use context_system;
use html_writer;
use local_edwiserform\output\list_form_data;

/**
 * Service definition for get form submissions
 * @copyright  (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait get_form_submissions {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_form_submissions_parameters() {
        return new external_function_parameters(
            array(
                'formid'   => new external_value(PARAM_INT, 'Form id'),
                'search'   => new external_value(PARAM_RAW, 'Search query'),
                'start'    => new external_value(PARAM_INT, 'Start index of record'),
                'length'   => new external_value(PARAM_INT, 'Number of records per page'),
            )
        );
    }



    /**
     * Get form submissions list using filter.
     * @param  integer $formid Form id
     * @param  string  $search Search query for form submissions list
     * @param  integer $start  Start index for form submissions listing
     * @param  integer $length Total form submissions can be fetched while listing
     * @return array           Form submissions list
     */
    public static function get_form_submissions($formid, $search, $start = 0, $length = 0) {
        global $PAGE;
        $PAGE->set_context(context_system::instance());

        $limit = array(
            'from' => $start,
            'to' => $length
        );

        $listformdata = new list_form_data($formid);

        $rows = $listformdata->get_submissions_list($limit, $search);
        $count = $listformdata->get_submission_count($formid, $search);

        return array(
            "data" => empty($rows) ? [] : $rows,
            "recordsTotal" => $count,
            "recordsFiltered" => $count
        );
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_form_submissions_returns() {
        return new external_single_structure(
            array(
                "data" => new external_multiple_structure(
                    new external_multiple_structure(
                        new external_value(PARAM_RAW, "Row data"),
                        'Form details',
                        VALUE_DEFAULT,
                        ''
                    ),
                    'Form submission list',
                    VALUE_DEFAULT,
                    []
                ),
                "recordsTotal" => new external_value(PARAM_INT, "Total records found"),
                "recordsFiltered" => new external_value(PARAM_INT, "Total filtered record")
            )
        );
    }
}