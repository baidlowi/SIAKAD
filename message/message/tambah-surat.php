<?php

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/classes/form/tambah-surat.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/tambah-surat.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Buat Surat');

//display from
$mform = new tambahsurat();

if ($mform->is_cancelled()) {
    // Go back to surat.php page
    redirect($CFG->wwwroot . '/local/message/surat.php', 'Anda membatalkan penambahan prestasi');

} else if ($fromform = $mform->get_data()) {

    //var_dump($fromform);
    //die;
    
    $recordtoinsert = new stdClass();
    $recordtoinsert->keperluan = $fromform->keperluan;
    $recordtoinsert->periode = $fromform->periode;
    $recordtoinsert->bahasa = $fromform->bahasa;

    $DB->insert_record('local_surat', $recordtoinsert);
/*
    $manager = new manager();

    if ($fromform->id) {
        // We are updating an existing message.
        $manager->update_message($fromform->id, $fromform->messagetext, $fromform->messagetype);
        redirect($CFG->wwwroot . '/local/message/manage.php', get_string('updated_form', 'local_message') . $fromform->messagetext);
    }

    $manager->create_message($fromform->messagetext, $fromform->messagetype);

    // Go back to manage.php page
    redirect($CFG->wwwroot . '/local/message/manage.php', get_string('created_form', 'local_message') . $fromform->messagetext);
*/
    redirect($CFG->wwwroot . '/local/message/surat.php', 'Kamu membuat prestasi ' . $fromform->keperluan);
}
/*
if ($messageid) {
    // Add extra data to the form.
    global $DB;
    $manager = new manager();
    $message = $manager->get_message($messageid);
    if (!$message) {
        throw new invalid_parameter_exception('message not found');
    }
    $mform->set_data($message);
}
*/

echo $OUTPUT->header();
echo '<h1>Ajukan Surat</h1> <hr><br>';
$mform->display();
echo $OUTPUT->footer();