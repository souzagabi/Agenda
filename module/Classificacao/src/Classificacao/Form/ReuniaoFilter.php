<?php

namespace Classificacao\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class ReuniaoFilter extends InputFilter {

    public function __construct() {
        
        $data = new Input('data');
        $data->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $data->getValidatorChain()->attach(new NotEmpty());
        $this->add($data);
        
        $eventos = new Input('eventos');
        $eventos->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $eventos->getValidatorChain()->attach(new NotEmpty());
        $this->add($eventos);
      
    }

}
