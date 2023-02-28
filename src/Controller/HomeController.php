<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\DemandePrestation;
use App\Repository\ProfRepository;
use App\Form\DemandePrestationType;
use App\Repository\CoursRepository;
use App\Repository\ContactRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\DemandePrestationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);
            $this->addFlash('success', 'Votre message a bien été envoyé !');

            return $this->redirectToRoute('app_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('home/contact.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
        // return $this->render('home/contact.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);
    }

    #[Route('/informations-bagad', name: 'app_infos')]
    public function informations(): Response
    {
        return $this->render('home/infos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/bagad/presentation', name: 'app_presentation')]
    public function presentation(ProfRepository $profRepository): Response
    {
        return $this->render('bagad/presentation.html.twig', [
            'controller_name' => 'HomeController',
            'profs' => $profRepository->findAll(),
        ]);
    }

    #[Route('/bagad/galerie', name: 'app_galerie')]
    public function galerie(): Response
    {
        return $this->render('bagad/galerie.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/bagad/cours', name: 'app_cours')]
    public function cours(CoursRepository $coursRepository): Response
    {
        return $this->render('bagad/cours.html.twig', [
            'controller_name' => 'HomeController',
            'cours' => $coursRepository->findAll(),
        ]);
    }

    #[Route('/vie-associative', name: 'app_vie-associative')]
    public function vieassociative(): Response
    {
        return $this->render('home/vie-associative.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/prestations/agenda', name: 'app_agenda')]
    public function agenda(EvenementRepository $evenementRepository): Response
    {
        return $this->render('prestations/agenda.html.twig', [
            'controller_name' => 'HomeController',
            'evenements' => $evenementRepository->orderByDate(),
        ]);
    }

    #[Route('/prestations/demande', name: 'app_demande')]
    public function demande(Request $request, DemandePrestationRepository $demandePrestationRepository): Response
    {
        $demandePrestation = new DemandePrestation();
        $form = $this->createForm(DemandePrestationType::class, $demandePrestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandePrestationRepository->save($demandePrestation, true);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            return $this->redirectToRoute('app_demande', [
                'showBandeau' => true
            ], Response::HTTP_SEE_OTHER);
        }
        return $this->render('prestations/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form,
            'showBandeau' => false
        ]);
    }

    // #[Route('/prestation/demande/validation', name: 'app_admin')]
    // public function prestation_validation(): Response
    // {
    //     return $this->render('admin/index-admin.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }


    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/index-admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}