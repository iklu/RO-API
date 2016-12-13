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

namespace Application\DoctrineBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Knp\DoctrineBehaviors\ORM\Blameable\BlameableSubscriber as BaseBlameableSubscriber;


class BlameableSubscriber extends BaseBlameableSubscriber
{
    public function preRemove(LifecycleEventArgs $eventArgs)
    {
        return false;
    }
}
