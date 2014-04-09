<?php

namespace TN\TOEICTrainerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TN\TOEICTrainerBundle\Entity\AudioFile;
use TN\TOEICTrainerBundle\Form\AudioFileType;

/**
 * AudioFile controller.
 *
 * @Route("/audiofile")
 */
class AudioFileController extends Controller
{

    /**
     * Lists all AudioFile entities.
     *
     * @Route("/", name="audiofile")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TOEICTrainerBundle:AudioFile')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AudioFile entity.
     *
     * @Route("/", name="audiofile_create")
     * @Method("POST")
     * @Template("TOEICTrainerBundle:AudioFile:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AudioFile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('audiofile_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a AudioFile entity.
    *
    * @param AudioFile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AudioFile $entity)
    {
        $form = $this->createForm(new AudioFileType(), $entity, array(
            'action' => $this->generateUrl('audiofile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AudioFile entity.
     *
     * @Route("/new", name="audiofile_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AudioFile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new sound.
     *
     * @Route("/newSound", name="audiofile_newSound")
     * @Method("GET")
     * @Template()
     */
    public function newSoundAction()
    {
        return array();
    }

    /**
     * Finds and displays a AudioFile entity.
     *
     * @Route("/{id}", name="audiofile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:AudioFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AudioFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AudioFile entity.
     *
     * @Route("/{id}/edit", name="audiofile_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:AudioFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AudioFile entity.');
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
    * Creates a form to edit a AudioFile entity.
    *
    * @param AudioFile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AudioFile $entity)
    {
        $form = $this->createForm(new AudioFileType(), $entity, array(
            'action' => $this->generateUrl('audiofile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AudioFile entity.
     *
     * @Route("/{id}", name="audiofile_update")
     * @Method("PUT")
     * @Template("TOEICTrainerBundle:AudioFile:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TOEICTrainerBundle:AudioFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AudioFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('audiofile_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AudioFile entity.
     *
     * @Route("/{id}", name="audiofile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TOEICTrainerBundle:AudioFile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AudioFile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('audiofile'));
    }

    /**
     * Creates a form to delete a AudioFile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('audiofile_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
