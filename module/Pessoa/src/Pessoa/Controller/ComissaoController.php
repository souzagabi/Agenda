<?php

namespace Pessoa\Controller;

use Base\Controller\AbstractController;

class ComissaoController extends AbstractController
{

    public function __construct() {
        $this->entity = "Pessoa\Entity\Comissao";
        $this->service = "Pessoa\Service\ComissaoService";
        $this->form = "Pessoa\Form\ComissaoForm";
        $this->controller = "comissao";
        $this->route = "pessoa/default";
    }
}
