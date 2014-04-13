<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListeningExercicesQAController extends Controller
{
    public function showAction()
    {

        $idArray = array();
        $em = $this->getDoctrine()->getManager();
        //TODO: change repository and create entity
        $exercises = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->findAll();
        foreach ($exercises as $e) {
            array_push($idArray, $e->getId());         
        }
        $id = $idArray[rand(1, count($idArray)) - 1];

        $exercise = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);

        if (!$exercise) {
            throw $this->createNotFoundException('Unable to find Questions/Answers exercise.');
        }

        return $this->render('TOEICTrainerBundle:ListeningExercices:train.qa.html.twig', array(
            'exercise'      => $exercise, 
            'id'            => $id,    
            ));  
    }

    /*public function showAnswerAction($id, $result)
    {
        $em = $this->getDoctrine()->getManager();
        $exercise = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);
        return $this->render('TOEICTrainerBundle:ListeningExercices:train.photographs.answer.html.twig', array(
            'exercise'      => $exercise,
            'result'        => $result,
            ));
    }*/
}