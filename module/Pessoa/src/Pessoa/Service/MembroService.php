<?php

namespace Pessoa\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class MembroService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Pessoa\Entity\Membro';
        parent::__construct($em);
    }

    public function inserir(array $data) {

        $entity = new $this->entity($data);

        $comissao = $this->em->getReference("Pessoa\Entity\Comissao", $data['comissao']);
        $entity->setComissao($comissao); // Injetando entidade carregada

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function editar(array $data) {

        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);

        $comissao = $this->em->getReference("Pessoa\Entity\Comissao", $data['comissao']);
        $entity->setComissao($comissao); // Injetando entidade carregada

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

}
