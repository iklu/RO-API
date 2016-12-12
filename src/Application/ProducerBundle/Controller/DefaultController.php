<?php

namespace Application\ProducerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationProducerBundle:Default:index.html.twig');
    }
}
