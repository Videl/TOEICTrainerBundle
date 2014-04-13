<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TN\TOEICTrainerBundle\Entity\DocQuestions;
use TN\TOEICTrainerBundle\Form\DocQuestionsType;

/**
 * DocQuestions controller.
 *
 */
class DocQuestionsController extends Controller
{

    /**
     * Lists all DocQuestions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TOEICTrainerBundle:DocQuestions')->findAll();

        return $this->render('TOEICTrainerBundle:DocQuestions:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DocQuestions entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DocQuestions();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('docquestions_show', array('id' => $entity->getId())));
        }

        return $this->render('TOEICTrainerBundle:DocQuestions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a DocQuestions entity.
    *
    * @param DocQuestions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(DocQuestions $entity)
    {
        $form = $this->createForm(new DocQuestionsType(), $entity, array(
            'action' => $this->generateUrl('docquestions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DocQuestions entity.
     *
     */
    public function newAction()
    {
        $entity = new DocQuestions();
        $form   = $this->createCreateForm($entity);

        return $this->render('TOEICTrainerBundle:DocQuestions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DocQuestions entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocQuestions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TOEICTrainerBundle:DocQuestions:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing DocQuestions entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocQuestions entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TOEICTrainerBundle:DocQuestions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DocQuestions entity.
    *
    * @param DocQuestions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DocQuestions $entity)
    {
        $form = $this->createForm(new DocQuestionsType(), $entity, array(
            'action' => $this->generateUrl('docquestions_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DocQuestions entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocQuestions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('docquestions_edit', array('id' => $id)));
        }

        return $this->render('TOEICTrainerBundle:DocQuestions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DocQuestions entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TOEICTrainerBundle:DocQuestions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DocQuestions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('docquestions'));
    }

    /**
     * Creates a form to delete a DocQuestions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('docquestions_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
