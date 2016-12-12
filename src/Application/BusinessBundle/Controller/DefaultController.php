<?php

namespace Application\BusinessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationBusinessBundle:Default:index.html.twig');
    }
}
