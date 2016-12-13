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

namespace Application\DoctrineBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Application\DoctrineBundle\Entity\EntityInterface;


final class EntityEvent extends Event
{
    private $entity;

    /**
     * EntityEvent constructor.
     *
     * @param EntityInterface $entity
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity() : EntityInterface
    {
        return $this->entity;
    }
}
