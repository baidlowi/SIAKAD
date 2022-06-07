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
 * Edwiser Form rendering function class.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace local_edwiserform\output;

defined('MOODLE_INTERNAL') || die();

use plugin_renderer_base;

/**
 * Class contains methods for rendering page contents
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Render add new form page
     *
     * @param  add_new_form $newform New form renderable object
     * @return string                New form page html content
     */
    public function render_add_new_form(add_new_form $newform) {
        $templatecontext = $newform->export_for_template($this);
        return $this->render_from_template('local_edwiserform/new_form', $templatecontext);
    }

    /**
     * Render form list page
     *
     * @param  list_form $listform Form list renderable object
     * @return string              Form list page html content
     */
    public function render_list_form(list_form $listform) {
        $templatecontext = $listform->export_for_template($this);
        return $this->render_from_template('local_edwiserform/list_form', $templatecontext);
    }

    /**
     * Render form data list page
     *
     * @param  list_form_data $listform Form data list renderable object
     * @return string                   Form data list html content
     */
    public function render_list_form_data(list_form_data $listform) {
        $templatecontext = $listform->export_for_template($this);
        return $this->render_from_template('local_edwiserform/list_form_data', $templatecontext);
    }
}
