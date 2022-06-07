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
 * New form sections class
 * @package   local_edwiserform
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @author    Sudam
 */

namespace local_edwiserform;

defined('MOODLE_INTERNAL') || die();

use stdClass;

/**
 * Form section data details
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class new_form_sections {


    /**
     * $navitem Sidebar navigation items
     * @var array
     */
    private $navitem;

    /**
     * $panels Panels
     * @var array
     */
    private $panels;

    /**
     * $logo Logo url
     * @var string
     */
    private $logo;

    /**
     * $formtitle Form title
     * @var string
     */
    private $formtitle;

    /**
     * $formid Form id
     * @var integer
     */
    private $formid;

    /**
     * $formaction Page header
     * @var string
     */
    private $formaction;

    /**
     * $headerbutton Header buttons list
     * @var array
     */
    private $headerbutton;

    /**
     * $panelsetup Panel setup data
     * @var array
     */
    private $panelsetup;

    /**
     * $builderactive on true builder panel will be visible
     * @var boolean
     */
    private $builderactive;

    /**
     * $buildericons Form builder svg icon
     * @var string
     */
    private $buildericons;

    /**
     * Get complete form section data object
     * @return stdClass Create new form section data
     */
    public function get_form_section_data() {
        $this->section_data = new stdClass();
        $this->section_data->nav_item = $this->get_nav_item();
        $this->section_data->panels = $this->get_panels();
        $this->section_data->logo = $this->get_logo();
        $this->section_data->formtitle = $this->get_form_title();
        $this->section_data->formid = $this->get_formid();
        $this->section_data->formaction = $this->get_form_action();
        $this->section_data->headerbutton = $this->get_header_button();
        $this->section_data->panelsetup = $this->get_panel_setup();
        $this->section_data->builderactive = $this->get_builder_active();
        $this->section_data->buildericons = $this->get_builder_icons();
        return $this->section_data;
    }

    /**
     * Getter for panelsetup
     * @return array All panels setup data
     */
    public function get_panel_setup() {
        return $this->panelsetup;
    }

    /**
     * Setter for panelsetup
     * @param array $panelsetup All panels setup data
     */
    public function set_panel_setup($panelsetup) {
        $this->panelsetup = $panelsetup;
    }

    /**
     * Getter for nav_item
     * @return array Sidebar navigation items,
     */
    public function get_nav_item() {
        return $this->nav_item;
    }

    /**
     * Setter for nav_item
     * @param array $navitem Sidebar navigation ites,
     */
    public function set_nav_item($navitem) {
        $this->nav_item = $navitem;
    }

    /**
     * Getter for panels
     * @return array Panels array
     */
    public function get_panels() {
        return $this->panels;
    }

    /**
     * Setter for panels
     * @param array $panels Panels array
     */
    public function set_panels($panels) {
        $this->panels = $panels;
    }

    /**
     * Getter for logo
     * @return string Logo url
     */
    public function get_logo() {
        return $this->logo;
    }

    /**
     * Setter for logo
     * @param string $logo Logo url
     */
    public function set_logo($logo) {
        $this->logo = $logo;
    }

    /**
     * Getter for formtitle
     * @return string Form title
     */
    public function get_form_title() {
        return $this->formtitle;
    }

    /**
     * Setter for formtitle
     * @param string $formtitle Form title
     */
    public function set_form_title($formtitle) {
        $this->formtitle = $formtitle;
    }

    /**
     * Getter for formid
     * @return integer Form id
     */
    public function get_formid() {
        return $this->formid;
    }

    /**
     * Setter for formid
     * @param integer $formid Form id
     */
    public function set_formid($formid) {
        $this->formid = $formid;
    }

    /**
     * Getter for formaction
     * @return string Current form action
     */
    public function get_form_action() {
        return $this->formaction;
    }

    /**
     * Setter for formaction
     * @param string $formaction Current form action
     */
    public function set_form_action($formaction) {
        $this->formaction = $formaction;
    }

    /**
     * Getter for headerbutton
     * @return array Header buttons array
     */
    public function get_header_button() {
        return $this->headerbutton;
    }

    /**
     * Setter for headerbutton
     * @param array $headerbutton Header buttons array
     */
    public function set_header_button($headerbutton) {
        $this->headerbutton = $headerbutton;
    }

    /**
     * Getter for builderactive
     * @return boolean True if editing existing form
     */
    public function get_builder_active() {
        return $this->builderactive;
    }

    /**
     * Setter for builderactive
     * @param boolean $builderactive True if editing existing form
     */
    public function set_builder_active($builderactive) {
        $this->builderactive = $builderactive;
    }

    /**
     * Getter for buildericons
     * @return html HTML format svg icons
     */
    public function get_builder_icons() {
        return $this->buildericons;
    }

    /**
     * Setter for buildericons
     * @param html $buildericons HTML format svg icons
     */
    public function set_builder_icons($buildericons) {
        $this->buildericons = $buildericons;
    }
}
