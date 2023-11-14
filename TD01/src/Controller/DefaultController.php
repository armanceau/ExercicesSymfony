<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/hello/{name}', name: 'app_hello')]
    public function hello(string $name): Response
    {
        return $this->render('default/hello.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/age/{age}', name: 'app_age')]
    public function age(int $age): Response
    {
        if($age >= 18){
            $query = "Bravo, vous être majeur! 🥳";
        }
        else{
            $query = "Ah mince, vous êtes trop jeune ... 😟";
        }
        return $this->render('default/age.html.twig', [
            'query' => $query,
        ]);
    }
}
