<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Niveau;
use Scolarite\AdminBundle\Form\NiveauType;

/**
 * Niveau controller.
 *
 */
class NiveauController extends Controller {

    /**
     * Lists all Niveau entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Niveau')->findAll();

        return $this->render('ScolariteAdminBundle:Niveau:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Niveau entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Niveau();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
                  // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Ajout effectue avec succès!'
                 );

            return $this->redirect($this->generateUrl('niveau'));
        }

        return $this->render('ScolariteAdminBundle:Niveau:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Niveau entity.
     *
     * @param Niveau $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Niveau $entity) {
        $form = $this->createForm(new NiveauType(), $entity, array(
            'action' => $this->generateUrl('niveau_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Niveau entity.
     *
     */
    public function newAction() {
        $entity = new Niveau();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteAdminBundle:Niveau:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Niveau entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Niveau')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Niveau entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Niveau:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Niveau entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Niveau')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Niveau entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Niveau:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Niveau entity.
     *
     * @param Niveau $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Niveau $entity) {
        $form = $this->createForm(new NiveauType(), $entity, array(
            'action' => $this->generateUrl('niveau_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Niveau entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Niveau')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Niveau entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
      // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Modification effectue avec succès!'
                 );
            return $this->redirect($this->generateUrl('niveau_edit', array('id' => $id)));
        }

        return $this->render('ScolariteAdminBundle:Niveau:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Niveau entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteAdminBundle:Niveau')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Niveau entity.');
            }

            $em->remove($entity);
            $em->flush();
                  // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );
        }

        return $this->redirect($this->generateUrl('niveau'));
    }

    /**
     * Creates a form to delete a Niveau entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('niveau_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }
 public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteAdminBundle:Niveau')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $em->remove($entity);
        $em->flush();
            // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );

        return $this->redirect($this->generateUrl('niveau'));
    }

}
