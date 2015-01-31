<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 1/25/15
 * Time: 5:40 AM
 */

namespace Core\Database;

/**
 * Class ColumnInfo
 * @package Core\Database
 */
class Column {


    /**
     * name of the column
     * @var string
     */
    private $name;

    /**
     * type of the column
     * @var string
     */
    private $type;

    /**
     * if the column is a key
     * @var bool
     */
    private $isKey;

    /**
     * Database type
     * @var int
     */
    private $dbType;


    /**
     * Construct a column by type
     * @param string $type type of the column
     */
    public function  __constructor() {
    }

    /**
     * @return int
     */
    public function getDbType()
    {
        return $this->dbType;
    }

    /**
     * @param int $dbType
     */
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;
    }

    /**
     * @return boolean
     */
    public function isKey()
    {
        return $this->isKey;
    }

    /**
     * @param boolean $isKey
     */
    public function setIsKey($isKey)
    {
        $this->isKey = $isKey;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {

        $this->type = $type;

        // set database type
        if ($type == "string") {
            $this->setDbType("varchar(255)");
        } else if ($type == "identity") {
            $this->setDbType("int(11)");
            $this->setIsKey(true);
        } else if ($type == "int") {
            $this->setDbType("int(11)");
        } else {
            $this->setDbType($type);
        }
    }

    /**
     * Get SQL
     */
    public function getSQL()
    {
        $sql = $this->getName() . " " . $this->getDbType();

        if ($this->isKey()) {
            $sql .= " NOT NULL AUTO_INCREMENT";
        }

        return $sql;
    }



} 