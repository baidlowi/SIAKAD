<?php

class __Mustache_aabb8786b516271383a3fb6ff1cad4f3 extends Mustache_Template
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '<table class="table table-responsive table-striped">
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
        $buffer .= $indent . '        <tr>';
        // 'biaya' section
        $value = $context->find('biaya');
        $buffer .= $this->section166db329ea7eb50fc7e42b31c3a43c35($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </tbody>
';
        $buffer .= $indent . '</table>
';
        $buffer .= $indent . '
';

        return $buffer;
    }

    private function section166db329ea7eb50fc7e42b31c3a43c35(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <th width="50px">{{fieldid}}</th>
            <th width="150px">{{content}}</th>
            <th width="300px"></th>
            <th width="100px"></th>
            <th width="100px"></th>
        </tr>';
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
                
                $buffer .= '
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
                $buffer .= $indent . '        </tr>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
