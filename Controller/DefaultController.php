<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('TOEICTrainerBundle:Default:index.html.twig');
    }
}
