<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Salle;
use Scolarite\AdminBundle\Form\SalleType;

/**
 * Salle controller.
 *
 */
class SalleController extends Controller {

    /**
     * Lists all Salle entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Salle')->findAll();

        return $this->render('ScolariteAdminBundle:Salle:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Salle entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Salle();
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
            return $this->redirect($this->generateUrl('salle'));
        }
        return $this->render('ScolariteAdminBundle:Salle:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Salle entity.
     *
     * @param Salle $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Salle $entity) {
        $form = $this->createForm(new SalleType(), $entity, array(
            'action' => $this->generateUrl('salle_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Salle entity.
     *
     */
    public function newAction() {
        $entity = new Salle();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteAdminBundle:Salle:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Salle entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Salle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Salle:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Salle entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Salle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Salle:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Salle entity.
     *
     * @param Salle $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Salle $entity) {
        $form = $this->createForm(new SalleType(), $entity, array(
            'action' => $this->generateUrl('salle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Salle entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Salle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
      // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Modiification effectue avec succès!'
                 );
            return $this->redirect($this->generateUrl('salle_edit', array('id' => $id)));
        }

        return $this->render('ScolariteAdminBundle:Salle:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Salle entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteAdminBundle:Salle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Salle entity.');
            }

            $em->remove($entity);
            $em->flush();
                  // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );
        }

        return $this->redirect($this->generateUrl('salle'));
    }

    /**
     * Creates a form to delete a Salle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('salle_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }
    
    public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteAdminBundle:Salle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Salle entity.');
        }

        $em->remove($entity);
        $em->flush();
           // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );
        return $this->redirect($this->generateUrl('salle'));
    }

}
