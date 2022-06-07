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
 * Edwiser Forms services list.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam
 */

defined('MOODLE_INTERNAL') || die();
$functions = [
    'edwiserform_create_new_form' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'create_new_form',
        'classpath' => '',
        'description' => 'Creates new form.',
        'type' => 'write',
        'loginrequired' => true,
        'ajax' => true,
    ],
    'edwiserform_update_form_settings' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'update_form',
        'classpath' => '',
        'description' => 'Updates the form setting and definition.',
        'type' => 'write',
        'loginrequired' => true,
        'ajax' => true,
    ],
    'edwiserform_delete_form' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'delete_form',
        'classpath' => '',
        'description' => 'Provides the functionality to delete from.',
        'type' => 'write',
        'loginrequired' => true,
        'ajax' => true,
    ],
    'edwiserform_get_form_definition' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'get_form_definition',
        'classpath' => '',
        'description' => 'Provides the functionality to get the form definition',
        'type' => 'read',
        'loginrequired' => false,
        'ajax' => true,
    ],
    'edwiserform_submit_form_data' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'submit_form_data',
        'classpath' => '',
        'description' => 'Saving data submited by form',
        'type' => 'write',
        'loginrequired' => false,
        'ajax' => true,
    ],
    'edwiserform_get_template' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'get_template',
        'classpath' => '',
        'description' => 'Returns template definition',
        'type' => 'read',
        'loginrequired' => true,
        'ajax' => true,
    ],
    'edwiserform_enable_disable_form' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'enable_disable_form',
        'classpath' => '',
        'description' => 'Enable or disable form',
        'type' => 'write',
        'loginrequired' => true,
        'ajax' => true
    ],
    'edwiserform_get_form_submissions' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'get_form_submissions',
        'classpath' => '',
        'description' => 'Get form submissions',
        'type' => 'read',
        'loginrequired' => true,
        'ajax' => true
    ],
    'edwiserform_get_forms' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'get_forms',
        'classpath' => '',
        'description' => 'Get forms',
        'type' => 'read',
        'loginrequired' => true,
        'ajax' => true
    ],
    'edwiserform_delete_submissions' => [
        'classname' => 'local_edwiserform\external\efb_api',
        'methodname' => 'delete_submissions',
        'classpath' => '',
        'description' => 'Delete form submissions',
        'type' => 'write',
        'loginrequired' => true,
        'ajax' => true
    ],
];
