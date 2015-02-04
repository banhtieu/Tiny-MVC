<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 2/1/15
 * Time: 11:03 AM
 */

namespace Core\Database;


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

    }

    /**
     * Fetch a request
     * @return array
     */
    public function find(){

    }

    /**
     * Find all parameters
     * @param array $query
     * @param array $fields
     *
     * @return array - result
     */
    public function findAll(array $query = array()) {

    }

    /**
     *
     * join with another Repository
     * @param Collection $repository
     *
     * @return Collection
     */
    public function join(Collection $repository, array $condition = array()) {
        return new Collection("");
    }
} 