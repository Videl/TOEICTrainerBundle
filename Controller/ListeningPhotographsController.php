<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
* ListeningPhotographs controller.
*
*/
class ListeningPhotographsController extends Controller
{
    public function indexAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningPhotographs:index.html.twig');
    }
}
