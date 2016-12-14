<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 10:48
 */

namespace Application\CustomerBundle\Admin\Controller;

use Application\AdminBundle\ApplicationAdminEvents;
use Application\AdminBundle\Entity\User;
use Application\AdminBundle\Event\FilterUserResponseEvent;
use Application\AdminBundle\Event\FormEvent;
use Application\AdminBundle\Event\GetResponseUserEvent;
use Application\AdminBundle\Event\ValidationEvent;
use Application\AdminBundle\Model\UserManagerInterface;
use Application\AdminBundle\Validator\RegisterValidation;
use Application\CoreBundle\Controller\Admin\AbstractAdminController;
use Application\CoreBundle\Utils\ApiResponse;
use Application\CoreBundle\Utils\DataSerializer;
use Application\CustomerBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends AbstractAdminController
{
    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Login action",
     *     parameters={
     *         {"name"="username", "dataType"="string", "required"=true, "description"="Username"},
     *         {"name"="password", "dataType"="string", "required"=true, "description"="Password"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function loginAction(Request $request)
    {
        $validator = $this->container->get("admin.login.validate");

        $user = new Customer();
        $user->setUsername($request->get("username"));
        $user->setPlainPassword($request->get("password"));

        $validate = $validator->validate($user);

        $loginData = $this->get('admin.login')->initiate($request);

        if ($validate != null) {
            return ApiResponse::setResponse($validate, Response::HTTP_BAD_REQUEST);
        }

        return ApiResponse::setResponse($loginData["message"], $loginData["status"]);
    }
}