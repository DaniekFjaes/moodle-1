<?php
require_once('../../config.php');
require_login();

$PAGE->set_url(new moodle_url('/mod/livequiz/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title("Live Quiz");

// Include the Angular app
echo $OUTPUT->header();

// Read and echo the contents of the index.html file
$indexHtmlPath = __DIR__ . '/index.html';
if (file_exists($indexHtmlPath)) {
    $indexHtmlContent = file_get_contents($indexHtmlPath);
    echo $indexHtmlContent;
} else {
    echo "Error: index.html file not found.";
}

echo $OUTPUT->footer();