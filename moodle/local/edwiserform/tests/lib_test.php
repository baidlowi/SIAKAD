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
 * Base class for unit tests for local_edwiserform.
 * @package    local_edwiserform
 * @category   phpunit
 * @copyright  2018 WisdmLabs <support@wisdmlabs.com>
 * @author     Yogesh Shirsath
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;

require_once($CFG->dirroot . '/local/edwiserform/tests/base_test.php');

use local_edwiserform\controller;

class local_edwiserform_lib_testcase extends local_edwiserform_base_testcase {

    public function test_generate_email_user() {
        $controller = controller::instance();

        $emailuser = $controller->generate_email_user('test@gmail.com', 'Yogesh Shirsath', 1);
        $this->assertEquals('test@gmail.com', $emailuser->email);
        $this->assertEquals('Yogesh Shirsath', $emailuser->firstname);
        $this->assertEquals(1, $emailuser->id);
    }

    public function test_edwiserform_send_email() {
        $controller = controller::instance();

        $subject = "PHPUnit Test";
        $messagehtml = "<p>This is sample PHPUnit test";
        $sink = $this->redirectEmails();
        $status = $controller->edwiserform_send_email('test.sender@gmail.com', 'test.receiver@gmail.com', $subject, $messagehtml);
        $messages = $sink->get_messages();
        $this->assertEquals(true, $status, 'Email sent successfully.');
    }

    public function test_can_create_or_view_form() {
        $controller = controller::instance();

        $this->setUser($this->student);
        try {
            $controller->can_create_or_view_form();
        } catch (moodle_exception $ex) {
            $this->assertEquals('You are not allowed to create form. (Please contact Site Admin.)', $ex->getMessage());
        }
        $this->setUser($this->teacher);
        try {
            $controller->can_create_or_view_form();
        } catch (moodle_exception $ex) {
            $this->assertEquals(
                'You are not allowed to create form. Contact Admin to enable form creation. (Please contact Site Admin.)',
                $ex->getMessage()
            );
        }
        $this->setUser($this->editingteacher);
        try {
            $controller->can_create_or_view_form();
        } catch (moodle_exception $ex) {
            $this->assertEquals(
                'You are not allowed to create form. Contact Admin to enable form creation. (Please contact Site Admin.)',
                $ex->getMessage()
            );
        }
        set_config('enable_teacher_forms', true, 'local_edwiserform');
        $this->assertEquals(true, $controller->can_create_or_view_form(), 'Editing Teacher can create form.');
        $this->setUser($this->teacher);
        $this->assertEquals(true, $controller->can_create_or_view_form(), 'Teacher can create form.');
    }
}
