<?php

require_once(__DIR__ . '/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/surat.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Layanan Surat Mahasiswa');

$surat = $DB->get_records('local_surat');

echo $OUTPUT->header();
$templatecontext = (object)[
    'surat' => array_values($surat),
    'editurl' => new moodle_url('/local/message/tambah-surat.php'),
];

echo $OUTPUT->render_from_template('local_message/surat', $templatecontext);

echo $OUTPUT->footer();