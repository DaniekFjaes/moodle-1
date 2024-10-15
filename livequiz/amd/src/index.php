<?php
require_once('../../../../config.php');
require_login();

$PAGE->set_url(new moodle_url('/mod/livequiz/wwwroot/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title("Live Quiz");

echo $OUTPUT->header();

echo $OUTPUT->footer();