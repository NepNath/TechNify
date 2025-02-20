<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        ## récup lutilisateur qui est co
        $user = $this->getUser();

       
        return $this->render('profil/index.html.twig', [ ##prendre info de l user
            'user' => $user,
        ]);
    }
}
