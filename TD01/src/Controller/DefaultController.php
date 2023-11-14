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

    #[Route('/tab', name: 'app_tab')]
    public function tab(): Response
    {
        $player1 = ["nom" => "Ronaldo", "prenom" => "Cristiano", "age" => 35, "vegetarien" => true];
        $player2 = ["nom" => "Messi", "prenom" => "Lionel", "age" => 32, "vegetarien" => false];
        $player3 = ["nom" => "Drogba", "prenom" => "Didier", "age" => 45, "vegetarien" => false];

        $players =[$player1, $player2, $player3];
        return $this->render('default/tableau.html.twig', [
            'controller_name' => 'DefaultController',
            'players' => $players,
        ]);
    }

    #[Route('/name/{name?world}', name: 'app_hello')]
    public function hello(string $name): Response
    {
        return $this->render('default/hello.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/age/{age?18}', name: 'app_age')]
    public function age(int $age): Response
    {
        if($age >= 18){
            $query = "Bravo, vous être majeur! 🥳";
            $queryLink = "adulte";
        }
        else{
            $query = "Ah mince, vous êtes trop jeune ... 😟";
            $queryLink = "enfant";
        }
        return $this->render('default/age.html.twig', [
            'query' => $query,
            'queryLink' => $queryLink,
        ]);
    }
}
