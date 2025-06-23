<?php
namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity()]

class Post
{

    #[ORM\Id]
    #[ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type:'string')]
    private string $title;

    #[ORM\Column(type:'text')]
    private string $content;

    #[ORM\Column(type:'datetime')]
    private DateTime $createdAt;

    #[ORM\Column(type:'datetime')]
    private DateTime $publishedAt;

    #[ORM\JoinColumn(name: 'author_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: Author::class)]
    private ?Author $author = null;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

 public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

   
    
    public function getContent()
    {
        return $this->content;
    }

     public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setPublishedAt(DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
    public function setAuthor(Author $author)
    {
        $this->author = $author;
        return $this;
    }
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

   
}