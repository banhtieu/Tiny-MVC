<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 1/25/15
 * Time: 12:23 AM
 */

namespace Application\Model;

/**
 * Class User
 * @package Application\Model
 * @entity
 */
class User {

    /**
     * The identified
     * @var int
     * @Column(identity)
     */
    private $id;


    /**
     * @var string the username
     * @Column(string)
     */
    private $username;

    /**
     * @var string password
     * @Column(string)
     */
    private $password;

    /**
     * Set Id of this Object
     * @param $id
     */
    public function setId($id) {
        $this->setId($id);
    }


    /**
     * Get Id of this object
     * @return int
     */
    public function getId() {
        return $this->id;
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
}
