<?php

namespace Application\AutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationAutoBundle:Default:index.html.twig');
    }
}
