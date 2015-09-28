<?php

namespace Classificacao\Controller;

use Base\Controller\AbstractController;

class IndexController extends AbstractController{
    
    public function __construct() {
        $this->form = 'Classificacao\Form\ReuniaoForm';
        $this->controller = 'classificacao';
        $this->route = 'classificacao/default';
        $this->service = 'Classificacao\Service\ClassificacaoService';
        $this->entity = 'Classificacao\Entity\Reuniao';
    }
}
