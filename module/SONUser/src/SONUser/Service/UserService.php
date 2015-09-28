<?php

namespace SONUser\Service;

//use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class UserService extends AbstractService
{

    protected $transport;
    protected $view;
    
    public function __construct(EntityManager $em, $view) 
    {
        parent::__construct($em);
        
        $this->entity = "SONUser\Entity\User";
        $this->view = $view;
    }
    
    public function insert(array $data) {
        $entity = parent::insert($data);
        
        //$dataEmail = array('nome'=>$data['nome'],'activationKey'=>$entity->getActivationKey());
        
        if($entity)
        {
           return $entity;
        }
    }
    
    public function activate($key)
    {
        $repo = $this->em->getRepository("SONUser\Entity\User");
        
        $user = $repo->findOneByActivationKey($key);
        
        if($user && !$user->getActive())
        {
            $user->setActive(true);
            
            $this->em->persist($user);
            $this->em->flush();
            
            return $user;
        }
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);
        
        if(empty($data['password'])){
            unset($data['password']);
        }
        
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
}
