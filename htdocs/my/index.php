<?php

require_once(__DIR__ . '/../config.php');
require_once($CFG->dirroot . '/my/lib.php');

redirect_if_major_upgrade_required();

// Menambahkan parameter untuk edit/reset
$edit   = optional_param('edit', null, PARAM_BOOL);    // on / off editing
$reset  = optional_param('reset', null, PARAM_BOOL);

require_login();

$hassiteconfig = has_capability('moodle/site:config', context_system::instance());
if ($hassiteconfig && moodle_needs_upgrading()) {
    redirect(new moodle_url('/admin/index.php'));
}

$strmymoodle = get_string('myhome');

if (isguestuser()) {  
    // Jika akun tamu/guest ditolak maka kembali ke halaman depan
    if (empty($CFG->allowguestmymoodle)) {
        redirect(new moodle_url('/', array('redirect' => 0)));
    }

    $userid = null;
    $USER->editing = $edit = 0;  // Untuk berjaga agar user tidak bisa edit
    $context = context_system::instance();
    $PAGE->set_blocks_editing_capability('moodle/my:configsyspages');
    $header = "$SITE->shortname: $strmymoodle (GUEST)";
    $pagetitle = $header;

} else {        // Menambahkan fitur custom halaman dashboard sendiri
    $userid = $USER->id;  // Pemilik Halaman
    $context = context_user::instance($USER->id);
    $PAGE->set_blocks_editing_capability('moodle/my:manageblocks');
    $header = fullname($USER);
    $pagetitle = $strmymoodle;
}

// Info halaman Siakad, jika tidak dapat muncul maka database error
if (!$currentpage = my_get_page($userid, MY_PAGE_PRIVATE)) {
    print_error('mymoodlesetup');
}

// Atur halaman Dashboard
$params = array();
$PAGE->set_context($context);
$PAGE->set_url('/my/index.php', $params);
$PAGE->set_pagelayout('mydashboard');
$PAGE->set_pagetype('my-index');
$PAGE->blocks->add_region('content');
$PAGE->set_subpage($currentpage->id);
$PAGE->set_title($pagetitle);
$PAGE->set_heading($header);

if (!isguestuser()) {   // Skip halaman dashboard untuk tamu/guest
    if (get_home_page() != HOMEPAGE_MY) {
        if (optional_param('setdefaulthome', false, PARAM_BOOL)) {
            set_user_preference('user_home_page_preference', HOMEPAGE_MY);
        } else if (!empty($CFG->defaulthomepage) && $CFG->defaulthomepage == HOMEPAGE_USER) {
            $frontpagenode = $PAGE->settingsnav->add(get_string('frontpagesettings'), null, navigation_node::TYPE_SETTING, null);
            $frontpagenode->force_open();
            $frontpagenode->add(get_string('makethismyhome'), new moodle_url('/my/', array('setdefaulthome' => true)),
                    navigation_node::TYPE_SETTING);
        }
    }
}

// Switch on/off status edit halaman
if (empty($CFG->forcedefaultmymoodle) && $PAGE->user_allowed_editing()) {
    if ($reset !== null) {
        if (!is_null($userid)) {
            require_sesskey();
            if (!$currentpage = my_reset_page($userid, MY_PAGE_PRIVATE)) {
                print_error('reseterror', 'my');
            }
            redirect(new moodle_url('/my'));
        }
    } else if ($edit !== null) {      // Spesifikasi status editing
        $USER->editing = $edit;       // Status editing berubah
    } else {                          // Editing state is in session
        if ($currentpage->userid) {   // Halaman yang dapat diedit
            if (!empty($USER->editing)) {
                $edit = 1;
            } else {
                $edit = 0;
            }
        } else {
            // Block halaman digunakan agar sesuai dengan format halaman
            if (!$currentpage = my_copy_page($USER->id, MY_PAGE_PRIVATE)) {
                print_error('mymoodlesetup');
            }
            $context = context_user::instance($USER->id);
            $PAGE->set_context($context);
            $PAGE->set_subpage($currentpage->id);
            // Halaman sistem, user dilarang edit halaman ini
            $USER->editing = $edit = 0; 
        }
    }

    // Tambahkan tombol edit halaman
    $params = array('edit' => !$edit);

    $resetbutton = '';
    $resetstring = get_string('resetpage', 'my');
    $reseturl = new moodle_url("$CFG->wwwroot/my/index.php", array('edit' => 1, 'reset' => 1));

    if (!$currentpage->userid) {
        // User dapat melihat halaman sistem
        $editstring = get_string('updatemymoodleon');
        $params['edit'] = 1;
    } else if (empty($edit)) {
        $editstring = get_string('updatemymoodleon');
    } else {
        $editstring = get_string('updatemymoodleoff');
        $resetbutton = $OUTPUT->single_button($reseturl, $resetstring);
    }

    $url = new moodle_url("$CFG->wwwroot/my/index.php", $params);
    $button = $OUTPUT->single_button($url, $editstring);
    $PAGE->set_button($resetbutton . $button);

} else {
    $USER->editing = $edit = 0;
}

// Layout Halaman
echo $OUTPUT->header();

echo $OUTPUT->custom_block_region('content');

echo $OUTPUT->footer();

// Trigger dashboard jika ada even parameter tertentu.
$eventparams = array('context' => $context);
$event = \core\event\dashboard_viewed::create($eventparams);
$event->trigger();
