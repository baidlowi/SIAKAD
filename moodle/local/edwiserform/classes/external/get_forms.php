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
 * Trait for get forms service.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
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
use local_edwiserform\output\list_form;

/**
 * Service definition for get forms.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait get_forms {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_forms_parameters() {
        return new external_function_parameters(
            array(
                'search'   => new external_value(PARAM_RAW, 'Search query'),
                'start'    => new external_value(PARAM_INT, 'Start index of record'),
                'length'   => new external_value(PARAM_INT, 'Number of records per page'),
                'order'    => new external_single_structure(
                    array(
                        'column' => new external_value(PARAM_INT, 'index of column'),
                        'dir'    => new external_value(PARAM_ALPHA, 'direction of sorting')
                    ),
                    'sorting order with column number and sorting direction'
                )
            )
        );
    }

    /**
     * Get forms list using filter.
     * @param  string  $search Search query for forms list
     * @param  integer $start  Start index for forms listing
     * @param  integer $length Total forms can be fetched while listing
     * @param  array   $order  Ordering values: column => Column to sort, dir => Direction to sort.
     * @return array           Form submissions list
     */
    public static function get_forms($search, $start = 0, $length = 0, $order = ['column' => 0, 'dir' => ""]) {
        global $PAGE;
        $PAGE->set_context(context_system::instance());

        $limit = array(
            'from' => $start,
            'to' => $length
        );

        $listform = new list_form();

        $rows = $listform->get_forms_list($limit, $search, $order['column'], $order['dir']);
        $count = $listform->get_form_count($search);

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
    public static function get_forms_returns() {
        return new external_single_structure(
            array(
                "data" => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            "shortcode" => new external_value(PARAM_TEXT, "Shortcode of form"),
                            "title" => new external_value(PARAM_TEXT, "Title of form"),
                            "type" => new external_value(PARAM_ALPHA, "Type of form"),
                            "author" => new external_value(PARAM_TEXT, "Original Author"),
                            "created" => new external_value(PARAM_TEXT, "Time when form is created"),
                            "author2" => new external_value(PARAM_TEXT, "Secondary Author"),
                            "modified" => new external_value(PARAM_TEXT, "Time when form is modified"),
                            "actions" => new external_value(PARAM_RAW, "Actions which can be performed on the form"),
                        )
                    ),
                    'Form details',
                    VALUE_DEFAULT,
                    []
                ),
                "recordsTotal" => new external_value(PARAM_INT, "Total records found"),
                "recordsFiltered" => new external_value(PARAM_INT, "Total filtered record")
            )
        );
    }
}