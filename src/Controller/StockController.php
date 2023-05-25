<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stock', name: 'app_stock')]
class StockController extends AbstractController
{
    #[Route('/', name: 'app_stock')]
    public function index(): Response
    {
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
        ]);
    }

    #[Route('/another', name: 'app_stock_another')]
    public function stockManager(): Response
    {
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'MANAGER',
        ]);
    }
}
