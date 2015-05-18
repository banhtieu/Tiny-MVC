<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 1/25/15
 * Time: 12:23 AM
 */

namespace Application\Model;
use Core\Database\Model;

/**
 * Class User
 * @package Application\Model
 * @entity
 */
class User extends Model {

    /**
     * @var int id - the unique id of this object
     * @Column(identity)
     */
    public $id;

    /**
     * @var string the username
     * @Column(string)
     */
    public $username;

    /**
     * @var string password
     * @Column(string)
     */
    public $password;

}
