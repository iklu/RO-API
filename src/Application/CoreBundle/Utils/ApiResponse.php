<?php

namespace  Application\CoreBundle\Utils;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 05.12.2016
 * Time: 14:22
 */
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse {

    public static function setResponse($msg, $code = 200) {

        $response = array('message' => $msg);

        return new JsonResponse($response, $code);

    }
}
