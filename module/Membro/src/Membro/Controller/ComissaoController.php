<?php

namespace Membro\Controller;

use Base\Controller\AbstractController;

class ComissaoController extends AbstractController
{

    public function __construct() {
        $this->entity = "Membro\Entity\Comissao";
        $this->service = "Membro\Service\ComissaoService";
        $this->form = "Membro\Form\ComissaoForm";
        $this->controller = "comissao";
        $this->route = "membro/default";
    }
}
