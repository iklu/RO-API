<?php

namespace Application\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 09.01.2017
 * Time: 22:26
 */
class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('username')
            ->add('email')
            ->add('password', RepeatedType::class, array(
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'first_name'  => 'first',
                'second_name' =>  'second',
                'type' => PasswordType::class
            ))
            ->add('firstName')
            ->add('lastName')
            ->add('confirmPassword')
            ->add('phone');



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\AdminBundle\Entity\User',
            'csrf_protection' => false,
        ));
    }

    public function  getName(){
        return "user";
    }
}