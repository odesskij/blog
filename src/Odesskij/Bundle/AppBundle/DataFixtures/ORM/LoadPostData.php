<?php
namespace Odesskij\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odesskij\Bundle\AppBundle\Entity\Post;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * LoadPostData.
 */
class LoadPostData extends AbstractFixture implements
    FixtureInterface,
    OrderedFixtureInterface,
    ContainerAwareInterface
{
    /** @var ContainerInterface */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = $this->container->get('odesskij_app.faker');

        foreach (range(0, 9) as $i) {
            $post = new Post();
            $post->setContent($faker->realText())
                ->setTitle(join(' ', $faker->words()))
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());
            $manager->persist($post);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        $path = $this->container->getParameter('odesskij_app.fixtures_data');
        $path .= '/post.yml';
        $data = Yaml::parse(file_get_contents($path));

        return $data;
    }
}
