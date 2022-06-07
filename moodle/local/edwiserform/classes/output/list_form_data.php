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
 * Description of list form data class
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace local_edwiserform\output;

defined('MOODLE_INTERNAL') || die();

use local_edwiserform\controller;
use renderable, templatable;
use html_writer;
use moodle_url;
use stdClass;

/**
 * Class contains method to list out all forms data using datatable. Also filter using ajax.
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class list_form_data implements renderable, templatable {

    /**
     * Edwiser Forms $controller class instance
     * @var controller
     */
    private $controller;

    /**
     * @var Integer Form id, this will be the form id to edit or it can be the null in case of the new form creation.
     */
    private $formid         = null;

    /**
     * Selected event plugin
     * @var null
     */
    private $plugin         = null;

    /**
     * Constructor for list form data renderable
     * @param  integer $formid The id of form when re-editing form otherwise null
     * @since  Edwiser Form 1.0.0
     */
    public function __construct($formid = null) {
        global $DB;
        $this->decoded = false;
        $this->controller = controller::instance();
        $this->formid = $formid;
        $this->form = $DB->get_record('efb_forms', array('id' => $this->formid));
        $this->plugin = $this->form->type == 'blank' ? null : $this->controller->get_plugin($this->form->type);
        $this->supportsubmission = $this->form->type == 'blank' ? true : $this->plugin->can_save_data();
    }


    /**
     * Function to export the renderer data in a format that is suitable for a
     * mustache template.
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     * @since  Edwiser Form 1.0.1
     */
    public function export_for_template(\renderer_base $output) {
        global $DB, $CFG;
        $data = new stdClass();
        if (!$this->supportsubmission) {
            $data->submissionnotsupport = get_string("form-data-submission-not-supported", "local_edwiserform");
            return $data;
        }
        $data->formid = $this->formid;
        $headings = $this->get_headings();
        $data->heading = $this->form->title;
        $data->headings = array(
            html_writer::tag(
                'input',
                '',
                array(
                    'type' => 'checkbox',
                    'class' => 'submission-check-all'
                )
            ),
            html_writer::tag(
                'div',
                get_string("form-data-heading-user", "local_edwiserform"),
                array('style' => 'width: 250px;')
            ),
            html_writer::tag(
                'div',
                get_string("tbl-heading-submitted", "local_edwiserform"),
                array('style' => 'width: 120px;')
            ),
        );
        $data->pageactions = $this->get_page_actions();
        if (empty($headings)) {
            $data->nodata = get_string("form-data-no-data", "local_edwiserform");
            return $data;
        }
        $supportactions = isset($this->plugin) && $this->plugin->support_form_data_list_actions();
        if ($supportactions) {
            $data->headings[] = get_string("form-data-heading-action", "local_edwiserform");
        }
        if ($headings) {
            $headingsmap = $this->get_name_label_map();
            foreach ($headings as $value) {
                $value = isset($headingsmap[$value]) ? $headingsmap[$value] : $value;
                $data->headings[] = ucfirst($value);
            }
            $data->rows = [];
        }
        return $data;
    }

    /**
     * Returns total number of form data submitted by user in the XYZ form with search criteria
     * @param  integet $formid The id of form
     * @param  string  $search query string to search in the data
     * @return integer         count submission made in the form with filter result
     * @since  Edwiser Form 1.0.0
     */
    public function get_submission_count($formid, $search = '') {
        global $DB, $USER;
        if ($search != "") {
            $search = " AND submission LIKE '%\"value\":\"%" . $search . "%\"%'";
        }
        $sql = "SELECT COUNT(id) total FROM {efb_form_data} WHERE formid = ? $search";
        return $DB->get_record_sql($sql, [$formid])->total;
    }

    /**
     * Get field details using submission name
     * @param  string     $name Name of element
     * @return array|null       If field exist then return field array else null
     * @since  Edwiser Form 1.4.3
     */
    private function get_field_by_name($name) {
        if (!$this->decoded) {
            $this->form->definition = json_decode($this->form->definition, true);
            $this->decoded = true;
        }

        foreach ($this->form->definition['fields'] as $field) {
            if (isset($field['attrs']) && isset($field['attrs']['name']) && $field['attrs']['name'] == $name) {
                return $field;
            }
        }

        return null;
    }


    /**
     * Fetch and return form submissions based on search and sort criteria from data table
     * @param  string $limit number of rows to select
     * @param  string $search query parameter to search in columns
     * @return array rows
     * @since  Edwiser Form 1.0.2
     */
    public function get_submissions_list($limit = "", $search = "") {
        global $DB;

        $supportactions = isset($this->plugin) && $this->plugin->support_form_data_list_actions();

        $headings = $this->get_headings();
        $param = [$this->formid];

        // Prepare search part of sql if search is set.
        $searchsql = "";
        if ($search) {
            $param[] = "%$search%";
            $searchsql .= " AND submission LIKE ? ";
        }

        // If user is not admin or author then list only own submissions.
        if (!is_siteadmin() && $this->form->author != $USER->id && $this->form->author2 != $USER->id) {
            $param[] = $USER->id;
            $searchsql .= " AND userid = ? ";
        }
        $sql = "SELECT * FROM {efb_form_data} WHERE formid = ? $searchsql";
        $records = $DB->get_records_sql($sql, $param, $limit['from'], $limit['to']);

        $rows = [];
        foreach ($records as $record) {
            $formdata = [];
            $formdata[] = html_writer::tag(
                'input',
                '',
                array(
                    'type' => 'checkbox',
                    'class' => 'submission-check',
                    'data-value' => $record->id
                )
            );
            $submission = $record->submission;
            $submission = json_decode($submission);

            $action = html_writer::tag(
                'a',
                get_string('enrol', 'core_enrol') . '(PRO)',
                array(
                    'class' => 'efb-data-action show'
                )
            ) . html_writer::tag(
                'a',
                get_string('suspend', 'local_edwiserform') . '(PRO)',
                array(
                    'class' => 'efb-data-action show'
                )
            ) . html_writer::tag(
                'a',
                get_string('delete'),
                array(
                    'href' => '#',
                    'class' => 'efb-data-action delete-action text-danger show',
                    'data-value' => $record->id
                )
            );

            list($usql, $uparams) = $DB->get_in_or_equal($record->userid);

            $sql = "SELECT id," . get_all_user_name_fields(true) . " FROM {user} WHERE id " . $usql;

            if ($user = $DB->get_record_sql($sql, $uparams)) {
                $userlink = new moodle_url('/user/profile.php', array('id' => $record->userid));

                $formdata[] = html_writer::tag(
                    'a',
                    fullname($user),
                    array('href' => $userlink, 'target' => '_blank', 'class' => 'formdata-user', 'data-userid' => $record->userid)
                ) . html_writer::tag(
                    'div',
                    $action,
                    array('class' => 'efb-data-actions')
                );
            } else {
                $formdata[] = '-';
            }

            if ($supportactions) {
                $formdata[] = $this->plugin->form_data_list_actions($record);
            }

            $submitteddata = array_fill_keys($headings, null);
            $formdata[] = date('d-m-Y H:i:s', $record->date);
            $formdata = array_merge($formdata, $submitteddata);

            foreach ($submission as $elem) {

                $value = $elem->value;

                $field = $this->get_field_by_name($elem->name);

                if ($field != null && $field['tag']) {
                    if (isset($field['attrs']['type']) && in_array($field['attrs']['type'], ['radio', ['checkbox']])) {
                        // If element is radio or checkbox then show label instead of value.
                        foreach ($field['options'] as $option) {
                            if ($option['value'] == $value) {
                                $value = $option['label'];
                                break;
                            }
                        }
                    }
                }

                if (isset($formdata[$elem->name])) {
                    if (!is_array($formdata[$elem->name])) {
                        $formdata[$elem->name] = array($formdata[$elem->name]);
                    }
                    $formdata[$elem->name][] = $value;
                    $value = $formdata[$elem->name];
                }
                $formdata[$elem->name] = $value;
            }

            $formdata = array_values($formdata);
            foreach ($formdata as $key => $value) {
                if (is_array($value)) {
                    $formdata[$key] = html_writer::start_tag('ul');
                    $formdata[$key] .= html_writer::start_tag('li');
                    $formdata[$key] .= implode($value, "</li><li>");
                    $formdata[$key] .= html_writer::end_tag('li');
                    $formdata[$key] .= html_writer::end_tag('ul');
                }
            }
            $rows[] = $formdata;
        }
        return $rows;
    }

    /**
     * Return array having field name and index and it's label as value
     * @return array map of fields name->label
     * @since Edwiser Form 1.0.0
     */
    private function get_name_label_map() {
        global $DB;
        $def = $this->form->definition;
        if (!$def) {
            return false;
        }
        $def = json_decode($def, true);
        $fields = $def["fields"];
        $map = [];
        foreach ($fields as $field) {
            if (isset($field["attrs"]["name"]) && !isset($map[$field["attrs"]["name"]])) {
                $map[$field["attrs"]["name"]] = strip_tags($field["config"]["label"]);
            }
        }
        return $map;
    }

    /**
     * Get column heading of form based on form fileds and there arrangement
     * @return array heading
     * @since Edwiser Form 1.0.4
     */
    public function get_headings() {
        global $DB;
        $def = $this->form->definition;
        if (!$def) {
            return false;
        }
        $def = json_decode($def, true);
        $headings = [];
        foreach ($def["stages"] as $stage) {
            $headings = $this->get_stage($def, $stage, $headings);
        }
        if (!count($headings)) {
            return false;
        }
        return $headings;
    }

    /**
     * Get fields from stage
     * @param array $def form definition
     * @param array $stage data of stage containing rows
     * @param array $headings
     * @return array headings
     * @since Edwiser Form 1.0.4
     */
    private function get_stage(&$def, $stage, $headings) {
        foreach ($stage["rows"] as $row) {
            $headings = $this->get_row($def, $def["rows"][$row], $headings);
        }
        return $headings;
    }

    /**
     * Get fields from row
     * @param array $def form definition
     * @param array $row data of row containing columns
     * @param array $headings
     * @return array headings
     * @since Edwiser Form 1.0.4
     */
    private function get_row(&$def, $row, $headings) {
        foreach ($row["columns"] as $column) {
            $headings = $this->get_column($def, $def["columns"][$column], $headings);
        }
        return $headings;
    }

    /**
     * Get fields from column
     * @param array $def form definition
     * @param array $column data of column containing fileds
     * @param array $headings
     * @return array headings
     * @since Edwiser Form 1.0.4
     */
    private function get_column(&$def, $column, $headings) {
        foreach ($column["fields"] as $field) {
            $headings = $this->get_field($def["fields"][$field], $headings);
        }
        return $headings;
    }

    /**
     * Add field name into headings array and return
     * @param array $field data
     * @param array $headings
     * @return array headings
     * @since Edwiser Form 1.0.4
     */
    private function get_field($field, $headings) {
        switch ($field["tag"]) {
            case "input":
                if ($field["attrs"]["type"] == "password") {
                    break;
                }
            case "select":
            case "textarea":
                $headings[] = strip_tags($field["attrs"]["name"]);
                break;
        }
        return $headings;
    }

    /**
     * Get page actions
     * @return array page actions
     * @since Edwiser Form 1.0.0
     */
    private function get_page_actions() {
        $actions = array(
            array(
                'url' => new moodle_url('/local/edwiserform/view.php', array('page' => 'newform')),
                'label' => get_string('heading-newform', 'local_edwiserform'),
                'icon'  => 'edit'
            ),
            array(
                'url' => new moodle_url('/local/edwiserform/view.php', array('page' => 'listforms')),
                'label' => get_string('heading-listforms', 'local_edwiserform'),
                'icon'  => 'list'
            )
        );
        return $actions;
    }
}
