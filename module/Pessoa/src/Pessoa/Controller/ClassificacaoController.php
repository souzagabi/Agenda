<?php

namespace Pessoa\Controller;

use Base\Controller\AbstractController;

class ClassificacaoController extends AbstractController
{

    public function __construct() {
        $this->entity = "Pessoa\Entity\Classificacao";
        $this->service = "Pessoa\Service\ClassificacaoService";
        $this->form = "Pessoa\Form\ClassificacaoForm";
        $this->controller = "classificacao";
        $this->route = "pessoa/default";
    }
}
