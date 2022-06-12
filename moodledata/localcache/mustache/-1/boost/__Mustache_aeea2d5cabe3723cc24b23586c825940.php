<?php

class __Mustache_aeea2d5cabe3723cc24b23586c825940 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<footer id="page-footer" class="py-3 bg-primary text-light align-center">
';
        $buffer .= $indent . '    <div class="container-fluid">
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.login_info'), $context);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '        <a href="http://127.0.0.1">Sistem Informasi Akademik</a>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</footer>';

        return $buffer;
    }
}
