<?php

namespace Scolarite\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
        return $this->render('ScolariteAdminBundle:Admin:index.html.twig');
    }

}
