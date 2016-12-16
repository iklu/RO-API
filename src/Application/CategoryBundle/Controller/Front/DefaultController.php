<?php

namespace Application\CategoryBundle\Controller\Front;

use Application\CoreBundle\Controller\Front\AbstractFrontController;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.12.2016
 * Time: 15:35
 */
class DefaultController extends AbstractFrontController
{
    public function getCategoryAction($data){
        return $data;
    }

    public function getCategoriesAction($data){
        return $data;
    }
}