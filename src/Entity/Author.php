<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Author extends User
{
    #[ORM\Column(type: 'string')]
    private string $job;

    
    #[ORM\Column(type: 'text')]
    private string $description;

    
    public function setJob(string $job)
    {
        $this->job = $job;
        return $this;
    }

    public function getJob(): string
    {
        return $this->job;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
     public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}