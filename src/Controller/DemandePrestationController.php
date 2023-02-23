<?php

namespace App\Controller;

use App\Entity\DemandePrestation;
use App\Form\DemandePrestationType;
use App\Repository\DemandePrestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demande/prestation')]
class DemandePrestationController extends AbstractController
{
    #[Route('/', name: 'app_demande_prestation_index', methods: ['GET'])]
    public function index(DemandePrestationRepository $demandePrestationRepository): Response
    {
        return $this->render('demande_prestation/index.html.twig', [
            'demande_prestations' => $demandePrestationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demande_prestation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandePrestationRepository $demandePrestationRepository): Response
    {
        $demandePrestation = new DemandePrestation();
        $form = $this->createForm(DemandePrestationType::class, $demandePrestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandePrestationRepository->save($demandePrestation, true);

            return $this->redirectToRoute('app_demande_prestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_prestation/new.html.twig', [
            'demande_prestation' => $demandePrestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demande_prestation_show', methods: ['GET'])]
    public function show(DemandePrestation $demandePrestation): Response
    {
        return $this->render('demande_prestation/show.html.twig', [
            'demande_prestation' => $demandePrestation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_demande_prestation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DemandePrestation $demandePrestation, DemandePrestationRepository $demandePrestationRepository): Response
    {
        $form = $this->createForm(DemandePrestationType::class, $demandePrestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandePrestationRepository->save($demandePrestation, true);

            return $this->redirectToRoute('app_demande_prestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_prestation/edit.html.twig', [
            'demande_prestation' => $demandePrestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demande_prestation_delete', methods: ['POST'])]
    public function delete(Request $request, DemandePrestation $demandePrestation, DemandePrestationRepository $demandePrestationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandePrestation->getId(), $request->request->get('_token'))) {
            $demandePrestationRepository->remove($demandePrestation, true);
        }

        return $this->redirectToRoute('app_demande_prestation_index', [], Response::HTTP_SEE_OTHER);
    }
}
