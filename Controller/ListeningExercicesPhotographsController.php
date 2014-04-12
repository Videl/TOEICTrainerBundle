<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListeningExercicesPhotographsController extends Controller
{
    public function showAction()
    {

        $id = 1;
        $em = $this->getDoctrine()->getManager();

        $exercise = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);
        $soundsArray = $em->getRepository('TOEICTrainerBundle:AudioFile')->findBy(array('type' => 'Photography'));

        if (!$exercise) {
            throw $this->createNotFoundException('Unable to find ListeningPhotographs exercise.');
        }

        return $this->render('TOEICTrainerBundle:ListeningExercices:train.photographs.html.twig', array(
            'exercise'      => $exercise, 
            'sounds'        => $soundsArray,
            'id'            => $id,    
            ));  
    }

    public function showAnswerAction($id, $result)
    {
        $em = $this->getDoctrine()->getManager();
        $exercise = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);
        return $this->render('TOEICTrainerBundle:ListeningExercices:train.photographs.answer.html.twig', array(
            'exercise'      => $exercise,
            'result'        => $result,
            ));
    }
}