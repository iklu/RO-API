<?php

namespace Application\FashionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationFashionBundle:Default:index.html.twig');
    }
}
