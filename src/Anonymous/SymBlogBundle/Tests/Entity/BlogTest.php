<?php

namespace Anonymous\SymBlogBundle\Tests\Entity;

use Anonymous\SymBlogBundle\Entity\Blog;

class BlogTest extends \PHPUnit_Framework_TestCase {

	public function testSlugify() {
	    $blog = new Blog();
	
	    $this->assertEquals('hello-world', $blog->slugify('Hello World'));
	    $this->assertEquals('a-day-with-symfony-2-5', $blog->slugify('A day with Symfony 2.5'));
	    $this->assertEquals('hello-world', $blog->slugify('Hello    world'));
	    $this->assertEquals('symblog', $blog->slugify('symblog '));
	    $this->assertEquals('symblog', $blog->slugify(' symblog'));
	}

	public function testSetTitle() {
	    $blog = new Blog();
	
	    $blog->setTitle('Hello World');
	    $this->assertEquals('hello-world', $blog->getSlug());
	}
}
