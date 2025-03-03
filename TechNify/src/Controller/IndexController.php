<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

final class IndexController extends AbstractController
{
    #[Route('/home', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(Product::class)->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'products' => $products,
        ]);
    }
}
