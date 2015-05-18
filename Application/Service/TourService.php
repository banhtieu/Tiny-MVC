<?php
/**
 * Created by PhpStorm.
 * User: banht_000
 * Date: 18/05/2015
 * Time: 1:38 CH
 */
namespace Application\Service;

use Core\Database\Repository;

class TourService {


    /**
     * Get Item
     */
    public function query() {
        return Repository::get("Tour")->findAll();
    }

}