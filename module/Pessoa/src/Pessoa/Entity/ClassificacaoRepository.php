<?php

namespace Pessoa\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ClassificacaoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClassificacaoRepository extends EntityRepository
{
    public function fetchPairs() {
        $entities = $this->findAll();
        $array = array();
        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getDescricao();
        }

        return $array;
    }
}