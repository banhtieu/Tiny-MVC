<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 2/1/15
 * Time: 11:03 AM
 */

namespace Core\Database;
use Core\Database;
use Core\Migration;


/**
 * Class Collection
 * @package Core\Database
 */
class Collection {

    /**
     * @var string name of the collection
     */
    private $name;


    /**
     * Construct a collection with a name
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
    }


    /**
     * Save an entity
     * @param Model $entity
     */
    public function save(Model $entity) {
        /* @var Column $keyColumn */
        $keyColumn = null;
        $tableName = $this->getTableName();
        $columns = Migration::getProperties($entity);
        $database = Database::getInstance();

        $keys = array();
        $values = array();

        foreach ($columns as $column) {
            if (!$column->isKey) {
                $keys[] = $column->name;
                $values[] = $entity->{$column->name};
            } else {
                $keyColumn = $column;
            }
        }

        if ($keyColumn) {
            $keyValue = $entity->{$keyColumn->name};
            $query = null;

            // if there is an id
            if ($keyValue != null) {

                $setCommands = array();

                foreach ($columns as $column) {
                    /* @var Column $column */
                    if (!$column->isKey) {
                        $setCommands[] = $column->name . " = ?";
                    }
                }

                $query = "UPDATE $tableName";
                $query .= " SET " . join(", ", $setCommands);
                $query .= " WHERE $keyColumn->name = ?";

                $values[] = $keyValue;

            } else {


                $query = "INSERT INTO $tableName";
                $query.= "(" . join(", ", $keys) . ")";

                $questionMarks = array_fill(0, sizeof($columns) - 1, "?");

                $query .= "VALUES (" . join(", ", $questionMarks) . ")";
            }

            var_dump($query);
            $database->executeUpdate($query, $values);
        }
    }


    /**
     * @return Query the query for this collection
     */
    public function buildQuery() {
        return new Query($this->name);
    }

    /**
     * Find all parameters
     * @return array - result
     */
    public function findAll() {
        return $this->buildQuery()->findAll();
    }


    /**
     * @param $item
     */
    public function drop($item) {
        $itemId = $item;

        if (is_object($item)) {
            $itemId = $item->id;
        }

        $query = "DELETE FROM " . $this->getTableName() . " WHERE id = ?";
        Database::getInstance()->executeUpdate($query, array($itemId));

    }


    /**
     * @return string the table name
     */
    public function getTableName() {
        return NameDecorator::getTableName($this->name);
    }
} 