<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        return $this->render('profil/index.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/mes-informations', name: 'mes_informations')]
    public function mesInformations(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $user = $this->getUser();

        // Créer le formulaire
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer les modifications dans la base de données
            $entityManager->flush();

            // Rediriger l'utilisateur avec un message de succès
            $this->addFlash('success', 'Vos informations ont été mises à jour.');
            return $this->redirectToRoute('mes_informations');
        }

        return $this->render('profil/mes_informations.html.twig', [
            'form' => $form->createView(),
        ]);
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