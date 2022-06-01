<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ArticleRepository $articleRepository)
    {
        return $this->render('home/index.html.twig', [
            // findLastArticles est une fonction que j'ai créé | allez ArticleRepository.php 
            "articles"=> $articleRepository->findLastArticles(3)
        ]);
    }
}
