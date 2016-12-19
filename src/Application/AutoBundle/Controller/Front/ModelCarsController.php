<?php

namespace Application\AutoBundle\Controller\Front;

use Application\CoreBundle\Controller\Front\AbstractFrontController;
use Application\CoreBundle\Utils\ApiResponse;
use Application\CoreBundle\Utils\DataSerializer;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.12.2016
 * Time: 15:35
 */
class ModelCarsController extends AbstractFrontController
{
    /**
     * Activate service used to activate a user.
     *
     * @ApiDoc(
     *     section="Model Cars",
     *     resource=true,
     *     description="Activate user",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="user id"},
     *         {"name"="mobile", "dataType"="integer", "required"=false, "description"="is mobile"}
     *     },
     *     parameters={
     *         {"name"="token", "dataType"="string", "required"=true, "description"="validation token"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         404="Returned when the user is not found.",
     *         409="Returned when the user is already active.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function getModelCarsAction($id, Request $request){
        //DataSerializer::deserializeWithCamelCaseEntityToArray($data);
        $em = $this->getDoctrine()->getManager();
        
        $cars = $em->getRepository("ApplicationAutoBundle:ModelHasCars")->getModelCars($id);
        
        $c = DataSerializer::deserializeWithCamelCaseEntityToArray($cars);

        return ApiResponse::setResponse($c);
    }

    public function getModelsCarsAction(Request $request){



        return ApiResponse::setResponse("dfs");
    }
}