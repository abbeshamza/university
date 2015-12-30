<?php

namespace Scolarite\FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller {

    public function indexAction() {
        return $this->render('ScolariteFrontBundle:Front:index.html.twig');
    }
    public function formationAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Formation')->findAll();

        return $this->render('ScolariteFrontBundle:Formation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function absenceAction()
    {
        $em = $this->getDoctrine()->getManager();
        $class=$user= $this->get('security.context')->getToken()->getUser()->getClasse();
        $entities = $em->getRepository('ScolariteAdminBundle:Absence')->findByClasse($class);

        return $this->render('ScolariteFrontBundle:Absence:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function emploiAction() {
        $em = $this->getDoctrine()->getManager();
        $class=$user= $this->get('security.context')->getToken()->getUser()->getClasse();

        $entities = $em->getRepository('ScolariteAdminBundle:Emploi')->findByClasse($class);

        return $this->render('ScolariteFrontBundle:Emploi:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function clubAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ScolariteAdminBundle:Club')->findAll();

        return $this->render('ScolariteFrontBundle:Club:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function testAction() {
        $em = $this->getDoctrine()->getManager();
$class=$user= $this->get('security.context')->getToken()->getUser()->getClasse();
        $entities = $em->getRepository('ScolariteAdminBundle:Test')->findByClasse($class);

        return $this->render('ScolariteFrontBundle:Test:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function rattrapageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $class=$user= $this->get('security.context')->getToken()->getUser()->getClasse();
        $entities = $em->getRepository('ScolariteAdminBundle:Rattrapage')->findByClasse($class);
        return $this->render('ScolariteFrontBundle:Rattrapage:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
