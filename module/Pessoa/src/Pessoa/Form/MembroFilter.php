<?php

namespace Pessoa\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class MembroFilter extends InputFilter {

    public function __construct() {
        
        $membro = new Input('membro');
        $membro->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $membro->getValidatorChain()->attach(new NotEmpty());
        $this->add($membro);
        
        $cargo = new Input('cargo');
        $cargo->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $cargo->getValidatorChain()->attach(new NotEmpty());
        $this->add($cargo);
      
    }

}
