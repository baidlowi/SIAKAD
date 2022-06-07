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
require_once($CFG->dirroot . '/local/edwiserform/classes/external/efb_api.php');

use local_edwiserform\external\efb_api;

class local_edwiserform_external_testcase extends local_edwiserform_base_testcase {

    protected $formid = null;

    protected $form = null;

    protected $errorcreatingform = null;

    protected function create_test_form($settings = null) {
        global $DB;
        $data = new \stdClass();
        $data->title = 'Test';
        $data->description = 'Test description';
        $data->author = 2;
        $data->type = $this->get_form_type();
        $data->notifi_email = '';
        $data->message = 'Response message';
        $data->data_edit = true;
        $data->definition = $this->get_form_definition();
        $data->enabled = 0;
        $data->deleted = 0;
        if ($settings != null) {
            foreach ($settings as $key => $value) {
                $data->$key = $value;
            }
        }
        try {
            $this->formid = $DB->insert_record("efb_forms", $data, $returnid = true, $bulk = false);
            $this->form = $data;
        } catch (\Exception $ex) {
            $this->errorcreatingform = $ex->getMessage();
        }
    }

    protected function get_test_data() {
        return json_encode([
            [
                'name' => 'firstname',
                'value'  => 'Testfirstname'
            ],
            [
                'name' => 'lastname',
                'value'  => 'Testlastname'
            ],
            [
                'name' => 'mobile',
                'value'  => 'Testmobile'
            ],
            [
                'name' => 'email',
                'value'  => 'Testemail'
            ]
        ]);
    }

    protected function add_test_data($formid) {
        global $DB, $USER;
        $data = new stdClass;
        $data->formid = $formid;
        $data->userid = $USER->id;
        $data->submission = $this->get_test_data();
        $DB->insert_record('efb_form_data', $data);
    }

    public function test_delete_form() {
        global $DB;
        $this->create_test_form();
        $deleted = $DB->get_field('efb_forms', 'deleted', array('id' => $this->formid));
        $this->assertEquals(0, $deleted);

        efb_api::delete_form($this->formid);
        $deleted = $DB->get_field('efb_forms', 'deleted', array('id' => $this->formid));
        $this->assertEquals(1, $deleted);
    }

    public function test_enable_disable_form() {
        global $DB;
        $this->create_test_form();
        $enabled = $DB->get_field('efb_forms', 'enabled', array('id' => $this->formid));
        $this->assertEquals(0, $enabled);

        efb_api::enable_disable_form($this->formid, true);
        $enabled = $DB->get_field('efb_forms', 'enabled', array('id' => $this->formid));
        $this->assertEquals(1, $enabled);
    }

    public function test_create_new_form() {
        global $DB;
        $this->setAdminUser();
        $setting = array(
            'title' => 'Test',
            'description' => 'Test description',
            'type' => $this->get_form_type(),
            'notifi_email' => '',
            'message' => 'Response message',
            'data_edit' => true,
            'draftitemid' => 1
        );
        $def = $this->get_form_definition();
        $result = efb_api::create_new_form($setting, $def);
        $this->assertEquals(true, $result['status']);
    }

