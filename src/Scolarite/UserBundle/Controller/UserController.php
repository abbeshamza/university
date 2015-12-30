<?php

namespace Scolarite\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\UserBundle\Entity\User;
use Scolarite\UserBundle\Form\Type\RegistrationFormType;

/**
 * User controller.
 *
 */
class UserController extends Controller {

    /**
     * Lists all User entities.
     *
     */
    public function indexAction() {


        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM ScolariteUserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter('role', '%"ROLE_SUPER_ADMIN"%'
            );
        $entities = $query->getResult();

        return $this->render('ScolariteUserBundle:User:index.html.twig', array(
                    'entities' => $entities,
        ));
    }
    public function indexEnseignantAction() {


        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM ScolariteUserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter('role', '%"ROLE_ENSEIGNANT"%'
            );
        $entities = $query->getResult();

        return $this->render('ScolariteUserBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function indexEtudiantAction() {


        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM ScolariteUserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter('role', '%"ROLE_ETUDIANT"%'
            );
        $entities = $query->getResult();

        return $this->render('ScolariteUserBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }



    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new User();
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

            return $this->redirect($this->generateUrl('user'));
        }

        return $this->render('ScolariteUserBundle:User:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity) {
        $form = $this->createForm(new RegistrationFormType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction() {
        $entity = new User();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteUserBundle:User:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }
    public function inscriptionAction() {
        $entity = new User();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteUserBundle:User:inscription.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteUserBundle:User:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ScolariteUserBundle:User:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(User $entity) {
        $form = $this->createForm(new RegistrationFormType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ScolariteUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
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

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return $this->render('ScolariteUserBundle:User:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ScolariteUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
                // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );

        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('user_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }
    
    public function removeFromDatatableAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ScolariteUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $em->remove($entity);
        $em->flush();
           // display flash message
        $this->get('session')->getFlashBag()->add(
                'notice', 'Suppression effectue avec succès!'
                 );

        return $this->redirect($this->generateUrl('user'));
    }

}
