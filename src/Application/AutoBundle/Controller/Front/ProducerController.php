<?php

namespace Application\AutoBundle\Controller\Front;

use Application\CoreBundle\Controller\Front\AbstractFrontController;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.12.2016
 * Time: 15:35
 */
class ProducerController extends AbstractFrontController
{
    public function getProducerAction($data){
        return $data;
    }

    public function getProducersAction($data){
        return $data;
    }
}