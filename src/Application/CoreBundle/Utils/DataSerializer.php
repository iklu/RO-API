<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 06.10.2016
 * Time: 14:04
 */

namespace  Application\CoreBundle\Utils;

use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;


class DataSerializer
{
    /**
     * Transform object to array
     *
     * @param $entity
     * @return array
     */
    public static function deserializeEntityToArray($entity) {

        $serializer = SerializerBuilder::create()->build();
        $entityToArray = $serializer->toArray($entity);

        return $entityToArray;
    }

    /**
     * Transform object to array and keep camel case
     *
     * @param $entity
     * @return array
     */
    public static function deserializeWithCamelCaseEntityToArray($entity) {

        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build()->toArray($entity);
    }
}