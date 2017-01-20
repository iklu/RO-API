<?php

namespace Acme\CoreBundle\Helper\Cache;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 20.01.2017
 * Time: 10:54
 */
interface CacheHelperInterface
{
    public function get($key);
    public function has($key);
    public function set($key, $value);
}