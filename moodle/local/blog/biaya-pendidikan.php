<?php

require_once(__DIR__ . '/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/blog/biaya-pendidikan.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Biaya Pendidikan');

$biaya = $DB->get_records('data_content');

echo $OUTPUT->header();
$templatecontext = (object)[
    'biaya' => array_values($biaya),
    'editurl' => new moodle_url('/local/blog/edit-biaya.php'),
];

echo $OUTPUT->render_from_template('local_blog/biaya', $templatecontext);

echo $OUTPUT->footer();