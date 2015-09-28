<?php

namespace Pessoa\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class ComissaoService extends AbstractService {
    
    public function __construct(EntityManager $em) {
        $this->entity = 'Pessoa\Entity\Comissao';
        parent::__construct($em);
    }
    
}
