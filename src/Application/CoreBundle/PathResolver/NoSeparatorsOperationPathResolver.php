<?php

namespace Application\CoreBundle\PathResolver;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 14.12.2016
 * Time: 18:04
 */

use ApiPlatform\Core\PathResolver\OperationPathResolverInterface;
use Doctrine\Common\Inflector\Inflector;

final class NoSeparatorsOperationPathResolver implements OperationPathResolverInterface
{
    public function resolveOperationPath(string $resourceShortName, array $operation, bool $collection) : string
    {
        $path = Inflector::pluralize(strtolower($resourceShortName));
        if (!$collection) {
            $path .= '/{id}';
        }
        $path .= '.{_format}';

        return "/api/".$path;
    }
}
