<?php

namespace Application\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    public function getProfileAction($data)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if(!$user){
            exit;
        }

        $data->getUsername();
        return $data;
    }
}
