<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 1/25/15
 * Time: 8:49 AM
 */

namespace Core\Database;


class DBColumn {

    /**
     * @var string Field name
     */
    private $Field;

    /**
     * @var string Type of column
     */
    private $Type;

    /**
     * @var boolean is Null
     */
    private $Null;

    /**
     * @var string Key Type
     */
    private $Key;

    /**
     * @var string extra comments
     */
    private $Extra;

    /**
     * @return string
     */
    public function getExtra()
    {
        return $this->Extra;
    }

    /**
     * @param string $Extra
     */
    public function setExtra($Extra)
    {
        $this->Extra = $Extra;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->Field;
    }

    /**
     * @param string $Field
     */
    public function setField($Field)
    {
        $this->Field = $Field;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * @param string $Key
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
    }

    /**
     * @return boolean
     */
    public function isNull()
    {
        return $this->Null;
    }

    /**
     * @param boolean $Null
     */
    public function setNull($Null)
    {
        $this->Null = $Null;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }


} 