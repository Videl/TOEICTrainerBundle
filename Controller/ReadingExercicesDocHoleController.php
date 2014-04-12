<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TN\TOEICTrainerBundle\Entity\DocHoles;
use TN\TOEICTrainerBundle\Form\DocHolesType;
use TN\TOEICTrainerBundle\Form\DocHolesExerciceType;

class ReadingExercicesDocHoleController extends Controller
{
    public function showAction()
    {
        $id = 1;

        $em = $this->getDoctrine()->getManager();

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
            'action' => $this->generateUrl('tn.toeic.exercices.main_page.reading.inc_documents.train.check', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Check'));

        return $form;
    }
}