    public function test_get_form_definition() {
        global $DB;
        $this->setAdminUser();
        $this->create_test_form();

        // Testing formid is less than 1.
        $result = efb_api::get_form_definition(0);
        $this->assertEquals(get_string("form-not-found", "local_edwiserform", '0'), $result['msg']);

        // Testing deleted form.
        $data          = new stdClass();
        $data->id      = $this->formid;
        $data->deleted = true;
        $DB->update_record("efb_forms", $data);
        $result = efb_api::get_form_definition($this->formid);
        $data->deleted = false;
        $DB->update_record("efb_forms", $data);
        $this->assertEquals(get_string("form-not-found", "local_edwiserform", ''.$this->formid), $result['msg']);

        // Testing disabled form.
        $result = efb_api::get_form_definition($this->formid);
        $this->assertEquals(get_string("form-not-enabled", "local_edwiserform", ''.$this->form->title), $result['msg']);

        // Testing success.
        $data->enabled = true;
        $DB->update_record("efb_forms", $data);
        $result = efb_api::get_form_definition($this->formid);
        $this->assertEquals(get_string("form-definition-found", "local_edwiserform"), $result['msg']);

        // Testing formdata submitted but data edit not enabled.
        $this->add_test_data($this->formid);
        $data->data_edit = false;
        $DB->update_record("efb_forms", $data);
        $result = efb_api::get_form_definition($this->formid);
        $data->data_edit = true;
        $DB->update_record("efb_forms", $data);
        $this->assertEquals(get_string("form-cannot-submit", "local_edwiserform"), $result['msg']);

        // Testing formdata submitted and data edit enabled.
        $result = efb_api::get_form_definition($this->formid);
        $this->assertEquals(get_string("form-definition-found", "local_edwiserform"), $result['msg']);
    }

    public function test_get_template() {
        global $DB;
        $template = 'registration';
        // Testing template not found.
        $result = efb_api::get_template($template);
        $this->assertEquals(false, $result['status']);

        // Testing template found.
        $record = new stdClass;
        $record->name = $template;
        $record->definition = $this->get_form_definition();
        $DB->insert_record('efb_form_templates', $record, false);
        $result = efb_api::get_template($template);
        $this->assertEquals(true, $result['status']);
    }

    public function test_submit_form_data() {
        global $DB;
        $this->redirectEmails();
        // Testing form data submission for invalid form id.
        $result = efb_api::submit_form_data(0, $this->get_test_data());
        $this->assertEquals(get_string("form-data-submission-failed", "local_edwiserform"), $result['msg']);
        $this->create_test_form();

        // Testing form data submission.
        $this->create_test_form(array('enabled' => true));
        $result = efb_api::submit_form_data($this->formid, $this->get_test_data());
        $this->assertEquals("<p>" . get_string(
            "form-data-submission-successful",
            "local_edwiserform"
        ) . "</p>" . get_string('confirmation-email-success', 'local_edwiserform'), $result['msg']);

        // Testing edit form data.
        $this->setAdminUser();
        efb_api::submit_form_data($this->formid, $this->get_test_data());
        $result = efb_api::submit_form_data($this->formid, $this->get_test_data());
        $this->assertEquals("<p>" . get_string(
            "form-data-submission-successful",
            "local_edwiserform"
        ) . "</p>" . get_string('confirmation-email-success', 'local_edwiserform'), $result['msg']);
    }

    public function test_update_form() {
        global $DB;
        $this->setAdminUser();
        $this->create_test_form();

        // Testing form update.
        $setting = array(
            'id' => $this->formid,
            'title' => 'Test',
            'description' => 'Test description',
            'data_edit' => true,
            'type' => $this->get_form_type(),
            'notifi_email' => '',
            'message' => 'Response message',
            'draftitemid' => 1
        );
        $def = $this->get_form_definition();
        $result = efb_api::update_form($setting, $def);
        $this->assertEquals(get_string("form-setting-update-msg", "local_edwiserform"), $result['msg']);

        // Testing form has submission and no form changes.
        $this->add_test_data($this->formid);
        $result = efb_api::update_form($setting, $def);
        $this->assertEquals(get_string("form-setting-update-msg", "local_edwiserform"), $result['msg']);

        // Testing form has submission and settings change.
        $setting['title'] = 'Update Test';
        $setting['description'] = 'Update test description';
        $setting['data_edit'] = false;
        $result = efb_api::update_form($setting, $def);
        $this->assertEquals(get_string("form-setting-update-msg", "local_edwiserform"), $result['msg']);

        // Testing form has submission and definition change.
        $setting['type'] = 'subscription';
        $def = $DB->get_field('efb_form_templates', 'definition', array('name' => 'subscription'));
        $result = efb_api::update_form($setting, $def);
        $this->assertEquals(get_string("form-def-update-fail-msg", "local_edwiserform", PRO_URL), $result['msg']);
    }
}
