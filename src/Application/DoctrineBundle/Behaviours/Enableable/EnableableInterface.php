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

namespace Application\DoctrineBundle\Behaviours\Enableable;


interface EnableableInterface
{
    /**
     * @return bool
     */
    public function getEnabled() : bool;

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled);
}
