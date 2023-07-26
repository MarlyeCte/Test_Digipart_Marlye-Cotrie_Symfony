<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'catalogue')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'articles' => $articleRepository -> getCatalogueProduct(),
        ]);
    }
}
