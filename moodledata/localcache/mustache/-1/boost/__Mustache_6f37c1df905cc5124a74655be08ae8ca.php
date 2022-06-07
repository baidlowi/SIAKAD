<?php

class __Mustache_6f37c1df905cc5124a74655be08ae8ca extends Mustache_Template
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
        // 'prestasi' section
        $value = $context->find('prestasi');
        $buffer .= $this->section9068da3842c3db48c7b667bd0d2137b3($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '<hr>
';
        $buffer .= $indent . '<input type="button" class="btn btn-primary" value="Tambah Prestasi" onclick="location.href=\'';
        $value = $this->resolveValue($context->find('editurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '\'">';

        return $buffer;
    }

    private function section9068da3842c3db48c7b667bd0d2137b3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <p>{{namakompetisi}}</p>
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
                
                $buffer .= $indent . '    <p>';
                $value = $this->resolveValue($context->find('namakompetisi'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
