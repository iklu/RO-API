<?php

namespace Application\PetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationPetsBundle:Default:index.html.twig');
    }
}
