<?php

namespace Anonymous\SymBlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase {

    public function testIndex() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Anonymous');

        $this->assertTrue($crawler->filter('html:contains("Hello Anonymous")')->count() > 0);
    }
}
