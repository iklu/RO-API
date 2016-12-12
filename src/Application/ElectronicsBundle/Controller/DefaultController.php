<?php

namespace Application\ElectronicsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationElectronicsBundle:Default:index.html.twig');
    }
}
