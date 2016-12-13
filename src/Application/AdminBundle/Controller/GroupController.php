<?php
namespace Application\AdminBundle\Controller;

use Application\CoreBundle\Utils\ApiResponse;
use Application\CoreBundle\Utils\DataSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{

    /**
     * Get group service used to get full group info.
     *
     * @ApiDoc(
     *     section="Group",
     *     resource=true,
     *     description="Get group",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="group id"}
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
    public function getGroupAction($data)
    {
        //$user = $this->get('security.token_storage')->getToken()->getGroup();

        $data->getGroupname();
        return $data;
    }

    /**
     * Get group service used to get full group info.
     *
     * @ApiDoc(
     *     section="Group",
     *     resource=true,
     *     description="Get group",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="group id"}
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
    public function updateGroupAction($data)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        //$data->getGroupname();
        return $data;
    }

    /**
     * Register service used to add a new group.
     *
     * @ApiDoc(
     *     section="Group",
     *     resource=true,
     *     description="Add group",
     *     parameters={
     *         {"name"="name", "dataType"="string", "required"=false, "description"="group name"},
     *         {"name"="roles", "dataType"="array", "required"=false, "description"="array of roles"}
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
    public function addGroupAction($data , Request $request)
    {
        return $data;
    }

    /**
     * Get service used to get all the groups.
     *
     * @ApiDoc(
     *     section="Group",
     *     resource=true,
     *     description="Get the groups",
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
    public function getGroupsAction($data , Request $request)
    {
        $values = [];
        foreach($data as $key=>$value){
            $values[] = DataSerializer::deserializeWithCamelCaseEntityToArray($value);
        }
        return $values;
    }
}
