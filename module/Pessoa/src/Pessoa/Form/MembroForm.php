<?php

namespace Pessoa\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Pessoa\Form\MembroFilter;

class MembroForm extends Form {

    protected $comissoes;

    public function __construct($name = null, array $comissoes = null) {
        parent::__construct($name);

        $this->comissoes = $comissoes;

        $this->setInputFilter(new MembroFilter());
        $this->setAttribute('method', 'POST');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $comissao = new Select();
        $comissao->setLabel("Comissão ")
                ->setName("comissao")
                ->setOptions(array('value_options' => $this->comissoes));
        $this->add($comissao);

        $membro = new Textarea('membro');
        $membro->setLabel('Membros')
                ->setAttribute('placeholder', 'Entre com os membros')
                ->setAttribute('cols', '60')
                ->setAttribute('rows', '5')
                ->setAttribute('autofocus', 'autofocus');
        $this->add($membro);

        $cargo = new Textarea('cargo');
        $cargo->setLabel('Cargos')
                ->setAttribute('placeholder', 'Entre com os cargos')
                ->setAttribute('cols', '60')
                ->setAttribute('rows', '5');
        $this->add($cargo);
        
        $dataInicio = new Text('data_inicio');
        $dataInicio->setLabel('Data Inicio');
        $this->add($dataInicio);

        $dataFim = new Text('data_fim');
        $dataFim->setLabel('Data Fim');
        $this->add($dataFim);

        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
        ));
        $this->add($button);
    }

}
