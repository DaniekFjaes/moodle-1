<?php
require_once("$CFG->libdir/formslib.php");

class createquizform extends moodleform {
    public function definition() {
        global $CFG;

        $mform = $this->_form;

        $mform->addElement('text', 'name', "Quiz Name");
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', get_string('missingname'), 'required', null, 'client');

        $mform->addElement('textarea', "quiz_Description", "Description");
        $mform->setType('description', PARAM_TEXT);

        $mform->addElement('button', 'buttonaddquestion', "add question", array('name' => 'buttonaddquestion'));
        $mform->addElement('button', 'buttonsubmit', "submit", array('name' => 'buttonsubmit'));
    }
}

