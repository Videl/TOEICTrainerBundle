<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TN\TOEICTrainerBundle\Entity\PictureFile;
use TN\TOEICTrainerBundle\Form\PictureFileType;

/**
 * PictureFile controller.
 *
 * @Route("/picturefile")
 */
class PictureFileController extends Controller
{

    /**
     * Lists all PictureFile entities.
     *
     * @Route("/", name="picturefile")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TOEICTrainerBundle:PictureFile')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PictureFile entity.
     *
     * @Route("/", name="picturefile_create")
     * @Method("POST")
     * @Template("TOEICTrainerBundle:PictureFile:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PictureFile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('picturefile_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PictureFile entity.
    *
    * @param PictureFile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PictureFile $entity)
    {
        $form = $this->createForm(new PictureFileType(), $entity, array(
            'action' => $this->generateUrl('picturefile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PictureFile entity.
     *
     * @Route("/new", name="picturefile_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PictureFile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PictureFile entity.
     *
     * @Route("/{id}", name="picturefile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:PictureFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PictureFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PictureFile entity.
     *
     * @Route("/{id}/edit", name="picturefile_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:PictureFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PictureFile entity.');
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
    * Creates a form to edit a PictureFile entity.
    *
    * @param PictureFile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PictureFile $entity)
    {
        $form = $this->createForm(new PictureFileType(), $entity, array(
            'action' => $this->generateUrl('picturefile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PictureFile entity.
     *
     * @Route("/{id}", name="picturefile_update")
     * @Method("PUT")
     * @Template("TOEICTrainerBundle:PictureFile:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:PictureFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PictureFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('picturefile_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PictureFile entity.
     *
     * @Route("/{id}", name="picturefile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TOEICTrainerBundle:PictureFile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PictureFile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('picturefile'));
    }

    /**
     * Creates a form to delete a PictureFile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('picturefile_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
