<?php

require_once('../config.php');

$PAGE->set_url('/login/logout.php');
$PAGE->set_context(context_system::instance());

$sesskey = optional_param('sesskey', '__notpresent__', PARAM_RAW); // Mengantisipasi untuk mencegah peringatan sesskey default nol
$login   = optional_param('loginpage', 0, PARAM_BOOL);

// Dapatkan direct ke url login
if ($login) {
    $redirect = get_login_url();
} else {
    $redirect = $CFG->wwwroot.'/';
}

if (!isloggedin()) {
    require_logout();
    redirect($redirect);

} else if (!confirm_sesskey($sesskey)) {
    $PAGE->set_title($SITE->fullname);
    $PAGE->set_heading($SITE->fullname);
    echo $OUTPUT->header();
    echo $OUTPUT->confirm(get_string('logoutconfirm'), new moodle_url($PAGE->url, array('sesskey'=>sesskey())), $CFG->wwwroot.'/');
    echo $OUTPUT->footer();
    die;
}

$authsequence = get_enabled_auth_plugins(); // 
foreach($authsequence as $authname) {
    $authplugin = get_auth_plugin($authname);
    $authplugin->logoutpage_hook();
}

require_logout();

redirect($redirect);
