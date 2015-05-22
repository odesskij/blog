<?php
namespace Odesskij\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Post Entity.
 * @ORM\Entity(repositoryClass="PostRepository")
 * @ORM\Table(name="odesskij_app_post")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $content;

    /**
     * @ORM\Column(type="datetime")
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @var \Datetime
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Odesskij\Bundle\AppBundle\Entity\User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    protected $user;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
