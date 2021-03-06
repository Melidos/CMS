<?php

namespace App\Controller;

use App\Form\AdminPostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/delete/{id}", name="delete_post")
     */
    public function delete_post(PostRepository $postRepository, int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $post = $postRepository->find($id);

        $em->remove($post);
        $em->flush();

        $this->addFlash("success", "Post deleted");

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ["id" =>"DESC"]);
        return $this->render('post/admin.html.twig', [
            "controller_name" => "admin",
            "posts" => $posts
        ]);
    }

    /**
     * @Route("/admin/post/{id}", name="admin_post")
     */
    public function admin_post(PostRepository $postRepository, int $id, Request $request): Response
    {
        $post = $postRepository->find($id);

        $form = $this->createForm(AdminPostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash("success", "Post updated");
        }
        return $this->render('post/admin_post.html.twig', [
            "controller_name" => "admin_post",
            'form' => $form->createView(),
            "post" => $post
        ]);
    }
}
