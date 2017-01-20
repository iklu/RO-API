<?php

namespace Acme\CoreBundle\Helper\Cache;
use Cache\Adapter\Redis\RedisCachePool;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 20.01.2017
 * Time: 10:53
 */
class RedisCacheHelper implements CacheHelperInterface
{

    private $redisAdapter;

    public function __construct(RedisCachePool $redisAdapter)
    {
        $this->redisAdapter = $redisAdapter;
    }

    public function has($key){
        return $this->redisAdapter->getItem($key)->isHit();
    }

    public function get($key){
        return $this->redisAdapter->getItem($key)->get();
    }

    public function set($key, $value){
        $item =  $this->redisAdapter->getItem($key)->set($value);
        $this->redisAdapter->save($item);
    }

    public function delete($key){
        return $this->redisAdapter->deleteItem($key);
    }
    
}