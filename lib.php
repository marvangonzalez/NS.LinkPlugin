<?php
defined('MOODLE_INTERNAL') || die();

function helloworld_add_instance($helloworld) {
    global $DB;
    $helloworld->timecreated = time();
    return $DB->insert_record('helloworld', $helloworld);
}

function helloworld_update_instance($helloworld) {
    global $DB;
    $helloworld->timemodified = time();
    $helloworld->id = $helloworld->instance;
    return $DB->update_record('helloworld', $helloworld);
}

function helloworld_delete_instance($id) {
    global $DB;
    if (!$helloworld = $DB->get_record('helloworld', array('id' => $id))) {
        return false;
    }
    return $DB->delete_records('helloworld', array('id' => $helloworld->id));
}



