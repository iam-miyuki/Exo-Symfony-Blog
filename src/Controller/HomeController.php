<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends AbstractController
{
    #[Route(name: 'home', path: '/')]
    public function home(PostRepository $postRepository) #on ajoute request pour typer on met toujours le type et la variable "requeste ici+sa variable
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

    #[Route(name: 'new-post', path: '/post/new')]
    public function newPost(
        Request $request,
        EntityManagerInterface $em
    ) //$request est un objet qui contient toute la requette
    {
        if ($request->getMethod() === "POST") {
            $post = new Post();
            $post->setTitle($request->request->get('title')); //request : une classe élément récupéré dans le post
            $post->setContent($request->request->get('content')); //corresponds au 'name' de input
            $post->setCreatedAt(new DateTime());
            $post->setPublishedAt(new DateTime());
            $em->persist($post); // méthod entity manager qui prépare la requette équivalent de insert into //ici je mets les valeurs récupérés dans la bdd avec entitymanager
            $em->flush(); //executer la requette
            return $this->redirectToRoute('home');
        }
        return $this->render('post/new.html.twig');
    }

    // Version 2
    #[Route(name: 'new-post-home', path: '/post/new-form')]
    public function newPostForm(
        Request $request,
        EntityManagerInterface $em
    ) {
        $post = new Post();
        $form =$this->createForm(PostType::class, $post);
        
        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $post->setCreatedAt(new DateTime());
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('home');
            dd($post);
        }
    
        return $this->render('post/newForm.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
