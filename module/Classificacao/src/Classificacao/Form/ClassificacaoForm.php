<?php

namespace Classificacao\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Classificacao\Form\ClassificacaoFilter;

class ClassificacaoForm extends Form {

    public function __construct() {
        parent::__construct(null);
        $this->setInputFilter(new ClassificacaoFilter());
        $this->setAttribute('method', 'POST');

        $nome = new Text('descricao');
        $nome->setLabel('Descrição')
            ->setAttribute('placeholder', 'Entre com a descrição')
            ->setAttribute('maxlength', 255)
            ->setAttribute('size', 50)
            ->setAttribute('autofocus', 'autofocus');
        $this->add($nome);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
                ));
        $this->add($button);
        
    }

}
