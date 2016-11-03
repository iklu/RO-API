<?php
namespace Application\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="user id"}
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
    public function getUserAction($data)
    {
        //$user = $this->get('security.token_storage')->getToken()->getUser();

        $data->getUsername();
        return $data;
    }

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="user id"}
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
    public function updateUserAction($data)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        //$data->getUsername();
        return $data;
    }

    /**
     * Register service used to add a new user.
     *
     * @ApiDoc(
     *     section="Security",
     *     resource=true,
     *     description="Register profile",
     *     parameters={
     *         {"name"="firstName", "dataType"="string", "required"=false, "description"="user first name"},
     *         {"name"="lastName", "dataType"="string", "required"=false, "description"="user last name"},
     *         {"name"="email", "dataType"="string", "required"=true, "description"="user email address"},
     *         {"name"="phone", "dataType"="string", "required"=true, "description"="user phone number"},
     *         {"name"="password", "dataType"="string", "required"=true, "description"="user password"},
     *         {"name"="confirmPassword", "dataType"="string", "required"=true, "description"="user confirm password"},
     *         {"name"="storeId", "dataType"="integer", "required"=false, "description"="store id"},
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
    public function addUserAction($data , Request $request)
    {
        return $data;
    }

    /**
     * Get service used to get all the users.
     *
     * @ApiDoc(
     *     section="User",
     *     resource=true,
     *     description="Get the users",
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
    public function getUsersAction($data , Request $request)
    {
        return $data;
    }
}
