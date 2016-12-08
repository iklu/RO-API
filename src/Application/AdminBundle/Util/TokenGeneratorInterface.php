<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 08.12.2016
 * Time: 12:28
 */

namespace Application\AdminBundle\Util;


interface TokenGeneratorInterface
{
    /**
     * @return string
     */
    public function generateToken();
}