<?php

require_once("$CFG->libdir/formslib.php");

class tambahsurat extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
        $mform = $this->_form;
        
        $choices = array();
        $choices['Keterangan Mahasiswa Aktif'] = "Keterangan Mahasiswa Aktif";
        $choices['KTM Pengganti'] = "KTM Pengganti";
        $choices['Cuti'] = "Cuti";
        $choices['Pengunduran Diri'] = "Pengunduran Diri";
        $mform->addElement('select', 'keperluan', 'Keperluan Surat', $choices);
        $mform->addRule('keperluan', null, 'required');

        $choices = array();
        $choices['Ganjil'] = "Ganjil";
        $choices['Genap'] = "Genap";
        $mform->addElement('select', 'periode', 'Periode', $choices);
        $mform->addRule('periode', null, 'required');

        $choices = array();
        $choices[''] = "--Pilih Bahasa--";
        $choices['Indonesia'] = "Indonesia";
        $mform->addElement('select', 'bahasa', 'Periode', $choices);
        $mform->addRule('bahasa', null, 'required');

        $this->add_action_buttons();
    }
    function validation($data, $files) {
        return array();
    }
}

