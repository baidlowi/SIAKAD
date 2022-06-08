<?php

require_once("$CFG->libdir/formslib.php");

class editPrestasi extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
        $mform = $this->_form;
        
        $choices = array();
        $choices['Program Kompetisi Mahasiswa'] = "Program Kompetisi Mahasiswa";
        $choices['Olahraga'] = "Olahraga";
        $choices['Mandiri atau Umum'] = "Mandiri atau Umum";
        $mform->addElement('select', 'jeniskompetisi', 'Jenis Kompetisi', $choices);
        $mform->setDefault('jeniskompetisi', '2');
        $mform->addRule('jeniskompetisi', null, 'required');

        $mform->addElement('text', 'namakompetisi', 'Nama Kompetisi'); // Add elements to your form
        $mform->setType('namakompetisi', PARAM_NOTAGS);                   //Set type of element
        $mform->addRule('namakompetisi', null, 'required');

        $choices = array();
        $choices['Institutsi'] = "Institutsi";
        $choices['Provinsi'] = "Provinsi";
        $choices['Nasional'] = "Nasional";
        $choices['Internasional'] = "Internasional";
        $mform->addElement('select', 'skalakompetisi', 'Skala Kompetisi', $choices);
        $mform->setDefault('skalakompetisi', '0');
        $mform->addRule('skalakompetisi', null, 'required');

        $mform->addElement('text', 'penyelenggara', 'Penyelenggara'); // Add elements to your form
        $mform->setType('penyelenggara', PARAM_NOTAGS);                   //Set type of element
        $mform->addRule('penyelenggara', null, 'required');

        $mform->addElement('date_selector', 'tanggalmulai', 'Tanggal Kompetisi'); // Add elements to your form
        $mform->setType('tanggalmulai', PARAM_NOTAGS);                   //Set type of element
        $mform->addRule('tanggalmulai', null, 'required');

        //$mform->addElement('filepicker', 'berkas', 'Berkas Bukti'); // Add elements to your form
        //$mform->setType('berkas', PARAM_NOTAGS);                   //Set type of element

        // Restrict the possible upload file types.
        if (!empty($features['acceptedtypes'])) {
            $acceptedtypes = $features['acceptedtypes'];
        } else {
            $acceptedtypes = '*';
        }

        // File upload.
        $mform->addElement('filepicker', 'berkas', 'Berkas Bukti', null, array('accepted_types' => $acceptedtypes));
        $mform->addRule('berkas', null, 'required');
        $encodings = core_text::get_encodings();

        $choices = array();
        $choices['Juara 1'] = "Juara 1";
        $choices['Juara 2'] = "Juara 2";
        $choices['Juara 3'] = "Juara 3";
        $choices['Finalis'] = "Finalis";
        $mform->addElement('select', 'status', 'Status', $choices);
        $mform->addRule('status', null, 'required');

        $this->add_action_buttons();
    }
    function validation($data, $files) {
        return array();
    }
}