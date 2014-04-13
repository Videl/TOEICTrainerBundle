<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TN\TOEICTrainerBundle\Entity\DocHoles;
use TN\TOEICTrainerBundle\Form\DocHolesType;
use TN\TOEICTrainerBundle\Form\DocHolesExerciceType;
use Doctrine\Common\Collections\ArrayCollection;

class ReadingExercicesDocHoleController extends Controller
{
    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();

        $exercises = $em->getRepository('TOEICTrainerBundle:DocHoles')->findAll();

        $idArray = array();
        foreach ($exercises as $e) {
            array_push($idArray, $e->getId());
        }
        $id = $idArray[rand(1, count($idArray)) - 1];

        $entity = $em->getRepository('TOEICTrainerBundle:DocHoles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocHoles entity.');
        }

        $form = $this->exerciseForm($entity);

        return $this->render('TOEICTrainerBundle:ReadingExercices:train.document.html.twig', array(
            'entity'      => $entity,
            'formentity'  => $form->createView(),
        ));
    }
    
    /**
    * Creates a form to view a DocHoles entity.
    * COPIED FROM DocHolesController!
    * MAKE IT A SERVICE FOR REAL PROD
    * 
    * @param DocHoles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function exerciseForm(DocHoles $entity, $data = null, array $options = array())
    {
        $form = $this->createForm(new DocHolesExerciceType(), $entity, array(
            'action' => $this->generateUrl('tn.toeic.exercices.main_page.reading.inc_documents.train.check'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Check'));

        return $form;
    }

    public function checkAction(Request $request)
    {
        $entity = new DocHoles();
        $form_data = $request->get('tn_toeictrainerbundle_docholes_exercice', array());

        $em = $this->getDoctrine()->getManager();
        $correct_entity = $em->getRepository('TOEICTrainerBundle:DocHoles')->find($request->get('id'));

        if (!$correct_entity) {
            throw $this->createNotFoundException('Unable to find DocHoles entity.');
        }

        $user_data = $form_data['wordDocHoles'];

        $logger = $this->get('logger');
        $logger->error('VIDEL VIDEL VIDEL', array(1 => $form_data, 2 => $request->get('id')));

        return $this->render('TOEICTrainerBundle:ReadingExercices:solution.document.html.twig', array(
            'correct_entity'      => $correct_entity,
            'user_response'       => $user_data
        ));
    }

    public function showSentencesAction()
    {

        $em = $this->getDoctrine()->getManager();

        $exercises = $em->getRepository('TOEICTrainerBundle:DocHoles')->findAll();

        $idArray = array();
        foreach ($exercises as $e) {
            array_push($idArray, $e->getId());
        }
        $id = $idArray[rand(1, count($idArray)) - 1];

        $entity = $em->getRepository('TOEICTrainerBundle:DocHoles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocHoles entity.');
        }

        $form = $this->exerciseForm($entity);

        return $this->render('TOEICTrainerBundle:ReadingExercices:train.sentences.html.twig', array(
            'entity'      => $entity,
            'formentity'  => $form->createView(),
        ));
    }

    public function checkSentencesAction(Request $request)
    {
        $entity = new DocHoles();
        $form_data = $request->get('tn_toeictrainerbundle_docholes_exercice', array());

        $em = $this->getDoctrine()->getManager();
        $correct_entity = $em->getRepository('TOEICTrainerBundle:DocHoles')->find($request->get('id'));

        if (!$correct_entity) {
            throw $this->createNotFoundException('Unable to find DocHoles entity.');
        }

        $user_data = $form_data['wordDocHoles'];

        $logger = $this->get('logger');
        $logger->error('VIDEL VIDEL VIDEL', array(1 => $form_data, 2 => $request->get('id')));

        return $this->render('TOEICTrainerBundle:ReadingExercices:solution.sentences.html.twig', array(
            'correct_entity'      => $correct_entity,
            'user_response'       => $user_data
        ));
    }
}