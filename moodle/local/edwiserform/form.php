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
 * Demo/Live page definition
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

require_once('../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$formid = required_param('id', PARAM_INT);
$urlparams = array('id' => $formid);
$form = $DB->get_record('efb_forms', array('id' => $formid));
$out = "";
$out .= html_writer::start_tag("div", array("class" => "form form-page"));
if (!$form) {
    $title = "Invalid form";
    $out = "404. Form not found.";
} else {
    $title = $form->title;
    $shortcode = "[edwiser-form id='$formid']";
    $out .= html_writer::tag('input', '', array('type' => 'hidden', 'id' => 'edwiserform-fullpage', 'value' => true));
    $out .= format_text($shortcode);
}
$out .= html_writer::end_tag("div");
$url = new moodle_url('/local/edwiserform/form.php', $urlparams);
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout("popup");
echo $OUTPUT->header();
echo $out;
echo $OUTPUT->footer();
