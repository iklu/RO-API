<?php

namespace Application\AdminBundle\Validator;
use Application\AdminBundle\Entity\User;
use Application\AdminBundle\Model\UserInterface;
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
     * @param UserInterface $user
     * @return mixed
     */
    public function validate(UserInterface $user) {

        $usernameNotEmpty = new NotBlank(
            array('message' => 'Username is required')
        );

        $passwordNotEmpty = new NotBlank(
            array('message' => 'Password is required')
        );

        $validations[] = $this->validator->validate($user->getUsername(), $usernameNotEmpty);
        $validations[] = $this->validator->validate($user->getPlainPassword(), $passwordNotEmpty);

        $serializer = SerializerBuilder::create()->build();

        foreach($validations as $deserialize) {
            $deserialized =  $serializer->toArray($deserialize);
            if(isset($deserialized["violations"][0]["message"]) &&  $deserialized["violations"][0]["message"] != null)
                return $deserialized["violations"][0]["message"];
        }

    }
}