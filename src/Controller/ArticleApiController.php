<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ArticleApiController extends AbstractController
{
    #[Route('/api/{idProduct}', name: 'article_api', methods: ['GET'])]
    public function getArticle(Article $article): JsonResponse
    {
        return $this-> json(
            $article, 
            200, 
            [], 
            ['groups' => ['selected']
        ]);
    }
}
