<?php

namespace Application\HouseGardeningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationHouseGardeningBundle:Default:index.html.twig');
    }
}
