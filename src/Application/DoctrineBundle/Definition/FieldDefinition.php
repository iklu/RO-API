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

namespace Application\DoctrineBundle\Definition;

use Symfony\Component\OptionsResolver\OptionsResolver;


class FieldDefinition extends AbstractMappingDefinition
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired([
            'fieldName',
            'type',
            'length',
            'unique',
            'nullable',
            'columnName',
        ]);

        $resolver->setDefaults([
            'length'   => 50,
            'unique'   => false,
            'nullable' => true,
        ]);

        $resolver->setAllowedTypes('fieldName', 'string');
        $resolver->setAllowedTypes('type', 'string');
        $resolver->setAllowedTypes('length', 'integer');
        $resolver->setAllowedTypes('unique', 'boolean');
        $resolver->setAllowedTypes('nullable', 'boolean');
        $resolver->setAllowedTypes('columnName', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function getClassMetadataMethod()
    {
        return MappingDefinitionInterface::CLASS_METADATA_METHOD_FIELD;
    }
}
