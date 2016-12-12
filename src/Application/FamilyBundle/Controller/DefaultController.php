<?php

namespace Application\FamilyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationFamilyBundle:Default:index.html.twig');
    }
}
