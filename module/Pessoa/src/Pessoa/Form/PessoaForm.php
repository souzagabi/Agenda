<?php

namespace Pessoa\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\File;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Pessoa\Form\PessoaFilter;



class PessoaForm extends Form {

    protected $classificacoes;

    public function __construct($name = null, array $classificacoes = null) {
        parent::__construct($name);
        $this->classificacoes = $classificacoes;

        $this->setInputFilter(new PessoaFilter());
        $this->setAttribute('method', 'POST');
        $this->setAttribute('enctype', 'multipart/form-data');


        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $titulo = new Text('nome');
        $titulo->setLabel('Nome  :  ')
                ->setAttribute('placeholder', 'Entre com o nome')
                ->setAttribute('maxlength', 100)
                ->setAttribute('size', 50)
                ->setAttribute('autofocus', 'autofocus');
        $this->add($titulo);

        $classificacao = new Select();
        $classificacao->setLabel("Classificacao ")
                ->setName("classification")
                ->setOptions(array('value_options' => $classificacoes));
        $this->add($classificacao);

        $dataAdmissao = new Text('data_admissao');
        $dataAdmissao->setLabel('Data Admissão');
        $this->add($dataAdmissao);

        $enderecoResidencial = new Text('endereco_residencial');
        $enderecoResidencial->setLabel('End. Residencial:')
                ->setAttribute('placeholder', 'Entre com o endereço residencial')
                ->setAttribute('maxlength', 255)
                ->setAttribute('size', 50);
        $this->add($enderecoResidencial);

        $telefoneResidencial = new Text('telefone_residencial');
        $telefoneResidencial->setLabel('Tel. Residencial');
        $this->add($telefoneResidencial);

        $celular = new Text('celular');
        $celular->setLabel('Celular');
        $this->add($celular);

        $emailPessoal = new Text('email_pessoal');
        $emailPessoal->setLabel('Email Pessoal');
        $this->add($emailPessoal);

        $enderecoComercial = new Text('endereco_comercial');
        $enderecoComercial->setLabel('End. Comercial:')
                ->setAttribute('placeholder', 'Entre com o endereço comercial')
                ->setAttribute('maxlength', 255)
                ->setAttribute('size', 50);
        $this->add($enderecoComercial);

        $telefoneComercial = new Text('telefone_comercial');
        $telefoneComercial->setLabel('Tel. Comercial');
        $this->add($telefoneComercial);

        $emailComercial = new Text('email_comercial');
        $emailComercial->setLabel('Email Comercial');
        $this->add($emailComercial);

        $conjuge = new Text('conjuge');
        $conjuge->setLabel('Nome do Conjuge')
                ->setAttribute('maxlength', 100)
                ->setAttribute('size', 50);
        $this->add($conjuge);

        $celularConjuge = new Text('celular_conjuge');
        $celularConjuge->setLabel('Celular do Conjuge');
        $this->add($celularConjuge);
/*===========================================================================================*/
        $fotografia = new File('fotografia');
        $fotografia->setLabel('Fotografia')
                ->setAttribute('id', 'fotografia');
        $this->add($fotografia);
/*===========================================================================================*/

        $ativo = new Checkbox('ativo');
        $ativo->setLabel('Ativo : ');
        $this->add($ativo);

        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
        ));
        $this->add($button);
    }

}
