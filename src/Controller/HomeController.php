<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HttpClientInterface $client): Response
    {
        return $this->render('home/index.html.twig', [
            'citation' => $client->request('GET', 'https://kaamelott.chaudie.re/api/random')->toArray(),
        ]);
    }
}
