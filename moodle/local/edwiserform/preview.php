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
 * Edwiser Forms settings
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

require_once('../../config.php');

require_login();

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
    $out .= html_writer::tag('input', '', array('type' => 'hidden', 'id' => 'edwiserform-fullpage', 'value' => true));
    $out .= html_writer::start_tag('div', array('class' => 'edwiserform-root-container'));
    $out .= html_writer::start_tag('div', array('class' => 'edwiserform-wrap-container'));
    $out .= html_writer::start_tag('form', array('id' => 'preview-form', 'class' => 'edwiserform-container', 'method' => 'post'));
    $out .= html_writer::end_tag('form');
    $out .= html_writer::end_tag('div');
    $out .= html_writer::end_tag('div');
    $sitekey = get_config('local_edwiserform', 'google_recaptcha_sitekey');
    if (trim($sitekey) == '') {
        $sitekey = 'null';
    }
    $stringmanager = get_string_manager();
    $strings = $stringmanager->load_component_strings('local_edwiserform', 'en');
    $PAGE->requires->strings_for_js(array_keys($strings), 'local_edwiserform');
    $PAGE->requires->js(new moodle_url('https://www.google.com/recaptcha/api.js'));
    $PAGE->requires->data_for_js('definition', $form->definition);
    $PAGE->requires->js_call_amd('local_edwiserform/preview_form', 'init', array($form->title, $sitekey));
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
