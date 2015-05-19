<?php
/**
 * Created by PhpStorm.
 * User: banht_000
 * Date: 18/05/2015
 * Time: 1:38 CH
 */
namespace Application\Service;

use Application\Model\Tour;
use Core\Database\Collection;
use Core\Database\Repository;

/**
 * Class TourService
 * @package Application\Service
 * @base(/tours)
 */
class TourService {

    /**
     * @var Collection
     */
    private $collection;

    /**
     * The default constructor
     */
    public function __construct() {
        $this->collection = Repository::get("Tour");
    }

    /**
     * Get Item
     * @get(/)
     * @param $page int optional #query
     * @param $count int optional #query
     *
     * @return array array of
     */
    public function getAll($page, $count) {

        $query = $this->collection->buildQuery();

        if ($page != null && $count != null) {
            $query->paginate($page, $count);
        }

        return $query->findAll();
    }


    /**
     * @get(/:id)
     * @param $id int required #param
     * @return Tour
     */
    public function getItem($id) {
        return $this->collection->buildQuery()
            ->findBy('id', $id)
            ->first();
    }

    /**
     * @put(/)
     * @param $item Tour #body
     * @return boolean isSuccess
     */
    public function save($item) {
        return $this->collection->save($item);
    }


    /**
     * @delete(/:id)
     * @param $id int required #param
     */
    public function delete($id) {
        return $this->collection->delete($id);
    }
}