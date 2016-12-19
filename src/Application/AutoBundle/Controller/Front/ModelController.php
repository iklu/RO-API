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
class ModelController extends AbstractFrontController
{
    public function getModelAction($data){
        //DataSerializer::deserializeWithCamelCaseEntityToArray($data);
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository("ApplicationAutoBundle:ModelHasCars")->findBy(array("models"=>$data->getId()));
        return $data;
    }

    public function getModelsAction($data){



        return $data;
    }
}