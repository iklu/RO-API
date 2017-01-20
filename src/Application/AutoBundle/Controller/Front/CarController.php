<?php

namespace Application\AutoBundle\Controller\Front;

use Application\CoreBundle\Controller\Front\AbstractFrontController;
use Application\CoreBundle\Utils\DataSerializer;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.12.2016
 * Time: 15:35
 */
class CarController extends AbstractFrontController
{
    public function getCarAction($data){
        return $data;
    }

    public function getCarsAction($data){
        $cache  = $this->getCacheHelper();
        $cacheKey = 'car';
        if($cache->has($cacheKey)){
          return $cache->get($cacheKey);
        }
        $cache->set($cacheKey, "dd");
        return $data;
    }
}