<?php

namespace SONUser\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Math\Rand,
    Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Stdlib\Hydrator;

/**
 * SonuserUsers
 *
 * @ORM\Table(name="sonuser_users")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="SONUser\Entity\UserRepository")
 */
class User {

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="SALT", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="ACTIVE", type="string", length=1, nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="ACTIVATION_KEY", type="string", length=255, nullable=true)
     */
    private $activationKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UPDATED_AT", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CREATED_AT", type="datetime", nullable=false)
     */
    private $createdAt;

    public function __construct(array $options = array()) {

        /*
          $hydrator = new Hydrator\ClassMethods;
          $hydrator->hydrate($options, $this);
         */
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        $this->salt = base64_encode(Rand::getBytes(8, true));
        $this->activationKey = md5($this->email . $this->salt);
        (new Hydrator\ClassMethods)->hydrate($options, $this); // recebe o array $options que é passado no construtoressa linha tem que ser por ultimo para gravar a senha corretamente
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function getActive() {
        return $this->active;
    }

    function getActivationKey() {
        return $this->activationKey;
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $this->encryptPassword($password);
        return $this;
    }

    public function encryptPassword($password) {
        return base64_encode(Pbkdf2::calc('sha256', $password, $this->salt, 15453, strlen($password * 3)));
    }

    function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    function setActive($active) {
        $this->active = $active;
        return $this;
    }

    function setActivationKey($activationKey) {
        $this->activationKey = $activationKey;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
    }

    function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
    }

    public function toArray() {
        return (new Hydrator\ClassMethods())->extract($this);
    }

}
