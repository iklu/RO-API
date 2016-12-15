<?php
namespace Application\AdminBundle\Controller;

use Application\CoreBundle\Controller\Admin\AbstractAdminController;
use Application\DoctrineBundle\Manager\Manager;
use Application\DoctrineBundle\Manager\ManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractAdminController
{

    public function getUserAction($data)
    {
        $this->getManager();
        //$user = $this->get('security.token_storage')->getToken()->getUser();

        $data->getUsername();
        return $data;
    }

    public function updateUserAction($data)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        //$data->getUsername();
        return $data;
    }


    public function addUserAction($data, Request $request)
    {
        return $data;
    }

    public function getUsersAction($data , Request $request)
    {
        return $data;
    }
}
