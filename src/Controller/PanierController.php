<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Panier;
use App\Entity\User;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Persistence\ManagerRegistry;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
     public function Panier(ManagerRegistry $doctrine, Request $request, ArticleRepository $articleRepository): Response
     {
       $user = $this->getUser();

       return $this->render('panier/index.html.twig', [
           'paniers' => $user->getPaniers(),
       ]);
     }
    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
     public function add (int $id, Request $request, Article $article): Response
     {
       $user = $this->getUser();
       $entityManager = $this->getDoctrine()->getManager();

      // $panier = $session->get("panier",[]);
       $id = $article->getId();
       if(!empty($panier[$id])){
         $panier[$id]++;
       }
       $panier= new Panier();
       $panier->setArticle($article);
       $userId = $user->getId();
       $panier->setUser($user);
       $panier->setQuantite(1);
       $entityManager->persist($panier);
       $entityManager->flush();

      /* $article = new Article();
       $form = $this->createForm(ArticleType::class, $article);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $entityManager->persist($article);
           $entityManager->flush();

           return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
       } */
       return $this->redirectToRoute("panier");
     }
     /**
      *  @Route("/{id}", name="panier_delete", methods={"POST"})
      */
     public function delete (int $id, Request $request, Panier $panier, EntityManagerInterface $entityManager): Response
     {
       if ($this->isCsrfTokenValid('delete'.$panier->getId(), $request->request->get('_token'))) {
           $entityManager->remove($panier);
           $entityManager->flush();
       }

         return $this->redirectToRoute("panier", [], Response::HTTP_SEE_OTHER);
       }


}
