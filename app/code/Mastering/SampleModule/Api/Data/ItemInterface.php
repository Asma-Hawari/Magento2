<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/11/19
 * Time: 3:45 PM
 */

namespace Mastering\SampleModule\Api\Data ;

interface ItemInterface {

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string | null
     */
    public function getDescription();

}