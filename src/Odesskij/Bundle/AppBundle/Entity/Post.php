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
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
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

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \Datetime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \Datetime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
