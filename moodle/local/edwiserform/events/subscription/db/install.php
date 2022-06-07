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
 * Install hook
 * @package   edwiserformevents_subscription
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Install hook for subscription event
 * @return bool true
 */
function xmldb_edwiserformevents_subscription_install() {
    global $DB;
    $record = $DB->get_record('efb_form_templates', array('name' => 'subscription'));
    $new  = false;
    if (!$record) {
        $new = true;
        $record = new stdClass;
        $record->name = 'subscription';
    }

    // @codingStandardsIgnoreLine
    $record->definition = '{"id":"d0675294-e2fd-4d30-bf21-ada1866b9c73","settings":{"formSettings":{"form":{"class":{"title":"Css Class","id":"class","type":"text","value":"efb-form"},"background-color":{"title":"Background color","id":"background-color","type":"color","value":"#ffffff"},"width":{"title":"Width(%)","id":"width","type":"range","value":"100","attrs":{"min":"20","max":"100"}},"padding":{"title":"Padding(px)","id":"padding","type":"range","value":"40","attrs":{"min":"0","max":"100"}},"color":{"title":"Label color","id":"color","type":"color","value":"#000000"},"display-label":{"title":"Field label position","id":"display-label","type":"select","value":"top","options":{"option1":{"value":"off","label":"No label","selected":false},"option2":{"value":"top","label":"Top","selected":true},"option3":{"value":"left","label":"Left","selected":false}}},"style":{"title":"Custom Css Style","id":"style","type":"textarea","value":""}},"submit":{"class":{"title":"Css Class","id":"class","type":"text","value":"btn btn-primary"},"text":{"title":"Label","id":"text","type":"text","value":"Submit"},"processing-text":{"title":"Processing label","id":"processing-text","type":"text","value":"Submitting...."},"position":{"title":"Position","id":"position","type":"select","value":"center","options":{"option1":{"value":"left","label":"Left","selected":false},"option2":{"value":"center","label":"Center","selected":true},"option3":{"value":"right","label":"Right","selected":false}}},"style":{"title":"Custom Css Style","id":"style","type":"textarea","value":""}}}},"stages":{"0b594cc5-8e65-4a9d-8ddf-7397a02dc360":{"title":"Step 1","id":"0b594cc5-8e65-4a9d-8ddf-7397a02dc360","settings":{},"rows":["3d9df036-0f97-4877-8c0c-45054390ce17","c0419304-e937-49f7-8c5a-159853f89695","b8b6b9ca-eb0c-4d98-931f-df587a164afa"]}},"rows":{"3d9df036-0f97-4877-8c0c-45054390ce17":{"columns":["48e6bf22-1b78-41c5-b752-e071cb6d26a3"],"id":"3d9df036-0f97-4877-8c0c-45054390ce17","config":{"fieldset":false,"legend":"","inputGroup":false},"attrs":{"className":"f-row"},"conditions":[]},"c0419304-e937-49f7-8c5a-159853f89695":{"columns":["bbac1be8-5247-4fd6-b526-534cc54c64e9","78ef3bc0-8733-4193-9bd2-88b47138aa2c"],"id":"c0419304-e937-49f7-8c5a-159853f89695","config":{"fieldset":false,"legend":"","inputGroup":false},"attrs":{"className":"f-row"},"conditions":[]},"b8b6b9ca-eb0c-4d98-931f-df587a164afa":{"columns":["eeb8b989-bd5a-4da6-9c35-80ec1c328d57"],"id":"b8b6b9ca-eb0c-4d98-931f-df587a164afa","config":{"fieldset":false,"legend":"","inputGroup":false},"attrs":{"className":"f-row"},"conditions":[]}},"columns":{"48e6bf22-1b78-41c5-b752-e071cb6d26a3":{"fields":["2d7f5726-aabe-43e5-8710-fe772ad1251c"],"id":"48e6bf22-1b78-41c5-b752-e071cb6d26a3","config":{"width":"100%"},"style":"width: 100%","tag":"div","content":[{"tag":"p","attrs":{"className":"","style":"","placeholder":"This is a sample event that is going to take place in school auditorium kindly register for this event beforehand, if you wish to attend it."},"config":{"label":"Paragraph","hideLabel":true,"editable":true},"meta":{"group":"html","icon":"paragraph","id":"paragraph"},"content":"This is a sample event that is going to take place in school auditorium kindly register for this event beforehand, if you wish to attend it.","id":"2d7f5726-aabe-43e5-8710-fe772ad1251c"}],"attrs":{"className":["f-render-column"]}},"bbac1be8-5247-4fd6-b526-534cc54c64e9":{"fields":["6e52cc11-488c-478d-a268-8a6b2c80e73d"],"id":"bbac1be8-5247-4fd6-b526-534cc54c64e9","config":{"width":"50%"},"style":"width: 50%","tag":"div","content":[{"tag":"input","attrs":{"type":"text","required":true,"name":"firstname","className":"form-control","style":"","placeholder":"Firstname"},"config":{"disabledAttrs":["type","template"],"label":"Firstname"},"meta":{"group":"standard","icon":"text-input","id":"text-input"},"fMap":"attrs.value","id":"6e52cc11-488c-478d-a268-8a6b2c80e73d"}],"attrs":{"className":["f-render-column"]}},"78ef3bc0-8733-4193-9bd2-88b47138aa2c":{"fields":["1851a005-8bbf-4d71-b2b5-a1f069fc7ebb"],"id":"78ef3bc0-8733-4193-9bd2-88b47138aa2c","config":{"width":"50%"},"style":"width: 50%","tag":"div","content":[{"tag":"input","attrs":{"type":"text","required":true,"name":"lastname","className":"form-control","style":"","placeholder":"Lastname"},"config":{"disabledAttrs":["type","template"],"label":"Lastname"},"meta":{"group":"standard","icon":"text-input","id":"text-input"},"fMap":"attrs.value","id":"1851a005-8bbf-4d71-b2b5-a1f069fc7ebb"}],"attrs":{"className":["f-render-column"]}},"eeb8b989-bd5a-4da6-9c35-80ec1c328d57":{"fields":["3e29bd01-5b95-40c0-866f-758910ceae46"],"id":"eeb8b989-bd5a-4da6-9c35-80ec1c328d57","config":{"width":"100%"},"style":"width: 100%","tag":"div","content":[{"tag":"input","attrs":{"type":"email","required":true,"name":"email","className":"form-control","style":"","placeholder":"Email"},"config":{"disabledAttrs":["type","template"],"label":"Email"},"meta":{"group":"standard","icon":"email","id":"email"},"fMap":"attrs.value","id":"3e29bd01-5b95-40c0-866f-758910ceae46"}],"attrs":{"className":["f-render-column"]}}},"fields":{"2d7f5726-aabe-43e5-8710-fe772ad1251c":{"tag":"p","attrs":{"template":true,"className":"","style":"","placeholder":"This is a sample event that is going to take place in school auditorium kindly register for this event beforehand, if you wish to attend it."},"config":{"label":"Paragraph","hideLabel":true,"editable":true},"meta":{"group":"html","icon":"paragraph","id":"paragraph"},"content":"This is a sample event that is going to take place in school auditorium kindly register for this event beforehand, if you wish to attend it.","id":"2d7f5726-aabe-43e5-8710-fe772ad1251c"},"6e52cc11-488c-478d-a268-8a6b2c80e73d":{"tag":"input","attrs":{"type":"text","required":true,"template":true,"name":"firstname","className":"form-control","style":"","placeholder":"Firstname"},"config":{"disabledAttrs":["type","template"],"label":"Firstname"},"meta":{"group":"standard","icon":"text-input","id":"text-input"},"fMap":"attrs.value","id":"6e52cc11-488c-478d-a268-8a6b2c80e73d"},"1851a005-8bbf-4d71-b2b5-a1f069fc7ebb":{"tag":"input","attrs":{"type":"text","required":true,"template":true,"name":"lastname","className":"form-control","style":"","placeholder":"Lastname"},"config":{"disabledAttrs":["type","template"],"label":"Lastname"},"meta":{"group":"standard","icon":"text-input","id":"text-input"},"fMap":"attrs.value","id":"1851a005-8bbf-4d71-b2b5-a1f069fc7ebb"},"3e29bd01-5b95-40c0-866f-758910ceae46":{"tag":"input","attrs":{"type":"email","required":true,"template":true,"name":"email","className":"form-control","style":"","placeholder":"Email"},"config":{"disabledAttrs":["type","template"],"label":"Email"},"meta":{"group":"standard","icon":"email","id":"email"},"fMap":"attrs.value","id":"3e29bd01-5b95-40c0-866f-758910ceae46"}}}';
    if ($new) {
        $DB->insert_record('efb_form_templates', $record, false);
        return;
    }
    $DB->update_record('efb_form_templates', $record, false);
    return;
}
