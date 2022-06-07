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
 * Add new form renderable class definition.
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam Chakor
 */

namespace local_edwiserform\output;

defined('MOODLE_INTERNAL') || die();

use local_edwiserform\form_basic_settings;
use local_edwiserform\new_form_sections;
use local_edwiserform\controller;
use renderable, templatable;
use moodle_url;
use context_system;
use stdClass;

/**
 * Class contains methods of add new form page content
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class add_new_form implements renderable, templatable {
    /**
     * Edwiser Forms $controller class instance
     * @var controller
     */
    private $controller;

    /**
     *
     * @var Integer Form id, this will be the form id to edit or it can be the null in case of the new form creation.
     */
    private $formid         = null;

    /**
     * Form sections
     * @var null
     */
    private $formsections = null;

    /**
     * Plugins installed in events directory.
     * @var array
     */
    private $plugin = [];

    /**
     * Constructor for add new form renderable
     * @param  integer $formid The id of form when re-editing form otherwise null
     * @return void
     * @since  Edwiser Form 1.0.0
     */
    public function __construct($formid = null) {
        $this->controller    = controller::instance();
        $this->formid        = $formid;
        $this->plugins        = $this->controller->get_plugins();
        $this->form_sections = new new_form_sections();
        $this->teacher = !is_siteadmin() & $this->controller->is_teacher();
        $this->form = null;
        if ($formid != null) {
            global $DB;
            $this->form = $DB->get_record("efb_forms", array("id" => $this->formid));
        }
        $this->set_default_section_data();
    }

    /**
     * Method provide the functionality to get the forms previous settings.
     * @return array Previous form settings
     * @since  Edwiser Form 1.1.0
     */
    private function get_form_settings() {
        global $CFG;
        $data = array();
        if ($this->form) {
            require_once($CFG->libdir . "/filelib.php");
            $draftid = file_get_submitted_draft_itemid(EDWISERFORM_FILEAREA);
            $context = context_system::instance();
            $message = file_prepare_draft_area(
                $draftid,
                $context->id,
                EDWISERFORM_COMPONENT,
                EDWISERFORM_FILEAREA,
                $this->form->id,
                null,
                $this->form->message
            );
            $data = array(
                "id"             => $this->form->id,
                "title"          => $this->form->title,
                "editdata"       => $this->form->data_edit,
                "description"    => $this->form->description,
                "type"           => $this->form->type,
                "notifi_email"   => $this->form->notifi_email,
                "enable_notification" => true,
                "confirmation_msg" => array(
                    "itemid" => $draftid,
                    "format" => FORMAT_HTML,
                    "text"   => $message
                )
            );
        }
        return $data;
    }

    /**
     * Function to export the renderer data in a format that is suitable for a
     * mustache template.
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     * @since  Edwiser Form 1.0.0
     */
    public function export_for_template(\renderer_base $output) {
        global $PAGE, $CFG;
        $this->form_sections->set_form_action(get_string("form-editing", "local_edwiserform"));
        if ($this->form) {
            $PAGE->requires->data_for_js('formdefinition', $this->form->definition);
            $this->form_sections->set_formid($this->formid);
        }
        $logo = $output->get_logo_url();
        if (!$logo) {
            $logo = $output->image_url("edwiser-logoalternate", "local_edwiserform");
        }
        $this->form_sections->set_logo($logo);
        $this->form_sections->set_builder_icons(file_get_contents($CFG->dirroot . '/local/edwiserform/pix/formeo-sprite.svg'));
        return $this->form_sections->get_form_section_data();
    }

    /**
     * Get container to show form styles
     *
     * @return string style dom container
     * @since  Edwiser Form 1.1.0
     */
    private function get_form_style_container() {
        global $PAGE, $CFG;
        $styles = [];
        for ($i = 1; $i <= SUPPORTED_FORM_STYLES; $i++) {
            $styles[] = [
                'id' => $i,
                'label' => get_string('form-style', 'local_edwiserform')." ".$i,
                'active' => $i == 1,
                'url' => $CFG->wwwroot . '/local/edwiserform/pix/form_style_' . $i . '.png',
                'pro' => true
            ];
        }
        unset($styles[0]['pro']);
        return $styles;
    }

    /**
     * Set defaut section data and current form data this sets sidebar navigation buttons,
     * header buttons and panel containers
     *
     * @since  Edwiser Form 1.1.0
     */
    private function set_default_section_data() {
        global $CFG, $PAGE;
        $settingsparam = array(
            'plugins' => $this->plugins,
            'teacher' => $this->teacher
        );
        $settingsparam['form'] = $this->form ? $this->form : null;
        $formsettings = new form_basic_settings(null, $settingsparam);
        $formdata     = $this->get_form_settings();
        $formsettings->set_data($formdata);
        $headerbutton = array(
            array(
                "id"    => "efb-heading-listforms",
                "label" => get_string("heading-listforms", "local_edwiserform"),
                "url"   => new moodle_url('/local/edwiserform/view.php?page=listforms'),
                "icon"  => "list"
            ),
            array(
                "id"    => "efb-btn-save-form-settings",
                "label" => get_string("btn-save", "local_edwiserform"),
                "url"   => "#",
                "class" => "d-none",
                "icon"  => "check"
            )
        );
        $navitem      = array(
            array(
                "id"      => "efb-form-setup",
                "active"  => $this->form ? "" : "active",
                "panelid" => "#efb-cont-form-setup",
                "label"   => get_string("lbl-form-setup", "local_edwiserform"),
                "icon"    => "fa-cog"
            ),
            array(
                "id"      => "efb-form-settings",
                "panelid" => "#efb-cont-form-settings",
                "label"   => get_string("lbl-form-settings", "local_edwiserform"),
                "icon"    => "fa-wrench"
            ),
            array(
                "id"      => "efb-form-builder",
                "active"  => $this->form ? "active" : "",
                "panelid" => "#efb-cont-form-builder",
                "label"   => get_string("lbl-form-builder", "local_edwiserform"),
                "icon"    => "fa-list-alt"
            ),
            array(
                "id"      => "efb-form-preview",
                "panelid" => "#efb-cont-form-preview",
                "label"   => get_string("lbl-form-preview", "local_edwiserform"),
                "icon"    => "fa-eye"
            )
        );
        $preview = new stdClass;
        $preview->styles = $this->get_form_style_container();
        $panels        = array(
            array(
                "id"      => "efb-cont-form-settings",
                "heading" => get_string("lbl-form-settings", "local_edwiserform"),
                "body"    => "<div class='efb-form-settings'>".$formsettings->render()."</div>"
            ),
            array(
                "id"      => "efb-cont-form-builder",
                "active"  => $this->form ? "active" : "",
                "heading" => get_string("lbl-form-builder", "local_edwiserform"),
                "body"    => "<form class='build-form'></form>",
                "button"  => "<button
                    class='efb-form-step efb-form-step-preview btn-primary fa fa-eye'
                    data-id='efb-form-preview'
                    title='" . get_string(
                        'lbl-form-preview',
                        'local_edwiserform'
                    ) . "'></button>"
            ),
            array(
                "id"      => "efb-cont-form-preview",
                "heading" => get_string("lbl-form-preview", "local_edwiserform"),
                "body"    => $PAGE->get_renderer('local_edwiserform')->render_from_template(
                    'local_edwiserform/new_form_preview_container',
                    $preview
                ),
                "button"  => "<button
                    class='efb-form-step efb-form-step-builder btn-primary fa fa-eye-slash'
                    data-id='efb-form-builder'>
                    </button>"
            ),
        );
        $this->form_sections->set_builder_active($this->form ? "" : "active");
        $this->form_sections->set_nav_item($navitem);
        $this->form_sections->set_panels($panels);
        $this->form_sections->set_header_button($headerbutton);
        $this->form_sections->set_panel_setup($this->setup_data());
    }

    /**
     * Setup templates
     *
     * @return object $setup
     * @since  Edwiser Form 1.2.0
     */
    private function setup_data() {
        foreach (array_keys($this->plugins) as $pluginname) {
            $free[] = array(
                "tmpl_id"        => $pluginname,
                "tmpl_name"      => get_string("event-$pluginname-name", "edwiserformevents_$pluginname"),
                "tmpl_hover_txt" => get_string("event-hover-text", "local_edwiserform"),
                "desc"           => get_string("event-$pluginname-desc", "edwiserformevents_$pluginname"),
            );
        }
        $protemplates = array('blank', 'login', 'enrolment', 'registration');
        foreach ($protemplates as $templatename) {
            $pro[] = array(
                "tmpl_id"        => $templatename,
                "pro"            => true,
                "tmpl_name"      => get_string("event-$templatename-name", "local_edwiserform"),
                "desc"           => get_string("event-$templatename-desc", "local_edwiserform"),
            );
        }
        if ($this->form) {
            $setup["form_name"]["value"] = $this->form->title;
            foreach ($free as $key => $value) {
                $free[$key]["active"] = $value["tmpl_id"] == $this->form->type;
            }
        }
        $heading = $this->form ? 'builder' : 'setup';
        $title = $this->form ? $this->form->title : '';
        $setup = array(
            "id"              => "efb-cont-form-setup",
            "heading"         => get_string("lbl-form-$heading", "local_edwiserform"),
            "title"           => $title,
            "active"          => "active",
            "msg_select_tmpl" => get_string("setup-msg-select-tmpl", "local_edwiserform"),
            "form_name"       => array(
                "label"       => get_string("lbl-form-setup-formname", "local_edwiserform"),
                "placeholder" => get_string("lbl-form-setup-formname-placeholder", "local_edwiserform")
            ),
            "free"            => $free,
            "pro"             => $pro,
            "tmpl_add_title"  => get_string("setup-additional-title", "local_edwiserform"),
            "msg_upgrade"     => get_string("setup-msg-upgrade", "local_edwiserform"),
            "btn_upgrade"     => get_string("setup-btn-upgrade", "local_edwiserform"),
            "pro_url"         => PRO_URL
        );
        return (object) $setup;
    }
}
