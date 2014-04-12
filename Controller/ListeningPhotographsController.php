<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TN\TOEICTrainerBundle\Entity\ListeningPhotographs;
use TN\TOEICTrainerBundle\Form\ListeningPhotographsType;
use TN\TOEICTrainerBundle\Form\ListeningPhotographsExerciseType;

/**
 * ListeningPhotographs controller.
 *
 * @Route("/listeningphotographs")
 */
class ListeningPhotographsController extends Controller
{

    /**
     * Lists all ListeningPhotographs entities.
     *
     * @Route("/", name="listeningphotographs")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ListeningPhotographs entity.
     *
     * @Route("/", name="listeningphotographs_create")
     * @Method("POST")
     * @Template("TOEICTrainerBundle:ListeningPhotographs:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ListeningPhotographs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('listeningphotographs_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ListeningPhotographs entity.
    *
    * @param ListeningPhotographs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ListeningPhotographs $entity)
    {
        $form = $this->createForm(new ListeningPhotographsType(), $entity, array(
            'action' => $this->generateUrl('listeningphotographs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ListeningPhotographs entity.
     *
     * @Route("/new", name="listeningphotographs_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ListeningPhotographs();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ListeningPhotographs entity.
     *
     * @Route("/{id}", name="listeningphotographs_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListeningPhotographs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ListeningPhotographs entity.
     *
     * @Route("/{id}/edit", name="listeningphotographs_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListeningPhotographs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ListeningPhotographs entity.
    *
    * @param ListeningPhotographs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ListeningPhotographs $entity)
    {
        $form = $this->createForm(new ListeningPhotographsType(), $entity, array(
            'action' => $this->generateUrl('listeningphotographs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ListeningPhotographs entity.
     *
     * @Route("/{id}", name="listeningphotographs_update")
     * @Method("PUT")
     * @Template("TOEICTrainerBundle:ListeningPhotographs:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListeningPhotographs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('listeningphotographs_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ListeningPhotographs entity.
     *
     * @Route("/{id}", name="listeningphotographs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TOEICTrainerBundle:ListeningPhotographs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ListeningPhotographs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('listeningphotographs'));
    }

    /**
     * Creates a form to delete a ListeningPhotographs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listeningphotographs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }





    /**
    * Creates a form for an exercise with this entity.
    *
    * @param ListeningPhotographs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createExerciseForm(ListeningPhotographs $entity)
    {
        $form = $this->createForm(new ListeningPhotographsExerciseType(), $entity, array(
            'action' => $this->generateUrl('listeningphotographs_exercise'),
            'method' => 'POST',
        ));

        $form->add("kokok","choice",array('property_path' => 'picture','expanded' => 'true', 'multiple' => 'false'));

        return $form;
    }
    /**
     * Creates a new exercise with this entity.
     *
     * @Route("/", name="listeningphotographs_exercise")
     * @Method("POST")
     * @Template("TOEICTrainerBundle:ListeningPhotographs:new.html.twig")
     */
    public function exerciseAction(Request $request)
    {
        $entity = new ListeningPhotographs();
        $form = $this->createExerciseForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            return $this->redirect($this->generateUrl('listeningphotographs_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


}
