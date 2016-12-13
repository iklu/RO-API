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

namespace Application\DoctrineBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Application\AppBundle\Entity\DiscountablePriceInterface;
use Application\AppBundle\Entity\PriceInterface;
use Application\CoreBundle\DependencyInjection\AbstractContainerAware;
use Application\CurrencyBundle\Entity\CurrencyInterface;
use Application\ShopBundle\Entity\ShopInterface;
use Application\TaxBundle\Entity\TaxInterface;


abstract class AbstractEntityFactory extends AbstractContainerAware implements EntityFactoryInterface
{
    /**
     * @var string
     */
    private $className;

    /**
     * AbstractEntityFactory constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }
    
    protected function init()
    {
        return new $this->className;
    }

    protected function createDiscountablePrice() : DiscountablePriceInterface
    {
        return $this->get('discountable_price.factory')->create();
    }
    
    protected function createPrice() : PriceInterface
    {
        return $this->get('price.factory')->create();
    }
    
    protected function getDefaultCurrency() : CurrencyInterface
    {
        return $this->get('currency.repository')->findOneBy([]);
    }
    
    protected function getDefaultTax() : TaxInterface
    {
        return $this->get('tax.repository')->findOneBy([]);
    }
    
    protected function getDefaultShops() : Collection
    {
        return $this->get('shop.repository')->matching(new Criteria());
    }
    
    protected function getDefaultShop() : ShopInterface
    {
        return $this->get('shop.storage')->getCurrentShop();
    }
    
    protected function createEmptyCollection() : Collection
    {
        return new ArrayCollection();
    }
}
