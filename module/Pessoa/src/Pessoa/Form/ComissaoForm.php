<?php

namespace Pessoa\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Pessoa\Form\ComissaoFilter;

class ComissaoForm extends Form {

    public function __construct() {
        parent::__construct(null);
        $this->setInputFilter(new ComissaoFilter());
        $this->setAttribute('method', 'POST');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new Text('descricao');
        $nome->setLabel('Descrição  :  ')
            ->setAttribute('placeholder', 'Entre com a descrição')
            ->setAttribute('maxlength', 100)
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
