<?php

class __Mustache_edc10a147390f45f32b22ea173c3b10f extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<h1>Biaya Pendidikan</h1>
';
        $buffer .= $indent . '<hr>
';
        // 'biaya' section
        $value = $context->find('biaya');
        $buffer .= $this->sectionBac42a7c6ab225418cb75f676d178861($context, $indent, $value);

        return $buffer;
    }

    private function sectionBac42a7c6ab225418cb75f676d178861(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<table class="table table-responsive table-striped table-hover align-middle">
    <tbody>
        <tr class="table-secondary">
            <th width="50px">No</th>
            <th width="150px">Semester</th>
            <th width="300px">Total Bayar</th>
            <th width="100px">Bank</th>
            <th width="100px">Status</th>
        </tr>
        <tr>
            <th width="50px">{{fieldid}}</th>
            <th width="150px">{{content}}</th>
            <th width="300px"></th>
            <th width="100px"></th>
            <th width="100px"></th>
        </tr>
    </tbody>
</table>
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
                
                $buffer .= $indent . '<table class="table table-responsive table-striped table-hover align-middle">
';
                $buffer .= $indent . '    <tbody>
';
                $buffer .= $indent . '        <tr class="table-secondary">
';
                $buffer .= $indent . '            <th width="50px">No</th>
';
                $buffer .= $indent . '            <th width="150px">Semester</th>
';
                $buffer .= $indent . '            <th width="300px">Total Bayar</th>
';
                $buffer .= $indent . '            <th width="100px">Bank</th>
';
                $buffer .= $indent . '            <th width="100px">Status</th>
';
                $buffer .= $indent . '        </tr>
';
                $buffer .= $indent . '        <tr>
';
                $buffer .= $indent . '            <th width="50px">';
                $value = $this->resolveValue($context->find('fieldid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '            <th width="150px">';
                $value = $this->resolveValue($context->find('content'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '            <th width="300px"></th>
';
                $buffer .= $indent . '            <th width="100px"></th>
';
                $buffer .= $indent . '            <th width="100px"></th>
';
                $buffer .= $indent . '        </tr>
';
                $buffer .= $indent . '    </tbody>
';
                $buffer .= $indent . '</table>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
