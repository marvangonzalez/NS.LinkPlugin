<?php

require_once('../../config.php');

$id = required_param('id', PARAM_INT); // Course Module ID

if (!$cm = get_coursemodule_from_id('helloworld', $id)) {
    print_error('invalidcoursemodule');
}

if (!$course = $DB->get_record('course', array('id' => $cm->course))) {
    print_error('coursemisconf');
}

if (!$helloworld = $DB->get_record('helloworld', array('id' => $cm->instance))) {
    print_error('invalidid', 'helloworld');
}

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);

$PAGE->set_url('/mod/helloworld/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($helloworld->name));
$PAGE->set_heading(format_string($course->fullname));

// Obtener el nombre del usuario actual
global $USER;
$username = fullname($USER);

// Obtener el nombre del curso
$coursename = format_string($course->fullname);

// Determinar el modo (Examen o Normal)
$mode = ($helloworld->exammode) ? 'Examen' : 'Normal';

echo $OUTPUT->header();
echo $OUTPUT->heading('Hola Mundo, ' . $username . ' en el curso ' . $coursename . ' en modo ' . $mode);
echo $OUTPUT->footer();
