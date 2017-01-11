<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 11.01.2017
 * Time: 14:32
 */

namespace Application\AdminBundle\Form\Factory;


use Symfony\Component\Form\FormInterface;
interface FactoryInterface
{
    /**
     * @return FormInterface
     */
    public function createForm();
}