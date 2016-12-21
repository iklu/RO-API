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
class AutoSubCategoryController extends AbstractFrontController
{
    public function getAutoSubCategoryAction($data){
        $c = DataSerializer::deserializeWithCamelCaseEntityToArray($data);
        print_r($c);
        return $data;
    }

    public function getAutoSubCategoriesAction($data){

        return $data;
    }
}