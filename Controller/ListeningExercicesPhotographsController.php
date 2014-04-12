<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListeningExercicesPhotographsController extends Controller
{
    public function showAction()
    {

        $id = 1;
        $em = $this->getDoctrine()->getManager();

        $exercise = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);
        $soundsArray = $em->getRepository('TOEICTrainerBundle:AudioFile')->findAll();

        /*foreach($soundsArray as $sound)
        {
          echo $exercise->getId();
        }*/

        if (!$exercise) {
            throw $this->createNotFoundException('Unable to find ListeningPhotographs exercise.');
        }

        return $this->render('TOEICTrainerBundle:ListeningExercices:train.photographs.html.twig', array(
            'exercise'      => $exercise, 
            'sounds'        => $soundsArray,     
            ));  
    }
}