<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Departement;
use Scolarite\AdminBundle\Form\DepartementType;

/**
 * Departement controller.
 *
 */
class DepartementController extends Controller {

    /**
     * Lists all Departement entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Departement')->findAll();

        return $this->render('ScolariteAdminBundle:Departement:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Departement entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Departement();
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
            return $this->redirect($this->generateUrl('departement'));
        }

        return $this->render('ScolariteAdminBundle:Departement:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Departement entity.
     *
     * @param Departement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Departement $entity) {
        $form = $this->createForm(new DepartementType(), $entity, array(
            'action' => $this->generateUrl('departement_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Departement entity.
     *
     */
    public function newAction() {
        $entity = new Departement();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteAdminBundle:Departement:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Departement entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Departement:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Departement entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Departement')->find($id);
// display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Modification effectue avec succès!'
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Departement:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Departement entity.
     *
     * @param Departement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Departement $entity) {
        $form = $this->createForm(new DepartementType(), $entity, array(
            'action' => $this->generateUrl('departement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Departement entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
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
            return $this->redirect($this->generateUrl('departement_edit', array('id' => $id)));
        }

        return $this->render('ScolariteAdminBundle:Departement:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Departement entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteAdminBundle:Departement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Departement entity.');
            }

            $em->remove($entity);
            $em->flush();
             // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
        );
        }

        return $this->redirect($this->generateUrl('departement'));
    }

    /**
     * Creates a form to delete a Departement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('departement_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }
    public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteAdminBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $em->remove($entity);
        $em->flush();
            // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );

        return $this->redirect($this->generateUrl('departement'));
    }


}
