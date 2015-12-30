<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 11/05/2015
 * Time: 00:57
 */

namespace Scolarite\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Formation ;
use Scolarite\AdminBundle\Form\FormationType;
use Symfony\Component\HttpFoundation\Request;
class FormationController extends Controller {

    public function createAction(Request $request) {
        $entity = new Formation();
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
            return $this->redirect($this->generateUrl('formation_index_enseignant'));
        }

        return $this->render('ScolariteFrontBundle:Formation:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Formation entity.
     *
     * @param Formation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Formation $entity) {
        $form = $this->createForm(new FormationType(), $entity, array(
            'action' => $this->generateUrl('formation_enseignant_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Formation entity.
     *
     */
    public function newAction() {
        $entity = new Formation();
        $form = $this->createCreateForm($entity);

        return $this->render('ScolariteFrontBundle:Formation:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

}