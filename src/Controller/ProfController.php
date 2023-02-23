<?php

namespace App\Controller;

use App\Entity\Prof;
use App\Form\ProfType;
use App\Repository\ProfRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/prof')]
class ProfController extends AbstractController
{
    #[Route('/', name: 'app_prof_index', methods: ['GET'])]
    public function index(ProfRepository $profRepository): Response
    {
        return $this->render('prof/index.html.twig', [
            'profs' => $profRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_prof_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProfRepository $profRepository, SluggerInterface
    $slugger): Response
    {
        $prof = new Prof();
        $form = $this->createForm(ProfType::class, $prof);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('photoProf')->getData();

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
            }
            $prof->setPhotoProf($newFilename);
            $profRepository->save($prof, true);

            return $this->redirectToRoute('app_prof_index', [], Response::HTTP_SEE_OTHER);
        }

        

        return $this->renderForm('prof/new.html.twig', [
            'prof' => $prof,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prof_show', methods: ['GET'])]
    public function show(Prof $prof): Response
    {
        return $this->render('prof/show.html.twig', [
            'prof' => $prof,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_prof_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prof $prof, ProfRepository $profRepository, SluggerInterface
    $slugger): Response
    {
        
    $prof->setPhotoProf(new File($this->getParameter('images_directory') . '/' . $prof->getPhotoProf())
    );
        $form = $this->createForm(ProfType::class, $prof);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('photoProf')->getData();
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
$prof->setPhotoProf($newFilename
);
}
            $profRepository->save($prof, true);

            return $this->redirectToRoute('app_prof_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prof/edit.html.twig', [
            'prof' => $prof,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prof_delete', methods: ['POST'])]
    public function delete(Request $request, Prof $prof, ProfRepository $profRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prof->getId(), $request->request->get('_token'))) {
            $profRepository->remove($prof, true);
        }

        return $this->redirectToRoute('app_prof_index', [], Response::HTTP_SEE_OTHER);
    }
}