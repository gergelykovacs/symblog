<?php

namespace Anonymous\SymBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Anonymous\SymBlogBundle\Entity\Enquiry;
use Anonymous\SymBlogBundle\Form\EnquiryType;

class PageController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()
                   ->getManager();

        $blogs = $em->getRepository('AnonymousSymBlogBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('AnonymousSymBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }

    public function contactAction() {

        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();

        if($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($this->container->getParameter('blog.emails.enquiry_subject'))
                    ->setFrom($this->container->getParameter('blog.emails.system_email'))
                    ->setTo($this->container->getParameter('blog.emails.contact_email'))
                    ->setBody($this->renderView('AnonymousSymBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));

                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->set('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

                return $this->redirect($this->generateUrl('anonymous_sym_blog_contact'));
            }
        }

        return $this->render('AnonymousSymBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function aboutAction() {
        return $this->render('AnonymousSymBlogBundle:Page:about.html.twig');
    }

	public function sidebarAction()
	{
	    $em = $this->getDoctrine()
	               ->getManager();
	
	    $tags = $em->getRepository('AnonymousSymBlogBundle:Blog')
	               ->getTags();
	
	    $tagWeights = $em->getRepository('AnonymousSymBlogBundle:Blog')
                         ->getTagWeights($tags);

        $commentLimit   = $this->container
                               ->getParameter('blog.comments.latest_comment_limit');

        $latestComments = $em->getRepository('AnonymousSymBlogBundle:Comment')
                             ->getLatestComments($commentLimit);
	
	    return $this->render('AnonymousSymBlogBundle:Page:sidebar.html.twig', array(
            'latestComments' => $latestComments,
	        'tags' => $tagWeights
	    ));
	}
}
