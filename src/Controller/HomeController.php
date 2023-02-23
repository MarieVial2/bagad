<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/informations-bagad', name: 'app_infos')]
    public function informations(): Response
    {
        return $this->render('home/infos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/bagad/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('bagad/presentation.html.twig', [
            'controller_name' => 'HomeController',
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
    public function cours(): Response
    {
        return $this->render('bagad/cours.html.twig', [
            'controller_name' => 'HomeController',
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
    public function agenda(): Response
    {
        return $this->render('prestations/agenda.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/prestations/demande', name: 'app_demande')]
    public function demande(): Response
    {
        return $this->render('prestations/demande.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/index-admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}