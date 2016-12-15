<?php

namespace Application\CoreBundle\Controller\Admin;

use Application\AdminBundle\Model\UserInterface;
use Application\CoreBundle\Controller\AbstractController;

use Application\CoreBundle\Utils\ApiResponse;
use Application\DoctrineBundle\Manager\ManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

abstract class AbstractAdminController extends AbstractController implements AdminControllerInterface
{
    public function indexAction(): ApiResponse
    {
        parent::__construct($manager);
    }
    
    public function addAction($data)//: ApiResponse
    {
//        $this->getAdminAuthorizationChecker($data);
//        $this->createACL($data);
        return $data;
    }
    
    public function editAction(int $id) : Response
    {
        return ApiResponse::setResponse("updated", Response::HTTP_OK);
    }
    
    public function deleteAction(int $id){
        return ApiResponse::setResponse("deleted", Response::HTTP_OK);
    }

    /**
     * 
     * @return UserInterface
     */
    public function getAuthenticatedAdmin(): UserInterface
    {
        return $this->getSecurityHelper()->getAuthenticatedAdmin();
    }

    /**
     * @param $entity
     * @return bool
     */
    public function getAdminAuthorizationChecker($entity)
    {
        return $this->getSecurityHelper()->getAdminAuthorizationChecker($entity);
    }

    public function createACL($entity) {

        // creating the ACL
        $aclProvider = $this->get('security.acl.provider');
        $objectIdentity = ObjectIdentity::fromDomainObject($entity);
        $acl = $aclProvider->createAcl($objectIdentity);

        // retrieving the security identity of the currently logged-in user
        $tokenStorage = $this->get('security.token_storage');
        $user = $tokenStorage->getToken()->getUser();

        $securityIdentity = UserSecurityIdentity::fromAccount($user);

        // grant owner access
        $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
        $aclProvider->updateAcl($acl);
    }


  
}
