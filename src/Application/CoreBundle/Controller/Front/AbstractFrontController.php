<?php

namespace Application\CoreBundle\Controller\Front;
use Application\CoreBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 13.12.2016
 * Time: 14:14
 */
class AbstractFrontController extends AbstractController implements FrontControllerInterface
{
    protected function getCategoryStorage() : CategoryStorageInterface
    {
        return $this->get('category.storage');
    }

    protected function getProductStorage() : ProductStorageInterface
    {
        return $this->get('product.storage');
    }

    protected function getProductStatusStorage() : ProductStatusStorageInterface
    {
        return $this->get('product_status.storage');
    }

    protected function getProducerStorage() : ProducerStorageInterface
    {
        return $this->get('producer.storage');
    }

    protected function getOrderProvider() : OrderProviderInterface
    {
        return $this->get('order.provider.front');
    }

    protected function getAuthenticatedClient() : CustomerInterface
    {
        return $this->getSecurityHelper()->getAuthenticatedClient();
    }

    public function getCacheHelper()
    {
        return $this->get("redis.cache.helper");
    }

    public function getCustomerAuthorizationChecker($entity)
    {
        return $this->getSecurityHelper()->getCustomerAuthorizationChecker($entity);
    }

}