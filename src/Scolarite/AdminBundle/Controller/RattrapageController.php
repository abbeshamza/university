<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Scolarite\AdminBundle\Entity\Rattrapage;
use Scolarite\AdminBundle\Form\RattrapageType;

/**
 * Rattrapage controller.
 *
 */
class RattrapageController extends Controller
{

    /**
     * Lists all Rattrapage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Rattrapage')->findAll();

        return $this->render('ScolariteAdminBundle:Rattrapage:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rattrapage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rattrapage();
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

            return $this->redirect($this->generateUrl('rattrapage'));
        }

        return $this->render('ScolariteAdminBundle:Rattrapage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rattrapage entity.
     *
     * @param Rattrapage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rattrapage $entity)
    {
        $form = $this->createForm(new RattrapageType(), $entity, array(
            'action' => $this->generateUrl('rattrapage_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rattrapage entity.
     *
     */
    public function newAction()
    {
        $entity = new Rattrapage();
        $form   = $this->createCreateForm($entity);

        return $this->render('ScolariteAdminBundle:Rattrapage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rattrapage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Rattrapage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rattrapage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Rattrapage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rattrapage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Rattrapage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rattrapage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Rattrapage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rattrapage entity.
    *
    * @param Rattrapage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rattrapage $entity)
    {
        $form = $this->createForm(new RattrapageType(), $entity, array(
            'action' => $this->generateUrl('rattrapage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rattrapage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Rattrapage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rattrapage entity.');
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

            return $this->redirect($this->generateUrl('rattrapage_edit', array('id' => $id)));
        }

        return $this->render('ScolariteAdminBundle:Rattrapage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rattrapage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteAdminBundle:Rattrapage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rattrapage entity.');
            }

            $em->remove($entity);
            $em->flush();
            // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );
        }

        return $this->redirect($this->generateUrl('rattrapage'));
    }

    /**
     * Creates a form to delete a Rattrapage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rattrapage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteAdminBundle:Rattrapage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $em->remove($entity);
        $em->flush();
        // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
        );

        return $this->redirect($this->generateUrl('rattrapage'));
    }
}
