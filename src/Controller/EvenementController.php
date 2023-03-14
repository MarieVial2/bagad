<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/evenement')]
class EvenementController extends AbstractController
{

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'app_evenement_index', methods: ['GET'])]
    public function index(EvenementRepository $evenementRepository): Response
    {
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenementRepository->orderByDate(),
        ]);
    }


    #[IsGranted('ROLE_ADMIN')]
    #[Route('/nouveau', name: 'app_evenement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EvenementRepository $evenementRepository, SluggerInterface
    $slugger): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);
        // 1/2 On recupère les infos du user connecté
        $user = $this->getUser();


        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('photoEvenement')->getData();

            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $image->guessExtension();
                // Move the file to the directory where images are stored
                try {
                    $image->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    dd($e);
                }
                $evenement->setPhotoEvenement($newFilename);
            }
            // 2/2 On entre l'id de l'user connecté dans l'évènement (pour idUser)
            $evenement->setIdUser($user);
            $evenementRepository->save($evenement, true);

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,

        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_evenement_show', methods: ['GET'])]
    public function show(Evenement $evenement): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/editer', name: 'app_evenement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Evenement $evenement, EvenementRepository $evenementRepository, SluggerInterface
    $slugger): Response
    {
        // $evenement->setPhotoEvenement(
        //     new File($this->getParameter('images_directory') . '/' . $evenement->getPhotoEvenement())
        // );
        // $form = $this->createForm(EvenementType::class, $evenement);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $image = $form->get('photoProf')->getData();
        //     if ($image) {
        //         $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        //         // this is needed to safely include the file name as part of the URL
        //         $safeFilename = $slugger->slug($originalFilename);
        //         $newFilename = $safeFilename . '-' . uniqid() . '.' . $image->guessExtension();
        //         // Move the file to the directory where images are stored
        //         try {
        //             $image->move(
        //                 $this->getParameter('images_directory'),
        //                 $newFilename
        //             );
        //         } catch (FileException $e) {
        //             // ... handle exception if something happens during file upload
        //             dd($e);
        //         }
        //         $evenement->setPhotoEvenement(
        //             $newFilename
        //         );
        //     }
        // Création d'une variable pour stocker l'image et ne pas l'écraser à l'upload de l'evenement
        $oldPhotoEvenement = $evenement->getPhotoEvenement();

        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('photoEvenement')->getData();

            if ($image != null) {

                if ($image) {
                    $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);

                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $image->guessExtension();
                    // Move the file to the directory where images are stored

                    try {
                        $image->move(
                            $this->getParameter('images_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                        dd($e);
                    }
                    $evenement->setPhotoEvenement(
                        $newFilename
                    );
                }
            } else {
                $evenement->setPhotoEvenement(
                    $oldPhotoEvenement
                );
            }
            $evenementRepository->save($evenement, true);

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_evenement_delete', methods: ['POST'])]
    public function delete(Request $request, Evenement $evenement, EvenementRepository $evenementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $evenement->getId(), $request->request->get('_token'))) {
            $evenementRepository->remove($evenement, true);
        }

        return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}