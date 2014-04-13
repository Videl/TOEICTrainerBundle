<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TN\TOEICTrainerBundle\Entity\DocQuestions;
use TN\TOEICTrainerBundle\Entity\AnswerQuestion;
use TN\TOEICTrainerBundle\Form\DocQuestionsType;
use TN\TOEICTrainerBundle\Form\DocQuestionsExerciceType;
use Doctrine\Common\Collections\ArrayCollection;

class ReadingExercicesQAController extends Controller
{
    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();

        $exercises = $em->getRepository('TOEICTrainerBundle:DocQuestions')->findAll();

        $idArray = array();
        foreach ($exercises as $e) {
            array_push($idArray, $e->getId());
        }
        $id = $idArray[rand(1, count($idArray)) - 1];

        $entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocQuestions entity.');
        }

        foreach ($entity->getAQPairs() as $key => $pair) {
            // I'm removing the answers, because the user has to choose the good ones
            $pair->setCorrectAnswer(null);
        }

        $form = $this->exerciseForm($entity);

        return $this->render('TOEICTrainerBundle:ReadingExercices:train.qa.html.twig', array(
            'entity'      => $entity,
            'formentity'  => $form->createView(),
        ));
    }
    
    /**
    * Creates a form to view a DocHoles entity.
    * COPIED FROM DocQuestionsController!
    * MAKE IT A SERVICE FOR REAL PROD
    * 
    * @param DocHoles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function exerciseForm(DocQuestions $entity, $data = null, array $options = array())
    {
        $form = $this->createForm(new DocQuestionsExerciceType(), $entity, array(
            'action' => $this->generateUrl('tn.toeic.exercices.main_page.reading.qa_documents.train.check'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Check'));

        return $form;
    }


    public function checkAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id = $request->get('id'); // given by GET parameter

        $original_entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);
        $entity          = new DocQuestions();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find the correction, sorry.');
        }

        $form_data = $request->get('tn_toeictrainerbundle_docquestions_exercice', array());

        $perfect = true;

        $logger = $this->get('logger');
        $entity->setDocument($em->getRepository('TOEICTrainerBundle:WrittenDocument')->find($form_data['document']));
        foreach ($form_data['AQPairs'] as $key => $value) {
            $logger->error("VIDEL", array($key));
            $pair = new AnswerQuestion();
            $pair->setQuestion($em->getRepository('TOEICTrainerBundle:AudioFile')->find($value['question']));
            $pair->setCorrectAnswer($em->getRepository('TOEICTrainerBundle:AudioFile')->find($value['correctAnswer']));

            $entity->addAQPair($pair);

            if($original_entity->getAQPairs()[$key]->getCorrectAnswer()->getId()
                != $pair->getCorrectAnswer()->getId())
                $perfect = false;
        }

        $logger->error("VIDEL VIDEL", $form_data);

        //$editForm = $this->exerciseForm($entity);
        //$editForm->handleRequest($request); // at this point, we know what is 
                                            // the answer of the user, and the
                                            // correction is in $original_entity
        

        

        return $this->render('TOEICTrainerBundle:ReadingExercices:solution.qa.html.twig', array(
            'correct_entity' => $original_entity,
            'user_entity'    => $entity,
            'perfect'        => $perfect
        ));
    }
}