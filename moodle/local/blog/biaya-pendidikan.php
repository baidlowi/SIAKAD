<?php

require_once(__DIR__ . '/../../config.php');

global $DB;
if (!isloggedin() or isguestuser()) {
    return redirect($CFG->wwwroot . '/../../login/index.php', 'Harap login terlebih dahulu' );     
   }

$PAGE->set_url(new moodle_url('/local/blog/biaya-pendidikan.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Biaya Pendidikan');


$semester = $DB->get_record('data_content', array('fieldid'=>'5'));
$biaya = $DB->get_record('data_content', array('fieldid'=>'1'));
$bank = $DB->get_record('data_content', array('fieldid'=>'4'));
$status = $DB->get_record('data_content', array('fieldid'=>'3'));
// $semester = $DB->get_records_sql("SELECT *
// FROM {data_content} 
// order by recordid",
// array('fieldid' => '1'));

echo $OUTPUT->header();

$templatecontext = (object)[
    'biaya' => $biaya,
    'semester' => $semester,
    'bank' => $bank,
    'status' => $status,
    //'select' => "SELECT content WHERE fieldid='1'"($biaya),
    'editurl' => new moodle_url('/local/blog/edit-biaya.php'),
    'nominal' => $sql,
];

//$nominal ="SELECT content where fieldid = '1'";
echo $OUTPUT->render_from_template('local_blog/biaya', $templatecontext);

echo $OUTPUT->footer();
