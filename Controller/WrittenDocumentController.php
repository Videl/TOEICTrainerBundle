<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TN\TOEICTrainerBundle\Entity\WrittenDocument;
use TN\TOEICTrainerBundle\Form\WrittenDocumentType;

/**
 * WrittenDocument controller.
 *
 */
class WrittenDocumentController extends Controller
{

    /**
     * Lists all WrittenDocument entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TOEICTrainerBundle:WrittenDocument')->findAll();

        return $this->render('TOEICTrainerBundle:WrittenDocument:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new WrittenDocument entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new WrittenDocument();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('writtendocument_show', array('id' => $entity->getId())));
        }

        return $this->render('TOEICTrainerBundle:WrittenDocument:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a WrittenDocument entity.
    *
    * @param WrittenDocument $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(WrittenDocument $entity)
    {
        $form = $this->createForm(new WrittenDocumentType(), $entity, array(
            'action' => $this->generateUrl('writtendocument_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new WrittenDocument entity.
     *
     */
    public function newAction()
    {
        $entity = new WrittenDocument();
        $form   = $this->createCreateForm($entity);

        return $this->render('TOEICTrainerBundle:WrittenDocument:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a WrittenDocument entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:WrittenDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WrittenDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TOEICTrainerBundle:WrittenDocument:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing WrittenDocument entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:WrittenDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WrittenDocument entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TOEICTrainerBundle:WrittenDocument:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a WrittenDocument entity.
    *
    * @param WrittenDocument $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(WrittenDocument $entity)
    {
        $form = $this->createForm(new WrittenDocumentType(), $entity, array(
            'action' => $this->generateUrl('writtendocument_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing WrittenDocument entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:WrittenDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WrittenDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('writtendocument_edit', array('id' => $id)));
        }

        return $this->render('TOEICTrainerBundle:WrittenDocument:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a WrittenDocument entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TOEICTrainerBundle:WrittenDocument')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find WrittenDocument entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('writtendocument'));
    }

    /**
     * Creates a form to delete a WrittenDocument entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('writtendocument_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
