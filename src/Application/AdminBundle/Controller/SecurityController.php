<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 10:48
 */

namespace Application\AdminBundle\Controller;

use Application\AdminBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
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
    public function loginAction($data)
    {
        //$user = $this->get('security.token_storage')->getToken()->getUser();

//        $username = $data->getUsername();
//        $password = $data->getPassword();
//
//        $user  = new User();
//        $user->setUsername($username);
//        $user->setPassword($password);


        $validator = $this->get('validator');
        $errors = $validator->validate($data);

        $login = $this->get('application_admin.login')->initiate($data);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        return new JsonResponse($login);
        //return $data;
    }
}