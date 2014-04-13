<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListeningExercicesConversationsController extends Controller
{
    public function showAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:train.conversations.html.twig');  
    }

}