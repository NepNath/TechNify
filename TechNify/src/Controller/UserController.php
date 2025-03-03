<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/mes-informations', name: 'mes_informations')]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // Créer le formulaire
        $form = $this->createForm(UserType::class, $user);

        // Traiter la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer les modifications dans la base de données
            $entityManager->flush();

            // Ajouter un message flash
            $this->addFlash('success', 'Vos informations ont été mises à jour avec succès.');

            // Rediriger l'utilisateur
            return $this->redirectToRoute('mes_informations');
        }

        // Afficher le formulaire
        return $this->render('mes_informations.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}