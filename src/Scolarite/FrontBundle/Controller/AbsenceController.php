<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 11/05/2015
 * Time: 01:53
 */

namespace Scolarite\FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Scolarite\AdminBundle\Entity\Absence;
use Scolarite\AdminBundle\Form\AbsenceType;

class AbsenceController extends Controller{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Absence')->findAll();

        return $this->render('ScolariteFrontBundle:Absence:enseignant.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Absence entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Absence();
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
            return $this->redirect($this->generateUrl('absence_enseignant'));
        }

        return $this->render('ScolariteFrontBundle:Absence:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Absence entity.
     *
     * @param Absence $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Absence $entity)
    {
        $form = $this->createForm(new AbsenceType(), $entity, array(
            'action' => $this->generateUrl('absence_enseignant_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Absence entity.
     *
     */
    public function newAction()
    {
        $entity = new Absence();
        $form   = $this->createCreateForm($entity);

        return $this->render('ScolariteFrontBundle:Absence:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


}