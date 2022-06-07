<?php

require_once('../config.php');
require_once($CFG->dirroot . '/user/editlib.php');
require_once($CFG->dirroot . '/user/lib.php');

$userid = optional_param('id', $USER->id, PARAM_INT);

$PAGE->set_url('/user/defaulthomepage.php', ['id' => $userid]);

list($user, $course) = useredit_setup_preference_page($userid, SITEID);

$form = new core_user\form\defaulthomepage_form();

$user->defaulthomepage = get_user_preferences('user_home_page_preference', HOMEPAGE_MY, $user);
$form->set_data($user);

$redirect = new moodle_url('/user/preferences.php', ['userid' => $user->id]);
if ($form->is_cancelled()) {
    redirect($redirect);
} else if ($data = $form->get_data()) {
    $userupdate = [
        'id' => $user->id,
        'preference_user_home_page_preference' => $data->defaulthomepage,
    ];

    useredit_update_user_preference($userupdate);

    \core\event\user_updated::create_from_userid($userupdate['id'])->trigger();

    redirect($redirect);
}

$PAGE->navbar->includesettingsbase = true;

$strdefaulthomepageuser = get_string('defaulthomepageuser');

$PAGE->set_title("$course->shortname: $strdefaulthomepageuser");
$PAGE->set_heading(fullname($user, true));

echo $OUTPUT->header();
echo $OUTPUT->heading($strdefaulthomepageuser);

$form->display();

echo $OUTPUT->footer();
