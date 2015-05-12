<?php
require_once('../../config.php');

if(!defined('AJAX_SCRIPT')) {
    define('AJAX_SCRIPT', true);
}

require_once($CFG->libdir . '/datalib.php');
require_once($CFG->libdir . '/accesslib.php');

//global $CFG, $DB;$USER;

$query = $_GET['query'];

$courses = array();
$c = 0; // counts how many visible courses we've seen
$course_count = 10;

$params = array();
$params['contextlevel'] = CONTEXT_COURSE;

    $sql = " SELECT c.*, u.lastname, u.firstname
                    
    FROM mdl_course c
    JOIN mdl_context ct ON c.id = ct.instanceid
    JOIN mdl_role_assignments ra ON ra.contextid = ct.id
    JOIN mdl_user u ON u.id = ra.userid
    JOIN mdl_role r ON r.id = ra.roleid

    WHERE r.id =3 and u.lastname like '%$query%' ";


$rs = $DB->get_recordset_sql($sql, $params);


$limitfrom = 0;
$limitto   = $limitfrom + $course_count;

if (!empty($rs)) {
    foreach($rs as $course) {
        if (!$course->visible) {
            // preload contexts only for hidden courses or courses we need to return
            context_helper::preload_from_record($course);
            $coursecontext = context_course::instance($course->id);
            if (!has_capability('moodle/course:viewhiddencourses', $coursecontext)) {
                continue;
            }
        }
        // Don't exit this loop till the end
        // we need to count all the visible courses
        // to update $totalcount
        if ($c >= $limitfrom && $c < $limitto) {
            $courses[$course->id] = $course;
        }
            $c++;
    }
    $rs->close();
    $courses['results'] = array_values($courses);
    echo json_encode($courses);
}