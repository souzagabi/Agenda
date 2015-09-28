<?php

namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService {

    /**
     *
     * @var EntityManager
     */
    protected $em;
    protected $entity;
    protected $type;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function inserir(array $data) {
        $entity = new $this->entity($data);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function editar(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new ClassMethods())->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function excluir($id) {
        $entity = $this->em->getReference($this->entity, $id);
        if ($entity) {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }
    
    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $config = $this->getConfig();
        
        if (!in_array($type, $config['jv-upload']['types'])) {
            throw new \InvalidArgumentException("O tipo do arquivo passado '{$type}' não existe no arquivo de configuração.", $this->exceptCode);
        }
        
        $this->type = $type;
        
        return $this;
    }

}
