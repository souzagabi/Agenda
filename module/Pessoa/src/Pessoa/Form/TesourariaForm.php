<?php

namespace Pessoa\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;

class TesourariaForm extends Form {

    protected $pessoas;

    public function __construct($name = null, array $pessoas = null) {
        parent::__construct('tesouraria');
        $this->pessoas = $pessoas;

        //$this->setInputFilter(new TesourariaFilter());
        $this->setAttribute('method', 'POST');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $pessoa = new Select();
        $pessoa->setLabel("Pessoa ")
                ->setName("pessoa")
                ->setOptions(array('value_options' => $this->pessoas));
        $this->add($pessoa);

        $debito = new Text('debito');
        $debito->setLabel('Débito');
        $this->add($debito);

        $credito = new Text('credito');
        $credito->setLabel('Crédito');
        $this->add($credito);

        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
        ));
        $this->add($button);
    }

}
