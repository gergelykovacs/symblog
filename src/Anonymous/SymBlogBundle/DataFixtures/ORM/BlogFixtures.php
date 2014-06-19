<?php

namespace Anonymous\SymBlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Anonymous\SymBlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $blog1 = new Blog();
        $blog1->setTitle('A day with Symfony 2.5');
        $blog1->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut ligula odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus interdum vestibulum purus, quis vulputate sapien malesuada sed. Vivamus vehicula lacus nec lacus ultricies viverra. Nunc ut gravida libero, varius semper augue. Nulla ac augue gravida, tincidunt mauris eget, euismod dui. Mauris aliquam lorem a venenatis volutpat. Vivamus molestie urna risus, tincidunt suscipit purus pretium ut. Mauris ut lacus laoreet, tincidunt erat eget, auctor ante.');
        $blog1->setImage('image-1.jpg');
        $blog1->setAuthor('J.F.K.');
        $blog1->setTags('symfony, php, paradise, symblog, night');
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setTitle('Blackmores Night: Possum goes to Prague');
        $blog2->setBlog('Nam tempus enim non massa tempor, a venenatis risus vulputate. Duis sodales augue non metus volutpat ornare. Curabitur sagittis nibh odio, ac vestibulum magna consequat sit amet. Suspendisse gravida varius nulla id interdum. Cras elit justo, varius vitae sagittis in, adipiscing vitae urna. Maecenas tincidunt posuere sodales. Aliquam ut purus orci. Morbi aliquet lorem ac augue tempus interdum. Nunc in venenatis sapien. Fusce risus erat, venenatis at pharetra eu, posuere ut ligula.');
        $blog2->setImage('image-2.jpg');
        $blog2->setAuthor('Hero of the day');
        $blog2->setTags('pool, leaky, hacked, movie, hacking, symblog, night');
        $blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('What an impression do you have if a bee fly by?');
        $blog3->setBlog('Vivamus ut blandit sem, non fermentum lacus. Cras eget rutrum est. Nunc id lacus ante. Aenean convallis sapien nec fringilla gravida. Mauris bibendum mollis malesuada. Vestibulum sed eros mattis mi porttitor euismod nec et augue. Duis sollicitudin, risus ac convallis posuere, est dolor lacinia orci, vitae semper erat risus ut felis. Quisque non tortor eget mauris mattis sodales. Integer sit amet libero ut ipsum sollicitudin bibendum eget ac risus. Sed lobortis risus non tincidunt tempus. Ut eu massa massa. Duis vel sem quis est venenatis laoreet.');
        $blog3->setImage('image-3.jpg');
        $blog3->setAuthor('The daily guard');
        $blog3->setTags('misdirection, magic, movie, hacking, symblog');
        $blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        $blog3->setUpdated($blog3->getCreated());
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('The grid - A digital frontier');
        $blog4->setBlog('Nulla non turpis sit amet nibh convallis malesuada vel ut urna. Nullam consectetur libero eget justo fermentum, eu molestie augue congue. In scelerisque ante nunc, eget pulvinar sapien fermentum vitae. Aliquam mattis feugiat purus a eleifend. Fusce justo justo, semper et mi a, vehicula dignissim est. Curabitur luctus eu tellus ullamcorper mollis. Vivamus quis massa a nibh posuere dapibus. Sed dapibus magna ac hendrerit fermentum. Pellentesque pellentesque volutpat orci ac pharetra. Cras eu dapibus leo. Mauris volutpat tellus velit, at lobortis lectus eleifend a. Interdum et malesuada fames ac ante ipsum primis in faucibus.');
        $blog4->setImage('image-4.jpg');
        $blog4->setAuthor('Anonymous');
        $blog4->setTags('grid, daftpunk, movie, symblog');
        $blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        $blog4->setUpdated($blog4->getCreated());
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('You\'re either a one or a zero: alive or dead?');
        $blog5->setBlog('Vestibulum bibendum rhoncus vestibulum. Morbi ac dapibus diam, ac varius turpis. Nunc interdum a elit id bibendum. Integer at elit quis augue dignissim pulvinar. Aliquam id imperdiet magna. Pellentesque semper justo quam, et laoreet nulla sodales sed. Nullam pellentesque lacus at fringilla posuere. Sed imperdiet felis ac euismod lobortis. Curabitur sed lobortis eros, ut congue augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque imperdiet, purus quis scelerisque aliquam, elit ipsum eleifend enim, euismod viverra sapien est vitae odio. Aliquam suscipit ac metus a rhoncus. Vestibulum a elit felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec vitae mollis eros. Phasellus at arcu ipsum.');
        $blog5->setImage('image-5.jpg');
        $blog5->setAuthor('ZerOne Captain');
        $blog5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        $blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        $blog5->setUpdated($blog5->getCreated());
        $manager->persist($blog5);

        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
    }

    public function getOrder() {
        return 1;
    }
}
