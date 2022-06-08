<?php

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/blog/classes/form/edit-prestasi.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/blog/edit-prestasi.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Edit Prestasi');

//display from
$mform = new editPrestasi();

if ($mform->is_cancelled()) {
    // Go back to manage.php page
    redirect($CFG->wwwroot . '/local/blog/prestasi.php', 'Anda membatalkan penambahan prestasi');

} else if ($fromform = $mform->get_data()) {

    //var_dump($fromform);
    //die;

    $recordtoinsert = new stdClass();
    $recordtoinsert->jeniskompetisi = $fromform->jeniskompetisi;
    $recordtoinsert->namakompetisi = $fromform->namakompetisi;
    $recordtoinsert->skalakompetisi = $fromform->skalakompetisi;
    $recordtoinsert->penyelenggara = $fromform->penyelenggara;
    $recordtoinsert->tanggalmulai = $fromform->tanggalmulai;
    $recordtoinsert->berkas = $fromform->berkas;
    $recordtoinsert->status = $fromform->status;

    $DB->insert_record('local_blogprestasi', $recordtoinsert);
/*
    $manager = new manager();

    if ($fromform->id) {
        // We are updating an existing blog.
        $manager->update_blog($fromform->id, $fromform->blogtext, $fromform->blogtype);
        redirect($CFG->wwwroot . '/local/blog/manage.php', get_string('updated_form', 'local_blog') . $fromform->blogtext);
    }

    $manager->create_blog($fromform->blogtext, $fromform->blogtype);

    // Go back to manage.php page
    redirect($CFG->wwwroot . '/local/blog/manage.php', get_string('created_form', 'local_blog') . $fromform->blogtext);
*/
    redirect($CFG->wwwroot . '/local/blog/prestasi.php', 'Kamu membuat prestasi ' . $fromform->namakompetisi);
}
/*
if ($blogid) {
    // Add extra data to the form.
    global $DB;
    $manager = new manager();
    $blog = $manager->get_blog($blogid);
    if (!$blog) {
        throw new invalid_parameter_exception('blog not found');
    }
    $mform->set_data($blog);
}
*/

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();