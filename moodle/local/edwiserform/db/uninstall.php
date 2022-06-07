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
 * Edwiser Forms uninstall hook.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Uninstall hook for local_edwiserform plugin
 * Here we delete all the files uploaded in moodle directory using this plugin
 * @return boolean status
 * @since Edwiser Form 1.1.0
 */
function xmldb_local_edwiserform_uninstall() {
    global $DB, $CFG;
    $fs = get_file_storage();
    $fs->delete_area_files(context_system::instance()->id, EDWISERFORM_COMPONENT, EDWISERFORM_SUCCESS_FILEAREA);
    return true;
}
