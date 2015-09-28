<?php

namespace Membro\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

class MembroService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Membro\Entity\Membro';
        parent::__construct($em);
    }

    public function inserir(array $data) {
        $entity = new $this->entity($data);
        var_dump($entity);die;
        $comissao = $this->em->getReference('Membro\Entity\Comissao', $data['comissao']);
        $entity->setComissao($comissao);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function editar(array $data) {
        
        
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new ClassMethods())->hydrate($data, $entity);
        //var_dump($entity);die;
        $comissao = $this->em->getReference('Membro\Entity\Comissao', $data['comissao']);
        $entity->setComissao($comissao);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
