<?php
/**
 * Created by PhpStorm.
 * User: banht_000
 * Date: 18/05/2015
 * Time: 11:27 SA
 */

namespace Application\Model;
use Core\Database\Model;


/**
 * Class Tour - data model for tours
 * @package Application\Model
 */
class Tour extends Model {


    /**
     * @var int id - the unique id of this object
     * @Column(identity)
     */
    public $id;


    /**
     * @var string duration of this trip
     * @Column(string)
     */
    public $duration;


    /**
     * @var string
     * @Column(string)
     */
    public $transportation;

    /**
     * @var string
     * @Column(string)
     */
    public $price;

    /**
     * @var string - introduction
     * @Column(text)
     */
    public $introduction;


    /**
     * @var string -details
     * @Column(text)
     */
    public $details;


}