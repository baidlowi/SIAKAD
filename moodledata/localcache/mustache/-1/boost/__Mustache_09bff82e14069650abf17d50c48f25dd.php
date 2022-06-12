<?php

class __Mustache_09bff82e14069650abf17d50c48f25dd extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($parent = $this->mustache->loadPartial('mod_forum/social_discussion_list')) {
            $context->pushBlockContext(array(
                'discussion_create_text' => array($this, 'blockF6ec41db0c8299fc5b9786d917fc38f2'),
                'discussion_top_pagination' => array($this, 'blockD41d8cd98f00b204e9800998ecf8427e'),
                'discussion_bottom_pagination' => array($this, 'block42a69d28c51201f205e0b90567113d6c'),
            ));
            $buffer .= $parent->renderInternal($context, $indent);
            $context->popBlockContext();
        }

        return $buffer;
    }

    private function sectionEcfce418daf3acedbc7f31951ebf57d5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'addanewtopic, forum';
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
                
                $buffer .= 'addanewtopic, forum';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section581f7add52ff6906be44abade58583c3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'oldertopics, mod_forum';
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
                
                $buffer .= 'oldertopics, mod_forum';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section99de6bf2301715de05973760119603a7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <a href="{{{forum.urls.view}}}">{{#str}}oldertopics, mod_forum{{/str}}...</a>
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
                
                $buffer .= $indent . '            <a href="';
                $value = $this->resolveValue($context->findDot('forum.urls.view'), $context);
                $buffer .= $value;
                $buffer .= '">';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section581f7add52ff6906be44abade58583c3($context, $indent, $value);
                $buffer .= '...</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    public function blockF6ec41db0c8299fc5b9786d917fc38f2($context)
    {
        $indent = $buffer = '';
        $buffer .= $indent . '        ';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionEcfce418daf3acedbc7f31951ebf57d5($context, $indent, $value);
        $buffer .= '
';
    
        return $buffer;
    }

    public function blockD41d8cd98f00b204e9800998ecf8427e($context)
    {
        $indent = $buffer = '';
    
        return $buffer;
    }

    public function block42a69d28c51201f205e0b90567113d6c($context)
    {
        $indent = $buffer = '';
        // 'hasmore' section
        $value = $context->find('hasmore');
        $buffer .= $this->section99de6bf2301715de05973760119603a7($context, $indent, $value);
    
        return $buffer;
    }
}
