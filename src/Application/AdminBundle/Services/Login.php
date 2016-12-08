<?php

namespace Application\AdminBundle\Services;

use Application\CoreBundle\Utils\ApiResponse;
use Application\CoreBundle\Utils\DataSerializer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 28.11.2016
 * Time: 11:24
 */
class Login
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    public function __construct(EntityManager $em , EncoderFactoryInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->entityManager = $em;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function initiate(Request $request)
    {

        $response = array();

        //check user by email/username
        $entity = $this->entityManager->getRepository('ApplicationAdminBundle:User')->findOneByUsername(trim($request->get('username')));

        //no user found
        if (!$entity) {
            $response["message"] = "User not found";
            $response["status"] = Response::HTTP_UNAUTHORIZED;
            return $response;

        }

        //user is not active
        if (!$entity->isEnabled()) {     
            $response["message"] = 'Your account is not active.'.$entity->isEnabled();
            $response["status"] = Response::HTTP_UNAUTHORIZED;
            return $response;
        }

        //check password
        $password = $entity->getPassword();


        $factory = $this->encoder;
        $encoder = $factory->getEncoder($entity);
        $pass = $encoder->encodePassword($request->get('password'), $entity->getSalt());

        if (strcmp($password, $pass) !== 0) {
            $response["message"] = 'Incorrect password.';
            $response["status"] = Response::HTTP_UNAUTHORIZED;
            return $response;
        }

        $response["message"] = DataSerializer::deserializeWithCamelCaseEntityToArray($entity);
        $response["status"] = Response::HTTP_OK;

        return $response;
    }
}