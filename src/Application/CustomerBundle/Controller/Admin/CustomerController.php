<?php
namespace Application\CustomerBundle\Controller\Admin;

use Application\CoreBundle\Controller\Admin\AbstractAdminController;

use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractAdminController
{
    public function getCustomerAction($data)
    {
        $this->getManager();
        //$customer = $this->get('security.token_storage')->getToken()->getCustomer();

        $data->getCustomername();
        return $data;
    }

    public function updateCustomerAction($data)
    {
        $customer = $this->get('security.token_storage')->getToken()->getCustomer();

        //$data->getCustomername();
        return $data;
    }

    public function addCustomerAction($data, Request $request)
    {
        return $data;
    }

    public function getCustomersAction($data , Request $request)
    {
        return $data;
    }
}
