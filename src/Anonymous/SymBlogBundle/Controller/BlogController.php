<?php

namespace Anonymous\SymBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller {

    public function showAction($id, $slug, $comments) {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('AnonymousSymBlogBundle:Blog')->find($id);

        if(!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('AnonymousSymBlogBundle:Comment')
                        ->getCommentsForBlog($blog->getId());

        return $this->render('AnonymousSymBlogBundle:Blog:show.html.twig', array(
            'blog' => $blog,
            'comments' => $comments
        ));
    }
}
