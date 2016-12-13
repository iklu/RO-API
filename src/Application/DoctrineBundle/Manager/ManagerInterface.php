<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace Application\DoctrineBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Application\DoctrineBundle\Entity\EntityInterface;
use Application\DoctrineBundle\Factory\EntityFactoryInterface;
use Application\DoctrineBundle\Helper\Doctrine\DoctrineHelperInterface;
use Application\DoctrineBundle\Repository\RepositoryInterface;

/**
 * Interface ManagerInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ManagerInterface
{
    const POST_ENTITY_INIT_EVENT   = 'post_init';
    const PRE_ENTITY_UPDATE_EVENT  = 'pre_update';
    const POST_ENTITY_UPDATE_EVENT = 'post_update';
    const PRE_ENTITY_CREATE_EVENT  = 'pre_create';
    const POST_ENTITY_CREATE_EVENT = 'post_create';
    const PRE_ENTITY_REMOVE_EVENT  = 'pre_remove';
    const POST_ENTITY_REMOVE_EVENT = 'post_remove';
    
    /**
     * Returns the helper for Doctrine calls
     *
     * @return DoctrineHelperInterface
     */
    public function getDoctrineHelper() : DoctrineHelperInterface;
    
    /**
     * Returns the Doctrine manager
     *
     * @return ObjectManager
     */
    public function getEntityManager() : ObjectManager;
    
    /**
     * Returns the repository
     *
     * @return RepositoryInterface
     */
    public function getRepository() : RepositoryInterface;
    
    /**
     * Returns the factory
     *
     * @return EntityFactoryInterface
     */
    public function getFactory() : EntityFactoryInterface;
    
    /**
     * Initializes new resource object
     *
     * @return EntityInterface
     */
    public function initResource() : EntityInterface;
    
    /**
     * Persists new resource
     *
     * @param EntityInterface $resource
     * @param bool            $flush
     */
    public function createResource(EntityInterface $resource, bool $flush = true);
    
    /**
     * Updates existing resource
     *
     * @param EntityInterface $resource
     * @param bool            $flush
     */
    public function updateResource(EntityInterface $resource, bool $flush = true);
    
    /**
     * Removes a resource
     *
     * @param EntityInterface $resource
     * @param bool            $flush
     */
    public function removeResource(EntityInterface $resource, bool $flush = true);
}
