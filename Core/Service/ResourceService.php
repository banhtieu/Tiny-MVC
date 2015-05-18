<?php
/**
 * Created by PhpStorm.
 * User: banht_000
 * Date: 18/05/2015
 * Time: 3:17 CH
 */

namespace Core\Service;
use Core\Database\Collection;


/**
 * Class ResourceService
 * @package Core\Service
 */
class ResourceService {

    /**
     * @var Collection
     */
    private $collection;

    /**
     * access to this method by GET
     * @return all items
     */
    public function get() {
        return $this->collection->findAll();
    }


    /**
     * @param $itemId
     */
    public function getItem($itemId) {
        return $this->collection->buildQuery()
                    ->findBy("id", $itemId)
                    ->find();
    }

    /**
     * Save an item
     * @param $item
     */
    public function save($item) {
        return $this->collection->save($item);
    }


    /**
     * Delete an item
     * @param $itemId
     */
    public function delete($itemId) {
        return $this->collection->drop($itemId);
    }
}