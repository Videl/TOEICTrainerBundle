<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListeningExercicesController extends Controller
{
    public function indexAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:index.html.twig');
    }

    public function photographsAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:index.photographs.html.twig');
    }

    public function qaAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:index.qa.html.twig');
    }

    public function conversationsAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:index.html.twig');
        //return $this->render('TOEICTrainerBundle:ListeningExercices:index.conversations.html.twig');
    }

    public function talksAction()
    {
        return $this->render('TOEICTrainerBundle:ListeningExercices:index.html.twig');
        //return $this->render('TOEICTrainerBundle:ListeningExercices:index.talks.html.twig');
    }
}
