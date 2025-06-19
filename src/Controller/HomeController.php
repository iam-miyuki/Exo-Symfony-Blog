<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route(name: 'home', path: '/')]
    public function home(Request $request, PostRepository $postRepository) #on ajoute request pour typer on met toujours le type et la variable "requeste ici+sa variable
    {
        //    dd($request);# le controlleur doit retourner une instance de la classe Response
        // dd($request->getMethod()); // pour afficher la méthode de la requête
        //    return new Response('Hello word!!!');
        $posts = $postRepository->findAllWithAuthor();
        return $this->render(
            'home.html.twig',

            [
                'posts' => $posts 
            ]

        ); // on utilise la méthode render pour afficher le template home.html.twig
    }
}
