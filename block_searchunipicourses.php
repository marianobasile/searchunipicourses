<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin Bookmarks Block page.
 *
 * @package    block
 * @subpackage searchunipicourses
 * @copyright  University Of Pisa
 * @author     Mariano Basile
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

/**
 * The Search Courses Autocomplete block class
 */
class block_searchunipicourses extends block_base {
    
    public function init() {
        $this->title = get_string('plugin_name', 'block_searchunipicourses');
    }

    public function get_content() {

        //global $CFG;
        $this->content = new stdClass();

        $my_block = "";

        $params = array();
        $module = array(
            'name' => 'ricerca_corsi_unipi',
            'fullpath' => '/blocks/searchunipicourses/js/module.js'
        );
        $my_block .= $this->page->requires->js_init_call('M.search_courses.init', array(
            $params
        ), false, $module);

        $my_block .= "<div id=\"ricerca_corsi_unipi\">";
        $my_block .= "<label for=\"search_course_by_course_name\">" . get_string('course_label', 'block_searchunipicourses') . "</label>";
        $my_block .= "<input id=\"search_course_by_course_name\" type = \"text\" title = \"Inserire il corso da ricercare\"></input>";
        $my_block .= "<label for=\"search_course_by_teacher\">" . get_string('teacher_label', 'block_searchunipicourses') . "</label>";
        $my_block .= "<input id=\"search_course_by_teacher\" type = \"text\" title = \"Inserire il cognome del docente titolare del corso da ricercare\"></input>";
        $my_block .= "</div>";

        $this->content->text = $my_block;
        
        return $this->content;
    }

    public function applicable_formats() {
        return array(
            'site-index' => true,
            'site' => true,
            'course-view' => true,
            'my' => true
        );
    }
}
