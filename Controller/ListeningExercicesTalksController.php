<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListeningExercicesTalksController extends Controller
{
    public function showAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:train.talks.html.twig');  
    }
    
}