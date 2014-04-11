<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        return $this->render('TOEICTrainerBundle:ReadingExercices:train.document.html.twig', array(
            'entity'      => $entity,      
            ));
    }


    /**
    * Creates a form to edit a DocHoles entity.
    * COPIED FROM DocHolesController!
    * MAKE IT A SERVICE FOR REAL PROD
    * 
    * @param DocHoles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DocHoles $entity)
    {
        $form = $this->createForm(new DocHolesExerciceType(), $entity, array(
            'action' => $this->generateUrl('docholes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
}