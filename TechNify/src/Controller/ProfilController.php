<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        // recup luser co 
        $user = $this->getUser();

        return $this->render('profil/index.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/mes-informations', name: 'mes_informations')]
    public function mesInformations(): Response
    {
        return $this->render('profil/mes_informations.html.twig');
    }

    #[Route('/mes-produits', name: 'mes_produits')]
    public function mesProduits(): Response
    {
        return $this->render('profil/mes_produits.html.twig');
    }

    #[Route('/offres-en-attentes', name: 'offres_en_attentes')]
    public function offresEnAttentes(): Response
    {
        return $this->render('profil/offres_en_attentes.html.twig');
    }

    #[Route('/livraison', name: 'livraison')]
    public function livraison(): Response
    {
        return $this->render('profil/livraison.html.twig');
    }

    #[Route('/solde', name: 'solde')]
    public function solde(): Response
    {
        return $this->render('profil/solde.html.twig');
    }
    
    #[Route('/ajout-solde', name: 'ajout_solde')]
    public function ajoutSolde(): Response
    {
    return $this->render('profil/ajout_solde.html.twig');
    }

}

