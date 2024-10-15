<?php
require_once('../../../config.php');
require_once('../form/createquizform.php');
require_login();

$PAGE->set_url(new moodle_url('/mod/livequiz/quizcreator'));

$PAGE->set_context(context_system::instance());
$PAGE->set_title("Make a quiz");
$PAGE->set_heading("Create a quiz");

echo $OUTPUT->header();

$mform = new createquizform();

if (isset($_POST['buttonaddquestion'])) {
    echo "Button clicked!";
}

$mform->display();


echo $OUTPUT->footer();
