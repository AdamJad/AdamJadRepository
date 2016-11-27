<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 24/11/2016
 * Time: 23:57
 */
require_once "Entity.php";
class User extends Entity
{
    /**
     * Statut administrateur de l'Utilisateur
     *
     * @const
     */
    const ADMIN = 1;

    /**
     * Statut écrivain de l'Utilisateur
     *
     * @const
     */
    const WRITTER = 0;

    /**
     * L'identifiant de l'utilisateur
     *
     * @var int
     */
    private $id;

    /**
     * Le prénom de l'utilisateur
     *
     * @var string
     */
    private $firstName;

    /**
     * Le nom de l'utilisateur
     *
     * @var string
     */
    private $lastName;

    /**
     * Le pseudo de l'utilisateur
     *
     * @var string
     */
    private $username;

    /**
     * L'adresse email de l'utilisateur
     *
     * @var string
     */
    private $email;

    /**
     * Le Mot de passe de l'utilisateur
     *
     * @var string
     */
    private $password;

    /**
     * Le role de l'utilisateur
     *
     * @var int
     */
    private $role;

    /**
     * User constructor.
     */
    public function __construct(array $data)
    {
        $this->arrayToObject($data);
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param int $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}