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
 * Uninstall hook
 * @package   edwiserformevents_contact
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Uninstall hook of contact event
 * @return bool true
 */
function xmldb_edwiserformevents_contact_uninstall() {
    global $DB;
    $record = $DB->get_record('efb_form_templates', array('name' => 'contact'));
    if ($record) {
        $DB->delete_records('efb_form_templates', array('name' => 'contact'));
    }
    return true;
}
