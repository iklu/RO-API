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

namespace Application\DoctrineBundle\DependencyInjection\Compiler;

use Application\CoreBundle\DependencyInjection\Compiler\AbstractCollectionPass;


class RegisterClassMetadataEnhancerPass extends AbstractCollectionPass
{
    /**
     * @var string
     */
    protected $collectionServiceId = 'doctrine.class_metadata.enhancer_collection';

    /**
     * @var string
     */
    protected $serviceTag = 'doctrine.mapping.enhancer';
}
