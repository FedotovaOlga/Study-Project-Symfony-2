<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'DWWM 2074',
        ]);
    }


    #[Route('/home/{nom}', name: 'app_home')] // name est facultatif; sauf si après on veut faire des redirections vers cette route
    public function home(string $nom): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => $nom,
        ]);
    }

    

    #[Route('/example', name: 'app_home_exemple')]
    public function example(): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/second', name: 'app_home_second')]
    public function secondExample(): Response
    {
        $a = 3;
        $b = 5;
        print($a+$b);

        $this -> denyAccessUnlessGranted("ROLE_ADMIN");
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
