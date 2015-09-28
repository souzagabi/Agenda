<?php

namespace Pessoa\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class TesourariaService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Pessoa\Entity\Tesouraria';
        parent::__construct($em);
    }

    public function inserir(array $data) {

        $entity = new $this->entity($data);

        $pessoa = $this->em->getReference('Pessoa\Entity\Pessoa', $data['pessoa']);
        $entity->setPessoa($pessoa);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function editar(array $data) {

        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);

        $pessoa = $this->em->getReference('Pessoa\Entity\Pessoa', $data['pessoa']);
        $entity->setPessoa($pessoa);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

}
