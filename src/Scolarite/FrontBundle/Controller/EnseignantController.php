<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 10/05/2015
 * Time: 23:59
 */

namespace Scolarite\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EnseignantController extends Controller {
    public function indexAction() {
        return $this->render('ScolariteFrontBundle::layoutenseignant.html.twig');
    }
    public function formationAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Formation')->findAll();

        return $this->render('ScolariteFrontBundle:Formation:enseignant.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function emploiAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Emploi')->findAll();

        return $this->render('ScolariteFrontBundle:Emploi:enseignant.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function clubAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Club')->findAll();

        return $this->render('ScolariteFrontBundle:Club:enseignant.html.twig', array(
            'entities' => $entities,
        ));
    }




}