<?php

class __Mustache_797773b80ec9d661d4ff2245fbe4d184 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<h1>Prestasi Mahasiswa</h1>
';
        $buffer .= $indent . '<hr>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<table class="table table-responsive table-hover align-middle">
';
        $buffer .= $indent . '    <tbody class="align-center">
';
        $buffer .= $indent . '        <tr class="table-secondary">
';
        $buffer .= $indent . '            <th width="50px">No</th>
';
        $buffer .= $indent . '            <th width="600x">Nama Kompetisi</th>
';
        $buffer .= $indent . '            <th width="100px">Status</th>
';
        $buffer .= $indent . '        </tr>
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '        <tr>';
        // 'prestasi' section
        $value = $context->find('prestasi');
        $buffer .= $this->section1c0c4a5112aa022a7df81d61b4e86011($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </tbody>
';
        $buffer .= $indent . '</table>
';
        $buffer .= $indent . '<input type="button" class="btn btn-primary" value="Tambah Prestasi" onclick="location.href=\'';
        $value = $this->resolveValue($context->find('editurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '\'">';

        return $buffer;
    }

    private function section1c0c4a5112aa022a7df81d61b4e86011(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <th width="50px">{{id}}</th>
            <th width="600x">{{namakompetisi}}</th>
            <th width="100px">{{status}}</th>
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
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '            <th width="600x">';
                $value = $this->resolveValue($context->find('namakompetisi'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '            <th width="100px">';
                $value = $this->resolveValue($context->find('status'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '        </tr>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
