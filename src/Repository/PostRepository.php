<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Post::class);
    }
    public function findAllWithAuthor()
    {
        $qb = $this->createQueryBuilder('post');
        $qb
            ->addSelect('author')
            ->leftJoin('post.author', 'author');
        return $qb->getQuery()->getResult();
    }
}
