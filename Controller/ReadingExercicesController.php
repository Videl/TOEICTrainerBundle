<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReadingExercicesController extends Controller
{
    public function indexAction()
    {
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.html.twig');
    }

    public function inc_sentencesAction()
    {
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.html.twig');
    }

    public function inc_documentsAction()
    {
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.html.twig');
    }

    public function qa_documentsAction()
    {
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.html.twig');
    }
}
