<?php
require_once("$CFG->libdir/formslib.php");

class tambahcourse extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
        $mform = $this->_form;
        
        $choices = array();
        $choices[''] = "--Pilih Mata Kuliah--";
        $choices['Manajemen Basis Data'] = "Manajemen Basis Data";
        $choices['Rancang Bangun Perangkat Lunak'] = "Rancang Bangun Perangkat Lunak    ";
        $choices['Sistem Enterprise'] = "Sistem Enterprise";
        $mform->addElement('select', 'jeniskompetisi', 'Ambil Mata Kuliah', $choices);
        $mform->setDefault('keniskompetisi', '0');

        $this->add_action_buttons();
    }
    function validation($data, $files) {
        return array();
    }
}