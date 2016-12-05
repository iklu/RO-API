<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 21.10.2016
 * Time: 15:57
 */

namespace  Application\CoreBundle\Utils;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;
use JMS\Serializer\Metadata\PropertyMetadata;
class IdenticalPropertyNamingStrategy implements PropertyNamingStrategyInterface
{
    public function translateName(PropertyMetadata $property)
    {
        return $property->name;
    }
}