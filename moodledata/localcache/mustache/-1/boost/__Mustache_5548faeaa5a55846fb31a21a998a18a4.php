<?php

class __Mustache_5548faeaa5a55846fb31a21a998a18a4 extends Mustache_Template
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
        // 'surat' section
        $value = $context->find('surat');
        $buffer .= $this->section20a4515ba3f418f588e8fe08c5d76936($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '<input type="button" class="btn btn-primary" value="Ajukan Surat" onclick="location.href=\'';
        $value = $this->resolveValue($context->find('editurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '\'">';

        return $buffer;
    }

    private function section20a4515ba3f418f588e8fe08c5d76936(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<table class="table table-responsive table-striped table-hover align-middle">
    <tbody class="align-center">
        <tr class="table-secondary">
            <th width="50px">No</th>
            <th width="600x">Keperluan</th>
            <th width="100px">File Berkas</th>
        </tr>
    </tbody>
</table>
<table>
        <tr>
            <th width="50px">{{id}}</th>
            <th width="600x">{{keperluan}}</th>
            <th width="100px">{{file}}</th>
        </tr>
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
                $buffer .= $indent . '    </tbody>
';
                $buffer .= $indent . '</table>
';
                $buffer .= $indent . '<table>
';
                $buffer .= $indent . '        <tr>
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
                $buffer .= $indent . '        </tr>
';
                $buffer .= $indent . '    </table>
';
                $buffer .= $indent . '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
