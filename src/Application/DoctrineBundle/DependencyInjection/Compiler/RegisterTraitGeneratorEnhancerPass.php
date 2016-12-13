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


class RegisterTraitGeneratorEnhancerPass extends AbstractCollectionPass
{
    /**
     * @var string
     */
    protected $collectionServiceId = 'doctrine.trait_generator.enhancer_collection';

    /**
     * @var string
     */
    protected $serviceTag = 'doctrine.mapping.enhancer';
}
