<?php

namespace Anonymous\SymBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('AnonymousSymBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
