<?php

namespace Application\AdminBundle\Validator;
use Application\AdminBundle\Entity\User;
use Application\AdminBundle\Model\UserInterface;
use Application\CoreBundle\Utils\ApiResponse;
use Doctrine\ORM\EntityManager;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 07.12.2016
 * Time: 17:45
 */
class RegisterValidation
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    private $request;

    private $validationMessage ;

    /**
     * @var
     */
    private $em;

    /**
     * LoginValidation constructor.
     * @param ValidatorInterface $validator
     * @param RequestStack $request
     */
    public function __construct(ValidatorInterface $validator, RequestStack $request, EntityManager $entityManager) {
        $this->validator = $validator;
        $this->request = $request->getCurrentRequest();
        $this->validationMessage = "";
        $this->em = $entityManager;
    }

    /**
     * @param UserInterface $user
     * @return null
     */
    public function validate(UserInterface $user) {

        $usernameNotEmpty = new NotBlank(
            array('message' => 'Username is required')
        );

        $passwordNotEmpty = new NotBlank(
            array('message' => 'Password is required')
        );

        $confirmPassword = new NotBlank(
            array('message' => 'Confirm password is required')
        );

        $emailNotEmpty = new NotBlank(
            array('message' => 'Email is required')
        );

        $emailIsInvalid = new Email(
            array('message' => 'Email is invalid')
        );

        $validations[] = $this->validator->validate($user->getUsername(), $usernameNotEmpty);
        $validations[] = $this->validator->validate($user->getPlainPassword(), $passwordNotEmpty);
        $validations[] = $this->validator->validate($user->getConfirmationToken(), $confirmPassword);
        $validations[] = $this->validator->validate($user->getEmail(), $emailNotEmpty);
        $validations[] = $this->validator->validate($user->getEmail(), $emailIsInvalid);

        $serializer = SerializerBuilder::create()->build();

        foreach($validations as $deserialize) {
            $deserialized =  $serializer->toArray($deserialize);

            if(!empty($deserialized["violations"]) && $deserialized["violations"][0]["message"] != null){
                return $this->validationMessage = ApiResponse::setResponse($deserialized["violations"][0]["message"],Response::HTTP_BAD_REQUEST );
            }
        }

        $usernameAlreadyExists = $this->em->getRepository('ApplicationAdminBundle:User')->findOneBy(array('username' => $user->getUsername()));

        if($usernameAlreadyExists){
            return $this->validationMessage = ApiResponse::setResponse("Username already exists!", Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getValidationMessage(){
        return $this->validationMessage;
    }
}