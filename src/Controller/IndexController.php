<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Article;
use App\Entity\Client;
use App\Entity\Panier;

class IndexController extends AbstractController
{
    /**
     * @Route("index", name="index")
     * @Route("/", name="index")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'articles' => $articleRepository->findAll(),
        ]);
    }
    /**
     * @Route("/BMX", name="BMX")
     */
      public function BMX(ArticleRepository $articleRepository): Response
      {
          return $this->render('index/bmx.html.twig', [
              'articles' => $articleRepository->findAll(),
          ]);
    }

}
