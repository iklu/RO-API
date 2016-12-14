<?php
namespace Application\CustomerBundle\Controller\Admin;

use Application\CoreBundle\Controller\Admin\AbstractAdminController;
use Application\DoctrineBundle\Manager\Manager;
use Application\DoctrineBundle\Manager\ManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractAdminController
{

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Customer",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="customer id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the customer is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function getCustomerAction($data)
    {
        $this->getManager();
        //$customer = $this->get('security.token_storage')->getToken()->getCustomer();

        $data->getCustomername();
        return $data;
    }

    /**
     * Get profile service used to get full profile info.
     *
     * @ApiDoc(
     *     section="Customer",
     *     resource=true,
     *     description="Get profile",
     *     requirements={
     *         {"name"="id", "dataType"="integer", "required"=true, "description"="customer id"}
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the customer is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function updateCustomerAction($data)
    {
        $customer = $this->get('security.token_storage')->getToken()->getCustomer();

        //$data->getCustomername();
        return $data;
    }

    /**
     * Register service used to add a new customer.
     *
     * @ApiDoc(
     *     section="Customer",
     *     resource=true,
     *     description="Register profile",
     *     parameters={
     *         {"name"="firstName", "dataType"="string", "required"=false, "description"="customer first name"},
     *         {"name"="lastName", "dataType"="string", "required"=false, "description"="customer last name"},
     *         {"name"="email", "dataType"="string", "required"=true, "description"="customer email address"},
     *         {"name"="phone", "dataType"="string", "required"=true, "description"="customer phone number"},
     *         {"name"="password", "dataType"="string", "required"=true, "description"="customer password"},
     *         {"name"="confirmPassword", "dataType"="string", "required"=true, "description"="customer confirm password"},
     *         {"name"="storeId", "dataType"="integer", "required"=false, "description"="store id"},
     *     },
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the customer is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function addCustomerAction($data, Request $request)
    {
        return $data;
    }

    /**
     * Get service used to get all the customers.
     *
     * @ApiDoc(
     *     section="Customer",
     *     resource=true,
     *     description="Get the customers",
     *     statusCodes={
     *         200="Returned when successful.",
     *         400="Returned when parameters are invalid.",
     *         401="Returned when the customer is not authorized.",
     *         500="Returned when the server makes a booboo."
     *     }
     * )
     *
     *
     */
    public function getCustomersAction($data , Request $request)
    {
        return $data;
    }
}
