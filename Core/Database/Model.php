<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 2/1/15
 * Time: 10:54 AM
 */

namespace Core\Database;

/**
 * Class Model
 * @package Core\Database
 */
class Model {

    /**
     * @var int id - the unique id of this object
     */
    private $id;

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



}
