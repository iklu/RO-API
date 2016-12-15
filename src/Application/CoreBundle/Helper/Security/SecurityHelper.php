<?php
namespace Application\CoreBundle\Helper\Security;

use Application\AdminBundle\Entity\User;
use Application\AdminBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Application\CoreBundle\Helper\Request\RequestHelperInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


final class SecurityHelper implements SecurityHelperInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var RequestHelperInterface
     */
    private $requestHelper;

    /**
     * @var array|\Symfony\Component\HttpFoundation\RequestMatcher[]
     */
    private $firewallMap;

    private $authorizationChecker;

    /**
     * SecurityHelper constructor.
     * @param TokenStorageInterface $tokenStorage
     * @param RequestHelperInterface $requestHelper
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param array $firewallMap
     */
    public function __construct(TokenStorageInterface $tokenStorage, RequestHelperInterface $requestHelper, AuthorizationCheckerInterface $authorizationChecker, array $firewallMap = [])
    {
        $this->tokenStorage  = $tokenStorage;
        $this->requestHelper = $requestHelper;
        $this->firewallMap   = $firewallMap;
        $this->authorizationChecker   = $authorizationChecker;
    }

    public function getCurrentUser()
    {
        $token = $this->tokenStorage->getToken();
        if (null !== $token) {
            return $token->getUser();
        }

        return null;
    }

    public function getCurrentClient()
    {
        $user = $this->getCurrentUser();

        return $user instanceof UserInterface ? $user : null;
    }

    public function getCurrentAdmin()
    {
        $user = $this->getCurrentUser();

        return $user instanceof UserInterface ? $user : null;
    }

    public function getAuthenticatedCustomer() : UserInterface
    {
        return $this->getCurrentUser();
    }

    public function getAuthenticatedAdmin() : UserInterface
    {
        return $this->getCurrentUser();
    }

    public function isActiveFirewall(string $name) : bool
    {
        $request = $this->requestHelper->getCurrentRequest();

        return $name === $this->getFirewallNameForRequest($request);
    }

    public function isActiveAdminFirewall() : bool
    {
        return $this->isActiveFirewall('admin');
    }

    public function getFirewallNameForRequest(Request $request)
    {
        foreach ($this->firewallMap as $firewallName => $requestMatcher) {
            if (null === $requestMatcher || $requestMatcher->matches($request)) {
                return $firewallName;
            }
        }

        return null;
    }

    public function generateRandomPassword(int $length = 8) : string
    {
        $chars    = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);

        return $password;
    }

    /**
     * @param $entity
     * @return bool
     */
    public function getCustomerAuthorizationChecker($entity){
        if (false === $this->authorizationChecker->isGranted('EDIT', $entity)) {
            throw new AccessDeniedException;
        }
        return true;
    }

    /**
     * @param $entity
     * @return bool
     */
    public function getAdminAuthorizationChecker($entity){
        if (false === $this->authorizationChecker->isGranted('EDIT', $entity)) {
            throw new AccessDeniedException;
        }
        return true;
    }
}
