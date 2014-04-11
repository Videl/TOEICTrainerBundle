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
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.document.html.twig');
    }

    public function qa_documentsAction()
    {
        $flash = $this->get('braincrafted_bootstrap.flash');
        $flash->alert('This is an alert flash message.');
        $flash->error('This is an error flash message.');
        $flash->info('This is an info flash message.');
        $flash->success('This is an success flash message.');
        return $this->render('TOEICTrainerBundle:ReadingExercices:index.html.twig');
    }
}
