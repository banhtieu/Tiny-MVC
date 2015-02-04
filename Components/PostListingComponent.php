<?php
/**
 * Created by PhpStorm.
 * User: banhtieu
 * Date: 2/1/15
 * Time: 11:07 AM
 */

namespace Components;



use Core\Database\Repository;
use Application\Model\User;


class PostListingComponent extends Component {


    /**
     * @var User user
     */
    public $user;

    /**
     * @var array
     */
    public $posts;

    /**
     * Load a component
     */
    public function onLoad() {
        $this->posts = Repository::$Post->findAll(array('id' => ''));

        Repository::$Post
            ->join(Repository::$User, array('userId' => 'id'))
            ->findAll();
    }
} 