<?php

namespace Pessoa\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;

class FilhoForm extends Form   
{

    protected $pais;

    public function __construct($name = null, array $pais = null) {
        parent::__construct($name);
        $this->pais = $pais;

        $this->setAttribute('method', 'POST');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
                
        $nome = new Text('nome');
        $nome->setLabel('Nome')
                ->setAttribute('placeholder', 'Entre com a nome')
                ->setAttribute('maxlength', 100)
                ->setAttribute('size', 50)
                ->setAttribute('autofocus', 'autofocus');
        $this->add($nome);

        $email = new Text('email');
        $email->setLabel('E-mail')
                ->setAttribute('placeholder', 'Entre com o email')
                ->setAttribute('maxlength', 255)
                ->setAttribute('size', 50);
        $this->add($email);

        $celular = new Text('celular');
        $celular->setLabel('Telefone')
                ->setAttribute('placeholder', 'Entre com o telefone')
                ->setAttribute('maxlength', 15);
        $this->add($celular);

        $ativo = new Checkbox('ativo');
        $ativo->setLabel('Ativo : ');
        $this->add($ativo);

        $pai = new Select();
        $pai->setLabel("Pai ")
                ->setName("pessoa")
                ->setOptions(array('value_options' => $pais));
        $this->add($pai);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
        ));
        $this->add($button);

    }
}
