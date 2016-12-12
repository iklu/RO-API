<?php

namespace Application\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationJobsBundle:Default:index.html.twig');
    }
}
