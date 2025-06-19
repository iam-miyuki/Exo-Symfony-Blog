<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorMap;

#[ORM\Entity()]
#[ORM\InheritanceType('JOINED')] // JOINED permet de créer une table pour chaque classe enfant
#[ORM\DiscriminatorColumn(name:'discr', type:'string')]
#[DiscriminatorMap([
    'author'=> Author::class // on mappe la classe Author à la valeur 'author'
])]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue] // permet de générer automatiquement l'ID
    protected int $id; // protected est utilisé pour que les classes enfants puissent accéder à ces propriétés

    #[ORM\Column(type: 'string')]
    protected string $firstname;

    #[ORM\Column(type: 'string')]
    protected string $lastname;

    #[ORM\Column(type: 'string', unique: true)] // unique pour éviter les doublons dans la base de données
    protected string $email;

    #[ORM\Column(type: 'string')]
    protected string $password;

    public function getId(): int
    {
        return $this->id;
    }   
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

}