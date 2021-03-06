<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Scolarite\AdminBundle\Entity\Adresse;
use Scolarite\AdminBundle\Form\AdresseType;

/**
 * Adresse controller.
 *
 */
class AdresseController extends Controller
{

    /**
     * Lists all Adresse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Adresse')->findAll();

        return $this->render('ScolariteAdminBundle:Adresse:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Adresse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Adresse();
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
            return $this->redirect($this->generateUrl('adresse'));
        }

        return $this->render('ScolariteAdminBundle:Adresse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Adresse entity.
     *
     * @param Adresse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Adresse $entity)
    {
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Adresse entity.
     *
     */
    public function newAction()
    {
        $entity = new Adresse();
        $form   = $this->createCreateForm($entity);

        return $this->render('ScolariteAdminBundle:Adresse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Adresse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Adresse:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Adresse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteAdminBundle:Adresse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Adresse entity.
    *
    * @param Adresse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Adresse $entity)
    {
        $form = $this->createForm(new AdresseType(), $entity, array(
            'action' => $this->generateUrl('adresse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Adresse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteAdminBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adresse entity.');
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
            return $this->redirect($this->generateUrl('adresse_edit', array('id' => $id)));
        }

        return $this->render('ScolariteAdminBundle:Adresse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Adresse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteAdminBundle:Adresse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adresse entity.');
            }

            $em->remove($entity);
            $em->flush();
                  // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );
        }

        return $this->redirect($this->generateUrl('adresse'));
    }

    /**
     * Creates a form to delete a Adresse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
      public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteAdminBundle:Adresse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $em->remove($entity);
        $em->flush();
            // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );

        return $this->redirect($this->generateUrl('adresse'));
    }
}
