<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 11/05/2015
 * Time: 02:14
 */

namespace Scolarite\FrontBundle\Controller;
use Scolarite\AdminBundle\Entity\Rattrapage;
use Scolarite\AdminBundle\Form\RattrapageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class RattrapageController extends Controller {
    public function enseignantAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Rattrapage')->findAll();

        return $this->render('ScolariteFrontBundle:Rattrapage:enseignant.html.twig', array(
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

            return $this->redirect($this->generateUrl('rattrapage_enseignant'));
        }

        return $this->render('ScolariteFrontBundle:Rattrapage:new.html.twig', array(
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
            'action' => $this->generateUrl('rattrapage_enseignant_create'),
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

        return $this->render('ScolariteFrontBundle:Rattrapage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


}