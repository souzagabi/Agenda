<?php

namespace Pessoa\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class FilhoFilter extends InputFilter {

    protected $pessoa;
    
    public function __construct(Array $pai = array()) {

        $this->pessoa = $pai;
        
        $nome = new Input('nome');
        $nome->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
      
        $inArray = new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->pessoa)));

        $classific = new Input('pessoa_id');
        $classific->setRequired(true)
                ->getFilterChain()->attach(new StripTags())->attach(new StringTrim());
        $classific->getValidatorChain()->attach($inArray);
        $this->add($classific);
    }

    public function haystack(Array $haystack = array()) {
        
        //var_dump($haystack); die;
        $array = array();
        foreach ($haystack as $value) {
            if ($value) {
                $array[$value['value']] = $value['label'];
            }
        }
        return array_keys($array);
    }

}
