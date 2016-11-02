<?php

namespace Application\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class SecurityController extends Controller
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
    public function getProfileAction($data)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $data->getUsername();
        return $data;
    }
}
