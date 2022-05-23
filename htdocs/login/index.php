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

echo $OUTPUT->header();
echo $OUTPUT->footer();
