<?php

class __Mustache_00e483d679be780e27fa7d4cec9a21bc extends Mustache_Template
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
        $buffer .= $this->sectionF7233d400b64547e987ed9017bbb544f($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '<input type="button" class="btn btn-primary" value="Tambah Prestasi" onclick="location.href=\'';
        $value = $this->resolveValue($context->find('editurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '\'">';

        return $buffer;
    }

    private function sectionF7233d400b64547e987ed9017bbb544f(Mustache_Context $context, $indent, $value)
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
        <tr>
            <th width="50px">{{id}}</th>
            <th width="600x">{{keperluan}}</th>
            <th width="100px">{{file}}</th>
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
                $buffer .= $indent . '
';
                $buffer .= $indent . '        </tr>
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
