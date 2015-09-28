<?php

namespace Classificacao\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\File;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Classificacao\Form\ReuniaoFilter;

class ReuniaoForm extends Form {

    public function __construct() {
        parent::__construct(null);
        $this->setInputFilter(new ReuniaoFilter());
        $this->setAttribute('method', 'POST')
                ->setAttribute('enctype', 'multipart/form-data');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $data = new Text('data');
        $data->setLabel('Data')
            ->setAttribute('autofocus', 'autofocus');
        $this->add($data);
        
        $eventos = new Text('eventos');
        $eventos->setLabel('Evento')
            ->setAttribute('placeholder', 'Entre com o evento')
            ->setAttribute('maxlength', 255)
            ->setAttribute('size', 50);
        $this->add($eventos);
        
        $pauta = new Text('pauta');
        $pauta->setLabel('Pauta')
            ->setAttribute('maxlength', 255)
            ->setAttribute('size', 50);
        $this->add($pauta);
        
        $cardapio = new Textarea('cardapio');
        $cardapio->setLabel('Cardápio')
                ->setAttribute('cols', '60')
                ->setAttribute('rows', '5');
        $this->add($cardapio);
        
        $listaPresente = new Textarea('lista_presente');
        $listaPresente->setLabel('Lista de Presente')
                ->setAttribute('cols', '60')
                ->setAttribute('rows', '5');
        $this->add($listaPresente);   
        
        $ata = new Text('ata');
        $ata->setLabel('Ata')
            ->setAttribute('maxlength', 255)
            ->setAttribute('size', 50);
        $this->add($ata);

        $imagnes = new File('imagens');
        $imagnes->setLabel('Imagens')
                ->setAttribute('id', 'imagnes');
        $this->add($imagnes);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-success'
                ));
        $this->add($button);
        
    }

}
