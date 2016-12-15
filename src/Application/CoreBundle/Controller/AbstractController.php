<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 13.12.2016
 * Time: 11:44
 */

namespace Application\CoreBundle\Controller;

use Application\CoreBundle\Helper\Image\ImageHelperInterface;
use Application\CoreBundle\Helper\Request\RequestHelperInterface;
use Application\CoreBundle\Helper\Security\SecurityHelperInterface;
use Application\CoreBundle\Helper\Validator\ValidatorHelperInterface;
use Application\DoctrineBundle\Helper\Doctrine\DoctrineHelperInterface;
use Application\DoctrineBundle\Manager\ManagerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\KernelInterface;

class AbstractController extends Controller implements ControllerInterface
{

    public $manager;

    public function __construct()
    {
    }
    public function getKernel() : KernelInterface
    {
        return $this->get('kernel');
    }

    public function getDoctrineHelper() : DoctrineHelperInterface
    {
        return $this->get('doctrine.helper');
    }

    public function getRequestHelper() : RequestHelperInterface
    {
        return $this->get('request.helper');
    }

    public function getImageHelper() : ImageHelperInterface
    {
        return $this->get('image.helper');
    }

    public function getLocales() : array
    {
        return $this->get('locale.repository')->findAll();
    }

    public function getCurrencyHelper() : CurrencyHelperInterface
    {
        return $this->get('currency.helper');
    }

    public function getSecurityHelper() : SecurityHelperInterface
    {
        return $this->get('security.helper');
    }

    public function getMailerHelper() : MailerHelperInterface
    {
        return $this->get('mailer.helper');
    }


    public function getValidatorHelper() : ValidatorHelperInterface
    {
        return $this->get('validator.helper');
    }

    public function getEntityManager() : ObjectManager
    {
        return $this->getDoctrineHelper()->getEntityManager();
    }

    public function getEventDispatcher() : EventDispatcherInterface
    {
        return $this->get('event_dispatcher');
    }

    public function setManager($manager){
        $this->manager = $manager;
    }

    protected function getManager()
    {
        return $this->manager;
    }
    protected function jsonResponse(array $content) : JsonResponse
    {
        return new JsonResponse($content);
    }
}