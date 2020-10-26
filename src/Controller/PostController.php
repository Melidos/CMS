<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ["id" =>"DESC"]);
        return $this->render('post/index.html.twig', [
            "controller_name" => "home",
            "posts" => $posts
        ]);
    }

    /**
     * @Route("/post/{id}", name="post")
     */
    public function post(PostRepository $postRepository, int $id): Response
    {
        $post = $postRepository->find($id);
        return $this->render('post/post.html.twig', [
            "controller_name" => "post",
            "post" => $post
        ]);
    }
}
