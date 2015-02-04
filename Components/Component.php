<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 2/1/15
 * Time: 11:07 AM
 */

namespace Components;


use Core\Database\Repository;

/**
 * Base class for all components
 * @package Components
 */
class Component {

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * Construct a Component
     */
    protected function __construct(){
        $this->repository = new Repository();
    }

} 