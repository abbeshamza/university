<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 11/05/2015
 * Time: 01:16
 */

namespace Scolarite\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Test;
use Scolarite\AdminBundle\Form\TestType;

class TestController extends Controller {
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Test')->findAll();

        return $this->render('ScolariteFrontBundle:Test:enseignant.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function createAction(Request $request)
    {
        $entity = new Test();
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
            return $this->redirect($this->generateUrl('test_enseignant'));
        }

        return $this->render('ScolariteFrontBundle:Test:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Test entity.
     *
     * @param Test $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Test $entity)
    {
        $form = $this->createForm(new TestType(), $entity, array(
            'action' => $this->generateUrl('test_enseignant_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Test entity.
     *
     */
    public function newAction()
    {
        $entity = new Test();
        $form   = $this->createCreateForm($entity);

        return $this->render('ScolariteFrontBundle:Test:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


}