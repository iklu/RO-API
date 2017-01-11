<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 10:48
 */

namespace Application\AdminBundle\Controller;

use Application\AdminBundle\ApplicationAdminEvents;
use Application\AdminBundle\Entity\User;
use Application\AdminBundle\Event\FilterUserResponseEvent;
use Application\AdminBundle\Event\FormEvent;
use Application\AdminBundle\Event\GetResponseUserEvent;
use Application\AdminBundle\Event\ValidationEvent;
use Application\AdminBundle\Form\RegisterType;
use Application\AdminBundle\Model\UserManagerInterface;
use Application\AdminBundle\Validator\RegisterValidation;
use Application\CoreBundle\Controller\Admin\AbstractAdminController;
use Application\CoreBundle\Utils\ApiResponse;
use Application\CoreBundle\Utils\DataSerializer;
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

        $user = new User();
        $user->setUsername($request->get("username"));
        $user->setPlainPassword($request->get("password"));

        $validate = $validator->validate($user);

        $loginData = $this->get('admin.login')->initiate($request);

        if ($validate != null) {
            return ApiResponse::setResponse($validate, Response::HTTP_BAD_REQUEST);
        }

        return ApiResponse::setResponse($loginData["message"], $loginData["status"]);
    }

    /**
     * Register service used to create a user.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Create user",
     *     parameters={
     *         {"name"="username", "dataType"="string", "required"=false, "description"="user username"},
     *         {"name"="password", "dataType"="string", "required"=true, "description"="user password"},
     *         {"name"="confirmPassword", "dataType"="string", "required"=true, "description"="user confirm password"},
     *         {"name"="email", "dataType"="string", "required"=true, "description"="user email address"},
     *         {"name"="firstName", "dataType"="string", "required"=false, "description"="user first name"},
     *         {"name"="lastName", "dataType"="string", "required"=false, "description"="user last name"},
     *         {"name"="phone", "dataType"="string", "required"=true, "description"="user phone number"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         409="Returned when the user already exists/password do not match.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function registerAction(Request $request) {

        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('admin.user_manager');

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        try {

            $user = $userManager->createUser();

            $data = $request->request->all();

            $form = $this->createForm("Application\AdminBundle\Form\Type\RegisterType", $user);
            $form->submit($data);

            $event = new GetResponseUserEvent($user, $request);
            $dispatcher->dispatch(ApplicationAdminEvents::REGISTRATION_INITIALIZE, $event);

            if ($form->isSubmitted() && $form->isValid()) {

                $dispatcher->dispatch(ApplicationAdminEvents::REGISTRATION_SUCCESS, $event);
                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    echo $event->getResponse();
                }

                $event = new FilterUserResponseEvent($user, $request, $response);
                $dispatcher->dispatch(ApplicationAdminEvents::REGISTRATION_COMPLETED, $event );

                return  $event->getResponse();
            } else {
                $event = new ValidationEvent($form, $request);
                $dispatcher->dispatch(ApplicationAdminEvents::REGISTRATION_FAILURE, $event);
                if (null !== $response = $event->getResponse()) {
                    return ApiResponse::setResponse($response,400);
                }
            }

            return ApiResponse::setResponse($response,200);
        } catch (\Exception $e) {

            return ApiResponse::setResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="user id"},
     *         {"name"="mobile", "dataType"="integer", "required"=false, "description"="is mobile"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the user is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     */
    public function getProfileAction(Request $request, $id)
    {

        $admin = $this->getAuthenticatedAdmin()->getRoles();

        $em = $this->getDoctrine()->getManager();
        //check permissions
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getId() != $id)
            return ApiResponse::setResponse('User not authorized.', Response::HTTP_UNAUTHORIZED);

        $userData = DataSerializer::deserializeWithCamelCaseEntityToArray($user);

        try {
            return ApiResponse::setResponse($userData,200);
        } catch (\Exception $e) {

            return ApiResponse::setResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}