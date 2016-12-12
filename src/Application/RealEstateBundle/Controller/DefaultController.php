<?php

namespace Application\RealEstateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationRealEstateBundle:Default:index.html.twig');
    }
}
