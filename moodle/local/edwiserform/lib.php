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
 * lib functions requried by Moodle
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

// Edwiser Forms Usage Tracking (Forms Analytics).
$ranalytics = new \local_edwiserform\usage_tracking();
$ranalytics->send_usage_analytics();

/**
 * Call cron on the assign module.
 * @return boolean
 * @since Edwiser Form 1.0.0
 */
function local_edwiserform_cron() {
    global $CFG;
    require_once($CFG->dirroot . '/local/edwiserform/locallib.php');
    $edwiserform = new edwiserform();
    $edwiserform->cron();
    return true;
}

/**
 * Serves the files from the edwiserform file areas
 * @param stdClass $course the course object
 * @param stdClass $cm the course module object
 * @param stdClass $context the edwiserform's context
 * @param string $filearea the name of the file area
 * @param array $args extra arguments (itemid, path)
 * @param bool $forcedownload whether or not force download
 * @param array $options additional options affecting the file serving
 * @since Edwiser Form 1.0.0
 */
function local_edwiserform_pluginfile(
    $course,
    $cm,
    $context,
    $filearea,
    array $args,
    $forcedownload = 0,
    array $options = array()
) {
    if ($context->contextlevel != CONTEXT_SYSTEM) {
        send_file_not_found();
    }
    $itemid = (int)array_shift($args);
    $relativepath = implode('/', $args);
    $fullpath = "/{$context->id}/local_edwiserform/$filearea/$itemid/$relativepath";
    $fs = get_file_storage();
    if (!($file = $fs->get_file_by_hash(sha1($fullpath)))) {
        return false;
    }
    // Download MUST be forced - security!
    send_stored_file($file, 0, 0, $forcedownload, $options);
}

/**
 * Adding edwiser form list link in sidebar for admin and teacher
 * @param navigation_node $nav navigation node
 * @since Edwiser Form 1.2.0
 */
function local_edwiserform_extend_navigation(navigation_node $nav) {
    global $CFG, $PAGE;

    $controller = local_edwiserform\controller::instance();

    if (!get_config('local_edwiserform', 'enable_sidebar_navigation')) {
        return;
    }
    $can = $controller->can_create_or_view_form(false, true);
    if ($can != true) {
        return;
    }
    if ($PAGE->theme->resolve_image_location('icon', 'local_edwiserform', null)) {
        $icon = new pix_icon('icon', '', 'local_edwiserform', array('class' => 'icon pluginicon'));
    } else {
        $icon = new pix_icon('spacer', '', 'moodle', array(
            'class' => 'spacer',
            'width' => 1,
            'height' => 1
        ));
    }

    // Archieve page node.
    $nav->add(
        get_string('pluginname', 'local_edwiserform'),
        new moodle_url($CFG->wwwroot . '/local/edwiserform/view.php'),
        navigation_node::NODETYPE_BRANCH,
        null,
        'local_edwiserform-list',
        $icon
    )->showinflatnavigation = true;
}
