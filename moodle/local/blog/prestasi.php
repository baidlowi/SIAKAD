<?php

require_once(__DIR__ . '/../../config.php');

global $DB;
if (!isloggedin() or isguestuser()) {
    return redirect($CFG->wwwroot . '/../../login/index.php', 'Harap login terlebih dahulu' );     
   }

$PAGE->set_url(new moodle_url('/local/blog/prestasi.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Prestasi Mahasiswa');

$prestasi = $DB->get_records('local_blogprestasi');

echo $OUTPUT->header();
$templatecontext = (object)[
    'prestasi' => array_values($prestasi),
    'editurl' => new moodle_url('/local/blog/edit-prestasi.php'),
];

echo $OUTPUT->render_from_template('local_blog/prestasi', $templatecontext);

echo $OUTPUT->footer();
