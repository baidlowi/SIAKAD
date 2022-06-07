<?php

class __Mustache_4d88251b2fff676e26fbb6d86f0a3319 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<h1>Layanan Surat Mahasiswa</h1>
';
        $buffer .= $indent . '<hr><br>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<table class="table table-responsive table-striped table-hover align-middle">
';
        $buffer .= $indent . '    <tbody class="align-center">
';
        $buffer .= $indent . '        <tr class="table-secondary">
';
        $buffer .= $indent . '            <th width="50px">No</th>
';
        $buffer .= $indent . '            <th width="600x">Keperluan</th>
';
        $buffer .= $indent . '            <th width="100px">File Berkas</th>
';
        $buffer .= $indent . '        </tr>
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '        <tr>';
        // 'surat' section
        $value = $context->find('surat');
        $buffer .= $this->section21a69837441b5747d83e0838f2b3a61a($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </tbody>
';
        $buffer .= $indent . '</table>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<input type="button" class="btn btn-primary" value="Ajukan Surat" onclick="location.href=\'';
        $value = $this->resolveValue($context->find('editurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '\'">';

        return $buffer;
    }

    private function section21a69837441b5747d83e0838f2b3a61a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <th width="50px">{{id}}</th>
            <th width="600x">{{keperluan}}</th>
            <th width="100px">{{file}}</th>
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
                $value = $this->resolveValue($context->find('keperluan'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '            <th width="100px">';
                $value = $this->resolveValue($context->find('file'), $context);
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
