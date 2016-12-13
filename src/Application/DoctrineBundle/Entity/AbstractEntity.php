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

namespace Application\DoctrineBundle\Entity;


abstract class AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }
}
