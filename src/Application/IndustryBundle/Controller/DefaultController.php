<?php

namespace Application\IndustryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationIndustryBundle:Default:index.html.twig');
    }
}
