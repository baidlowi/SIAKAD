<?php

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/course/classes/form/addcourse.php');

global $DB, $USER;
if (!isloggedin() or isguestuser()) {
    return redirect($CFG->wwwroot . '/login/index.php', 'Harap login terlebih dahulu' );     
   }

$PAGE->set_url(new moodle_url('/local/course/formulir-rencana-studi.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Formulir Rencana Studi');

$course = $DB->get_records('course');
//$user = $DB->get_records('user');

//Dispay tambah course
$mform = new tambahcourse();

echo $OUTPUT->header();

$templatecontext = (object)[
    'code' => array_values($course),
    'course' => $COURSE->fullname,
    'user' => fullname($USER),
    'nrp' => $USER->username,
];

echo $OUTPUT->render_from_template('local_course/formulir-rencana-studi', $templatecontext);

$mform->display();

echo $OUTPUT->footer();