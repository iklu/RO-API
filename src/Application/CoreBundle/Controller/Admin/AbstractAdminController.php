<?php

namespace Application\CoreBundle\Controller\Admin;

use Application\AdminBundle\Model\UserInterface;
use Application\CoreBundle\Controller\AbstractController;

use Application\CoreBundle\Utils\ApiResponse;
use Application\DoctrineBundle\Manager\ManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractAdminController extends AbstractController implements AdminControllerInterface
{
    public function indexAction(): ApiResponse
    {
        parent::__construct($manager);
    }
    
    public function addAction(Request $request, $manager, $validator): ApiResponse
    {
        return ApiResponse::setResponse("added", Response::HTTP_OK);
    }
    
    public function editAction(int $id) : Response
    {
        return ApiResponse::setResponse("updated", Response::HTTP_OK);
    }
    
    public function deleteAction(int $id){
        return ApiResponse::setResponse("deleted", Response::HTTP_OK);
    }
    
    public function getAuthenticatedAdmin(): UserInterface
    {
        return $this->getSecurityHelper()->getAuthenticatedAdmin();
    }
}
