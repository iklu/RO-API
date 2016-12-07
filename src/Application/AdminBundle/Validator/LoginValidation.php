<?php

namespace Application\AdminBundle\Validator;
use Application\AdminBundle\Entity\User;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 07.12.2016
 * Time: 17:45
 */
class LoginValidation
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * LoginValidation constructor.
     * @param ValidatorInterface $validator
     * @param RequestStack $request
     */
    public function __construct(ValidatorInterface $validator, RequestStack $request) {
        $this->validator = $validator;
        $this->request = $request->getCurrentRequest();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function validate(User $user) {
        
        $usernameNotEmpty = new NotBlank(
            array('message' => 'Username is required')
        );

        $passwordNotEmpty = new NotBlank(
            array('message' => 'Password is required')
        );

        $username = $this->validator->validate($user->getUsername(), $usernameNotEmpty);
        $password = $this->validator->validate($user->getPlainPassword(), $passwordNotEmpty);

        $serializer = SerializerBuilder::create()->build();

        $deserializedUsernameError = $serializer->toArray($username);
        $deserializedPassError = $serializer->toArray($password);



        if($deserializedUsernameError["violations"][0]["message"] != null)
            return $deserializedUsernameError["violations"][0]["message"];
        if($deserializedPassError["violations"][0]["message"] != null)
            return $deserializedPassError["violations"][0]["message"];

        return null;
    }
}