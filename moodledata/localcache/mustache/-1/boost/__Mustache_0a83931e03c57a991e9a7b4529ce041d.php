<?php

class __Mustache_0a83931e03c57a991e9a7b4529ce041d extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'displaygroupingselector' section
        $value = $context->find('displaygroupingselector');
        $buffer .= $this->section293caa7f3ec9457eb4f4d5c8521883fd($context, $indent, $value);
        // 'displaygroupingselector' inverted section
        $value = $context->find('displaygroupingselector');
        if (empty($value)) {
            
            $buffer .= $indent . '<div class="mb-1 mr-auto">
';
            $buffer .= $indent . '    <span class="filler">&nbsp;</span>
';
            $buffer .= $indent . '</div>
';
        }

        return $buffer;
    }

    private function sectionCdca03c966985271d933771f38d17201(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:groupingdropdown, block_myoverview ';
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
                
                $buffer .= ' aria:groupingdropdown, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC941581ed22833ebdc688d5da36a360a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' i/filter ';
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
                
                $buffer .= ' i/filter ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF8249148f760da3e109caa3663f633ad(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' allincludinghidden, block_myoverview ';
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
                
                $buffer .= ' allincludinghidden, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDd89a06415c3a9738588538d22ed5719(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} allincludinghidden, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionF8249148f760da3e109caa3663f633ad($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7aa86992f913c684aa982299bc5b0237(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' all, block_myoverview ';
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
                
                $buffer .= ' all, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3842a12aa13716271b547dd2b63a83f0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} all, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section7aa86992f913c684aa982299bc5b0237($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section943672e65d749500a0e39a5c5732165b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' inprogress, block_myoverview ';
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
                
                $buffer .= ' inprogress, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section423ab0cbddfc75d44c8e8c6d7354a909(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} inprogress, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section943672e65d749500a0e39a5c5732165b($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section73e2d31fbcff71568286bba0816b9728(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' future, block_myoverview ';
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
                
                $buffer .= ' future, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA95d1da52da1e6b0fb8c273a6af61e45(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} future, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section73e2d31fbcff71568286bba0816b9728($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1e8dea46004e4fe5964bd9187fa70241(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' past, block_myoverview ';
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
                
                $buffer .= ' past, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC723f5724128554b7185f98be27ffdca(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} past, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section1e8dea46004e4fe5964bd9187fa70241($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6a8fa4f1d83488a4bff00ad9c6b4e87c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' favourites, block_myoverview ';
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
                
                $buffer .= ' favourites, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section33d18a9baa544480c9874cbbfef7bfd0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} favourites, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section6a8fa4f1d83488a4bff00ad9c6b4e87c($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section62c24258cc369df41565ccf8e4d02cf8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' hiddencourses, block_myoverview ';
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
                
                $buffer .= ' hiddencourses, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section351479d60e926483df14f8612bc07800(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#str}} hiddencourses, block_myoverview {{/str}}';
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
                
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section62c24258cc369df41565ccf8e4d02cf8($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5749c750acb0d7477dd5257d00cc6d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'active';
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
                
                $buffer .= 'active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2baefc80a6c574d8f63074ae198cd792(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:allcoursesincludinghidden, block_myoverview ';
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
                
                $buffer .= ' aria:allcoursesincludinghidden, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7929ad25c8ad3ee25c6f1c9197a51026(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li>
            <a class="dropdown-item {{#allincludinghidden}}active{{/allincludinghidden}}" href="#" data-filter="grouping" data-value="allincludinghidden" data-pref="allincludinghidden" aria-label="{{#str}} aria:allcoursesincludinghidden, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} allincludinghidden, block_myoverview {{/str}}
            </a>
        </li>
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
                
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'allincludinghidden' section
                $value = $context->find('allincludinghidden');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="allincludinghidden" data-pref="allincludinghidden" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section2baefc80a6c574d8f63074ae198cd792($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionF8249148f760da3e109caa3663f633ad($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBfccddfcef129c993aebf4ea499b00f4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:allcourses, block_myoverview ';
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
                
                $buffer .= ' aria:allcourses, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAe0dca251d2e788644aa038f2018ea7c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#all}}active{{/all}}" href="#" data-filter="grouping" data-value="all" data-pref="all" aria-label="{{#str}} aria:allcourses, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} all, block_myoverview {{/str}}
            </a>
        </li>
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
                
                $buffer .= $indent . '        <li class="dropdown-divider" role="presentation">
';
                $buffer .= $indent . '            <span class="filler">&nbsp;</span>
';
                $buffer .= $indent . '        </li>
';
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'all' section
                $value = $context->find('all');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="all" data-pref="all" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionBfccddfcef129c993aebf4ea499b00f4($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section7aa86992f913c684aa982299bc5b0237($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6a2e4a8597805bb70bcf8a5cd54793e1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:inprogress, block_myoverview ';
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
                
                $buffer .= ' aria:inprogress, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section16efd8a7991cf190bba239063d8c28c6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#inprogress}}active{{/inprogress}}" href="#" data-filter="grouping" data-value="inprogress" data-pref="inprogress" aria-label="{{#str}} aria:inprogress, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} inprogress, block_myoverview {{/str}}
            </a>
        </li>
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
                
                $buffer .= $indent . '        <li class="dropdown-divider" role="presentation">
';
                $buffer .= $indent . '            <span class="filler">&nbsp;</span>
';
                $buffer .= $indent . '        </li>
';
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'inprogress' section
                $value = $context->find('inprogress');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="inprogress" data-pref="inprogress" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section6a2e4a8597805bb70bcf8a5cd54793e1($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section943672e65d749500a0e39a5c5732165b($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8035b57ae92326df403c45b19619cf49(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:future, block_myoverview ';
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
                
                $buffer .= ' aria:future, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEbedcda6cf26e67be34c163b411681cb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{^displaygroupinginprogress}}
            <li class="dropdown-divider" role="presentation">
                <span class="filler">&nbsp;</span>
            </li>
            {{/displaygroupinginprogress}}
        <li>
            <a class="dropdown-item {{#future}}active{{/future}}" href="#" data-filter="grouping" data-value="future" data-pref="future" aria-label="{{#str}} aria:future, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} future, block_myoverview {{/str}}
            </a>
        </li>
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
                
                // 'displaygroupinginprogress' inverted section
                $value = $context->find('displaygroupinginprogress');
                if (empty($value)) {
                    
                    $buffer .= $indent . '            <li class="dropdown-divider" role="presentation">
';
                    $buffer .= $indent . '                <span class="filler">&nbsp;</span>
';
                    $buffer .= $indent . '            </li>
';
                }
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'future' section
                $value = $context->find('future');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="future" data-pref="future" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section8035b57ae92326df403c45b19619cf49($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section73e2d31fbcff71568286bba0816b9728($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section60cb1bc6b8bef86f0ebcc4100b812ad9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:past, block_myoverview ';
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
                
                $buffer .= ' aria:past, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA9acf566fcd74a84a5672063fc2cb2b8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{^displaygroupinginprogress}}
                {{^displaygroupingfuture}}
                <li class="dropdown-divider" role="presentation">
                    <span class="filler">&nbsp;</span>
                </li>
                {{/displaygroupingfuture}}
            {{/displaygroupinginprogress}}
        <li>
            <a class="dropdown-item {{#past}}active{{/past}}" href="#" data-filter="grouping" data-value="past" data-pref="past" aria-label="{{#str}} aria:past, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} past, block_myoverview {{/str}}
            </a>
        </li>
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
                
                // 'displaygroupinginprogress' inverted section
                $value = $context->find('displaygroupinginprogress');
                if (empty($value)) {
                    
                    // 'displaygroupingfuture' inverted section
                    $value = $context->find('displaygroupingfuture');
                    if (empty($value)) {
                        
                        $buffer .= $indent . '                <li class="dropdown-divider" role="presentation">
';
                        $buffer .= $indent . '                    <span class="filler">&nbsp;</span>
';
                        $buffer .= $indent . '                </li>
';
                    }
                }
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'past' section
                $value = $context->find('past');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="past" data-pref="past" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section60cb1bc6b8bef86f0ebcc4100b812ad9($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section1e8dea46004e4fe5964bd9187fa70241($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEf3b21f97bc8fe4506d69d5331b9f4b9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'aria:customfield, block_myoverview, {{name}}';
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
                
                $buffer .= 'aria:customfield, block_myoverview, ';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5f940002b58e8009cb3e6ebbbc342643(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <li>
                    <a class="dropdown-item {{#active}}active{{/active}}" href="#" data-filter="grouping"
                       data-value="customfield" data-pref="customfield" data-customfieldvalue="{{value}}"
                       aria-label="{{#str}}aria:customfield, block_myoverview, {{name}}{{/str}}"
                       aria-controls="courses-view-{{uniqid}}">
                        {{name}}
                    </a>
                </li>
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
                
                $buffer .= $indent . '                <li>
';
                $buffer .= $indent . '                    <a class="dropdown-item ';
                // 'active' section
                $value = $context->find('active');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping"
';
                $buffer .= $indent . '                       data-value="customfield" data-pref="customfield" data-customfieldvalue="';
                $value = $this->resolveValue($context->find('value'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '"
';
                $buffer .= $indent . '                       aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionEf3b21f97bc8fe4506d69d5331b9f4b9($context, $indent, $value);
                $buffer .= '"
';
                $buffer .= $indent . '                       aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </a>
';
                $buffer .= $indent . '                </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9dca8621ecac5799c1da49bba68abca8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <li class="dropdown-divider" role="presentation">
                <span class="filler">&nbsp;</span>
            </li>
            {{#customfieldvalues}}
                <li>
                    <a class="dropdown-item {{#active}}active{{/active}}" href="#" data-filter="grouping"
                       data-value="customfield" data-pref="customfield" data-customfieldvalue="{{value}}"
                       aria-label="{{#str}}aria:customfield, block_myoverview, {{name}}{{/str}}"
                       aria-controls="courses-view-{{uniqid}}">
                        {{name}}
                    </a>
                </li>
            {{/customfieldvalues}}
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
                
                $buffer .= $indent . '            <li class="dropdown-divider" role="presentation">
';
                $buffer .= $indent . '                <span class="filler">&nbsp;</span>
';
                $buffer .= $indent . '            </li>
';
                // 'customfieldvalues' section
                $value = $context->find('customfieldvalues');
                $buffer .= $this->section5f940002b58e8009cb3e6ebbbc342643($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section153539089d04b17ab672bafd0b927502(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:favourites, block_myoverview ';
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
                
                $buffer .= ' aria:favourites, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section598c7ffafde3df08039420d297c69b99(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#favourites}}active{{/favourites}}" href="#" data-filter="grouping" data-value="favourites"  data-pref="favourites" aria-label="{{#str}} aria:favourites, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} favourites, block_myoverview {{/str}}
            </a>
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
                
                $buffer .= $indent . '        <li class="dropdown-divider" role="presentation">
';
                $buffer .= $indent . '            <span class="filler">&nbsp;</span>
';
                $buffer .= $indent . '        </li>
';
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'favourites' section
                $value = $context->find('favourites');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="favourites"  data-pref="favourites" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section153539089d04b17ab672bafd0b927502($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section6a8fa4f1d83488a4bff00ad9c6b4e87c($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA0d6bc2dd5f49bbd3f2040aaf69a67b9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' aria:hiddencourses, block_myoverview ';
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
                
                $buffer .= ' aria:hiddencourses, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section40d3b00b196ff3aa2de3c1197f1b16ef(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#hidden}}active{{/hidden}}" href="#" data-filter="grouping" data-value="hidden"  data-pref="hidden" aria-label="{{#str}} aria:hiddencourses, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} hiddencourses, block_myoverview {{/str}}
            </a>
        </li>
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
                
                $buffer .= $indent . '        <li class="dropdown-divider" role="presentation">
';
                $buffer .= $indent . '            <span class="filler">&nbsp;</span>
';
                $buffer .= $indent . '        </li>
';
                $buffer .= $indent . '        <li>
';
                $buffer .= $indent . '            <a class="dropdown-item ';
                // 'hidden' section
                $value = $context->find('hidden');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" data-filter="grouping" data-value="hidden"  data-pref="hidden" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionA0d6bc2dd5f49bbd3f2040aaf69a67b9($context, $indent, $value);
                $buffer .= '" aria-controls="courses-view-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section62c24258cc369df41565ccf8e4d02cf8($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section293caa7f3ec9457eb4f4d5c8521883fd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<div class="dropdown mb-1 mr-auto">
    <button id="groupingdropdown" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="{{#str}} aria:groupingdropdown, block_myoverview {{/str}}">
        {{#pix}} i/filter {{/pix}}
        <span class="d-sm-inline-block" data-active-item-text>
            {{#allincludinghidden}}{{#str}} allincludinghidden, block_myoverview {{/str}}{{/allincludinghidden}}
            {{#all}}{{#str}} all, block_myoverview {{/str}}{{/all}}
            {{#inprogress}}{{#str}} inprogress, block_myoverview {{/str}}{{/inprogress}}
            {{#future}}{{#str}} future, block_myoverview {{/str}}{{/future}}
            {{#past}}{{#str}} past, block_myoverview {{/str}}{{/past}}
            {{#favourites}}{{#str}} favourites, block_myoverview {{/str}}{{/favourites}}
            {{#hidden}}{{#str}} hiddencourses, block_myoverview {{/str}}{{/hidden}}
            {{selectedcustomfield}}
        </span>
    </button>
    <ul class="dropdown-menu" data-show-active-item data-active-item-text aria-labelledby="groupingdropdown">
        {{#displaygroupingallincludinghidden}}
        <li>
            <a class="dropdown-item {{#allincludinghidden}}active{{/allincludinghidden}}" href="#" data-filter="grouping" data-value="allincludinghidden" data-pref="allincludinghidden" aria-label="{{#str}} aria:allcoursesincludinghidden, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} allincludinghidden, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupingallincludinghidden}}
        {{#displaygroupingall}}
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#all}}active{{/all}}" href="#" data-filter="grouping" data-value="all" data-pref="all" aria-label="{{#str}} aria:allcourses, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} all, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupingall}}
        {{#displaygroupinginprogress}}
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#inprogress}}active{{/inprogress}}" href="#" data-filter="grouping" data-value="inprogress" data-pref="inprogress" aria-label="{{#str}} aria:inprogress, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} inprogress, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupinginprogress}}
        {{#displaygroupingfuture}}
            {{^displaygroupinginprogress}}
            <li class="dropdown-divider" role="presentation">
                <span class="filler">&nbsp;</span>
            </li>
            {{/displaygroupinginprogress}}
        <li>
            <a class="dropdown-item {{#future}}active{{/future}}" href="#" data-filter="grouping" data-value="future" data-pref="future" aria-label="{{#str}} aria:future, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} future, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupingfuture}}
        {{#displaygroupingpast}}
            {{^displaygroupinginprogress}}
                {{^displaygroupingfuture}}
                <li class="dropdown-divider" role="presentation">
                    <span class="filler">&nbsp;</span>
                </li>
                {{/displaygroupingfuture}}
            {{/displaygroupinginprogress}}
        <li>
            <a class="dropdown-item {{#past}}active{{/past}}" href="#" data-filter="grouping" data-value="past" data-pref="past" aria-label="{{#str}} aria:past, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} past, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupingpast}}
        {{#displaygroupingcustomfield}}
            <li class="dropdown-divider" role="presentation">
                <span class="filler">&nbsp;</span>
            </li>
            {{#customfieldvalues}}
                <li>
                    <a class="dropdown-item {{#active}}active{{/active}}" href="#" data-filter="grouping"
                       data-value="customfield" data-pref="customfield" data-customfieldvalue="{{value}}"
                       aria-label="{{#str}}aria:customfield, block_myoverview, {{name}}{{/str}}"
                       aria-controls="courses-view-{{uniqid}}">
                        {{name}}
                    </a>
                </li>
            {{/customfieldvalues}}
        {{/displaygroupingcustomfield}}
        {{#displaygroupingstarred}}
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#favourites}}active{{/favourites}}" href="#" data-filter="grouping" data-value="favourites"  data-pref="favourites" aria-label="{{#str}} aria:favourites, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} favourites, block_myoverview {{/str}}
            </a>
        {{/displaygroupingstarred}}
        {{#displaygroupinghidden}}
        <li class="dropdown-divider" role="presentation">
            <span class="filler">&nbsp;</span>
        </li>
        <li>
            <a class="dropdown-item {{#hidden}}active{{/hidden}}" href="#" data-filter="grouping" data-value="hidden"  data-pref="hidden" aria-label="{{#str}} aria:hiddencourses, block_myoverview {{/str}}" aria-controls="courses-view-{{uniqid}}">
                {{#str}} hiddencourses, block_myoverview {{/str}}
            </a>
        </li>
        {{/displaygroupinghidden}}
    </ul>
</div>
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
                
                $buffer .= $indent . '<div class="dropdown mb-1 mr-auto">
';
                $buffer .= $indent . '    <button id="groupingdropdown" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionCdca03c966985271d933771f38d17201($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '        ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->sectionC941581ed22833ebdc688d5da36a360a($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '        <span class="d-sm-inline-block" data-active-item-text>
';
                $buffer .= $indent . '            ';
                // 'allincludinghidden' section
                $value = $context->find('allincludinghidden');
                $buffer .= $this->sectionDd89a06415c3a9738588538d22ed5719($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'all' section
                $value = $context->find('all');
                $buffer .= $this->section3842a12aa13716271b547dd2b63a83f0($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'inprogress' section
                $value = $context->find('inprogress');
                $buffer .= $this->section423ab0cbddfc75d44c8e8c6d7354a909($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'future' section
                $value = $context->find('future');
                $buffer .= $this->sectionA95d1da52da1e6b0fb8c273a6af61e45($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'past' section
                $value = $context->find('past');
                $buffer .= $this->sectionC723f5724128554b7185f98be27ffdca($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'favourites' section
                $value = $context->find('favourites');
                $buffer .= $this->section33d18a9baa544480c9874cbbfef7bfd0($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                // 'hidden' section
                $value = $context->find('hidden');
                $buffer .= $this->section351479d60e926483df14f8612bc07800($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('selectedcustomfield'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '
';
                $buffer .= $indent . '        </span>
';
                $buffer .= $indent . '    </button>
';
                $buffer .= $indent . '    <ul class="dropdown-menu" data-show-active-item data-active-item-text aria-labelledby="groupingdropdown">
';
                // 'displaygroupingallincludinghidden' section
                $value = $context->find('displaygroupingallincludinghidden');
                $buffer .= $this->section7929ad25c8ad3ee25c6f1c9197a51026($context, $indent, $value);
                // 'displaygroupingall' section
                $value = $context->find('displaygroupingall');
                $buffer .= $this->sectionAe0dca251d2e788644aa038f2018ea7c($context, $indent, $value);
                // 'displaygroupinginprogress' section
                $value = $context->find('displaygroupinginprogress');
                $buffer .= $this->section16efd8a7991cf190bba239063d8c28c6($context, $indent, $value);
                // 'displaygroupingfuture' section
                $value = $context->find('displaygroupingfuture');
                $buffer .= $this->sectionEbedcda6cf26e67be34c163b411681cb($context, $indent, $value);
                // 'displaygroupingpast' section
                $value = $context->find('displaygroupingpast');
                $buffer .= $this->sectionA9acf566fcd74a84a5672063fc2cb2b8($context, $indent, $value);
                // 'displaygroupingcustomfield' section
                $value = $context->find('displaygroupingcustomfield');
                $buffer .= $this->section9dca8621ecac5799c1da49bba68abca8($context, $indent, $value);
                // 'displaygroupingstarred' section
                $value = $context->find('displaygroupingstarred');
                $buffer .= $this->section598c7ffafde3df08039420d297c69b99($context, $indent, $value);
                // 'displaygroupinghidden' section
                $value = $context->find('displaygroupinghidden');
                $buffer .= $this->section40d3b00b196ff3aa2de3c1197f1b16ef($context, $indent, $value);
                $buffer .= $indent . '    </ul>
';
                $buffer .= $indent . '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
