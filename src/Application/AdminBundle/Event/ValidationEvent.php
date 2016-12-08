<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\AdminBundle\Event;

use Application\AdminBundle\Validator\RegisterValidation;
use Application\CoreBundle\Utils\ApiResponse;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationEvent extends Event
{

    /**
     * @var RegisterValidation
     */
    private $validation;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ApiResponse
     */
    private $response;

    /**
     * ValidationEvent constructor.
     * @param RegisterValidation $validation
     * @param Request $request
     */
    public function __construct(RegisterValidation $validation, Request $request)
    {
        $this->validation = $validation;
        $this->request = $request;
    }

    /**
     * @return RegisterValidation
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param  $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return ApiResponse
     */
    public function getResponse()
    {
        return $this->response;
    }
}
