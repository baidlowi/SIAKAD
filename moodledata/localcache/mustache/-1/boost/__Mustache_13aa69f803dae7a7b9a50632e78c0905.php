<?php

class __Mustache_13aa69f803dae7a7b9a50632e78c0905 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($parent = $this->mustache->loadPartial('core/drawer')) {
            $context->pushBlockContext(array(
                'drawercontent' => array($this, 'blockA9a1198a5a754bfd7e50247960f300a0'),
            ));
            $buffer .= $parent->renderInternal($context, $indent);
            $context->popBlockContext();
        }
        $buffer .= $indent . '
';
        // 'js' section
        $value = $context->find('js');
        $buffer .= $this->sectionF0c2ff2c291ba52af317c1ae28af0c22($context, $indent, $value);

        return $buffer;
    }

    private function sectionF0c2ff2c291ba52af317c1ae28af0c22(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'jquery\', \'core_message/message_drawer\'], function($, MessageDrawer) {
    var root = $(\'#message-drawer-{{uniqid}}\');
    MessageDrawer.init(root, \'{{uniqid}}\', false);
});
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'jquery\', \'core_message/message_drawer\'], function($, MessageDrawer) {
';
                $buffer .= $indent . '    var root = $(\'#message-drawer-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '\');
';
                $buffer .= $indent . '    MessageDrawer.init(root, \'';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '\', false);
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    public function blockA9a1198a5a754bfd7e50247960f300a0($context)
    {
        $indent = $buffer = '';
        $buffer .= $indent . '        <div id="message-drawer-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" class="message-app" data-region="message-drawer" role="region">
';
        $buffer .= $indent . '            <div class="header-container position-relative" data-region="header-container">
';
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_contacts_header')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_conversation_header')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_overview_header')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_search_header')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_settings_header')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="body-container position-relative" data-region="body-container">
';
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_contact_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_contacts_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_conversation_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_group_info_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_overview_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_search_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_settings_body')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="footer-container position-relative" data-region="footer-container">
';
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_conversation_footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        if ($partial = $this->mustache->loadPartial('core_message/message_drawer_view_overview_footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
    
        return $buffer;
    }
}
