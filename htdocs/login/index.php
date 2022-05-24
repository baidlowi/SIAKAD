<?php

require('../config.php');
require_once('lib.php');

redirect_if_major_upgrade_required();

$testsession = optional_param('testsession', 0, PARAM_INT); // test sesi
$anchor      = optional_param('anchor', '', PARAM_RAW);     // Used to restore hash anchor to wantsurl.

$resendconfirmemail = optional_param('resendconfirmemail', false, PARAM_BOOL);

// Memanggil halaman login jika user tidak aktif lama
if ($testsession) {
    if ($testsession == $USER->id) {
        if (isset($SESSION->wantsurl)) {
            $urltogo = $SESSION->wantsurl;
        } else {
            $urltogo = $CFG->wwwroot.'/';
        }
        unset($SESSION->wantsurl);
        redirect($urltogo);
    } else {
        // TODO: mencoba cari tahu alasan tidak aktif
        $errormsg = get_string("cookiesnotenabled");
        $errorcode = 1;
    }
}

/// Mengecek waktu sesi/akses habis
if (!empty($SESSION->has_timed_out)) {
    $session_has_timed_out = true;
    unset($SESSION->has_timed_out);
} else {
    $session_has_timed_out = false;
}

$frm  = false;
$user = false;

if ($frm and isset($frm->username)) {                             // Login dengan cookies

    $frm->username = trim(core_text::strtolower($frm->username));

    if (is_enabled_auth('none') ) {
        if ($frm->username !== core_user::clean_field($frm->username, 'username')) {
            $errormsg = get_string('username').': '.get_string("invalidusername");
            $errorcode = 2;
            $user = null;
        }
    }

    if ($user) {	//Mencoba login dengan guest
    } else if (($frm->username == 'guest') and empty($CFG->guestloginbutton)) {
        $user = false;    /// tidak dapat login jika guest disable
        $frm = false;
    } else {
        if (empty($errormsg)) {
            $logintoken = isset($frm->logintoken) ? $frm->logintoken : '';
            $user = authenticate_user_login($frm->username, $frm->password, false, $errorcode, $logintoken);
        }
    }

    // Mencegah user menyetel ulang sandi berulang kali
    if (!$user and $frm and is_restored_user($frm->username)) {
        $PAGE->set_title(get_string('restoredaccount'));
        $PAGE->set_heading($site->fullname);
        echo $OUTPUT->header();
        echo $OUTPUT->heading(get_string('restoredaccount'));
        echo $OUTPUT->box(get_string('restoredaccountinfo'), 'generalbox boxaligncenter');
        require_once('restored_password_form.php'); // Menggunakan "pengganti/supplanter" login_forgot_password_form
        $form = new login_forgot_password_form('forgot_password.php', array('username' => $frm->username));
        $form->display();
        echo $OUTPUT->footer();
        die;
    }

    if ($user) {

        // Menyetel bahasa
        if (isguestuser($user)) {
            unset($user->lang);

        } else if (!empty($user->lang)) {
            // hapus data bahasa sebelumnya dengan menggunakan preferensi dari user
            unset($SESSION->lang);
        }

        if (empty($user->confirmed)) {       // Akun belum terkonfirmasi oleh user
            $PAGE->set_title(get_string("mustconfirm"));
            $PAGE->set_heading($site->fullname);
            echo $OUTPUT->header();
            echo $OUTPUT->heading(get_string("mustconfirm"));
            if ($resendconfirmemail) {
                if (!send_confirmation_email($user)) {
                    echo $OUTPUT->notification(get_string('emailconfirmsentfailure'), \core\output\notification::NOTIFY_ERROR);
                } else {
                    echo $OUTPUT->notification(get_string('emailconfirmsentsuccess'), \core\output\notification::NOTIFY_SUCCESS);
                }
            }
            echo $OUTPUT->box(get_string("emailconfirmsent", "", s($user->email)), "generalbox boxaligncenter");
            $resendconfirmurl = new moodle_url('/login/index.php',
                [
                    'username' => $frm->username,
                    'password' => $frm->password,
                    'resendconfirmemail' => true,
                    'logintoken' => \core\session\manager::get_login_token()
                ]
            );
            echo $OUTPUT->single_button($resendconfirmurl, get_string('emailconfirmationresend'));
            echo $OUTPUT->footer();
            die;
        }

        complete_user_login($user);

        \core\session\manager::apply_concurrent_login_limit($user->id, session_id());

        // set username cookie
        if (!empty($CFG->nolastloggedin)) {
            // Mencegah nolastloggedin tersimpan ke database

        } else if (empty($CFG->rememberusername) or ($CFG->rememberusername == 2 and empty($frm->rememberusername))) {
            // hapus cookie lama jika ada
            set_moodle_cookie('');

        } else {
            set_moodle_cookie($USER->username);
        }

        $urltogo = core_login_get_return_url();
        
        // Buang sesi error apapun sebelum redirect
        unset($SESSION->loginerrormsg);

        // Uji sesi login berhasil
        $SESSION->wantsurl = $urltogo;
        redirect(new moodle_url(get_login_url(), array('testsession'=>$USER->id)));

    } else {
        if (empty($errormsg)) {
            if ($errorcode == AUTH_LOGIN_UNAUTHORISED) {
                $errormsg = get_string("unauthorisedlogin", "", $frm->username);
            } else {
                $errormsg = get_string("invalidlogin");
                $errorcode = 3;
            }
        }
    }
}

echo $OUTPUT->header();

if (isloggedin() and !isguestuser()) {
    // mencegah logging ketika sudah login
    echo $OUTPUT->box_start();
    $logout = new single_button(new moodle_url('/login/logout.php', array('sesskey'=>sesskey(),'loginpage'=>1)), get_string('logout'), 'post');
    $continue = new single_button(new moodle_url('/'), get_string('cancel'), 'get');
    echo $OUTPUT->confirm(get_string('alreadyloggedin', 'error', fullname($USER)), $logout, $continue);
    echo $OUTPUT->box_end();
} else {
    $loginform = new \core_auth\output\login($authsequence, $frm->username);
    $loginform->set_error($errormsg);
    echo $OUTPUT->render($loginform);
}

echo $OUTPUT->footer();
