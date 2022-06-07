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
 * Main page to Create/Edit, list form and list form data.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/local/edwiserform/locallib.php');

global $CFG, $PAGE, $OUTPUT;
require_login();
$context = context_system::instance();
$PAGE->set_context($context);
$stringmanager = get_string_manager();
$strings = $stringmanager->load_component_strings('local_edwiserform', 'en');
$PAGE->requires->strings_for_js(array_keys($strings), 'local_edwiserform');
$page = optional_param('page', 'listforms', PARAM_TEXT);
$urlparam = array('page' => $page);
$formid = optional_param('formid', null, PARAM_INT);
if ($formid) {
    $urlparam['formid'] = $formid;
    // Switching between layout of new form and list form/formdata.
}
$title = $page;
if ($page == 'newform') {
    if ($formid != null) {
        $title = 'editform';
    }
    $PAGE->set_pagelayout('popup');
} else {
    $PAGE->set_pagelayout('admin');
}
$efbpagetitle = get_string('heading-' . $title, 'local_edwiserform');
$PAGE->set_title($efbpagetitle);
$PAGE->set_heading($efbpagetitle);
$PAGE->set_url(new moodle_url("/local/edwiserform/view.php", $urlparam));
$edwiserform = new edwiserform();
$out = $edwiserform->view($page);
$out = $OUTPUT->header() . $out;
$out .= $OUTPUT->footer();
echo $out;
