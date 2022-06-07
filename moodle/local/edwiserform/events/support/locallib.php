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
 * Support event functionality
 * @package   edwiserformevents_support
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/local/edwiserform/events/events.php');

/**
 * Support event class definition
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class edwiserform_events_support extends edwiserform_events_plugin {

    /**
     * Execute event action after form submission
     * @param  object $form Form object
     * @param  object $data Data submitted by user
     * @return object       Data with attached event data
     * @since  Edwiser Form 1.0.0
     */
    public function attach_data($form, $data) {
        return $this->attach_common_data($form, $data);
    }

    /**
     * Returns does plugin support multiple submissions for single user
     * @return bool
     * @since  Edwiser Form 1.2.0
     */
    public function support_multiple_submissions() {
        return true;
    }
}
