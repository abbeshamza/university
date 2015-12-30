<?php

namespace Scolarite\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function redirectloginAction()
    {
        if($this->get('security.context')->isGranted('ROLE_ETUDIANT'))
        {
            return $this->redirect($this->generateUrl('scolarite_front_homepage'));
        }
        else
        {
            if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
            {
                return $this->redirect($this->generateUrl('scolarite_admin_homepage'));
            }
            else
                return $this->redirect($this->generateUrl('home_enseignant'));
        }
    }
    public function indexAction()
    {
        return $this->render('ScolariteUserBundle:Default:index.html.twig');
    }
}
