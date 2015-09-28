<?php

namespace Pessoa\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class ClassificacaoService extends AbstractService {
    
    public function __construct(EntityManager $em) {
        $this->entity = 'Pessoa\Entity\Classificacao';
        parent::__construct($em);
    }
    
}
