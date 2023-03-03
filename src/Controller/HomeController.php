<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Services\MailerService;
use App\Entity\DemandePrestation;
use Symfony\Component\Mime\Email;
use App\Repository\ProfRepository;
use App\Form\DemandePrestationType;
use App\Repository\CoursRepository;
use App\Repository\ContactRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\DemandePrestationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
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
    public function contact(Request $request, ContactRepository $contactRepository, MailerService $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);


            $contactFormData = $form->getData();
            // dd($contactFormData);
            $subject = 'Demande de contact sur le site du Bagad Orvez de la part de ' . $contactFormData->getEmailContact();
            $content =
                $contactFormData->getNomContact() . ' ' . $contactFormData->getPrenomContact() .
                ' vous a envoyé le message suivant : "'
                . $contactFormData->getMessageContact() .
                '". Pour contacter cette personne : '
                . $contactFormData->getEmailContact() .
                ' , ' .
                $contactFormData->getTelephoneContact();
            $mailer->sendEmail(subject: $subject, content: $content);
            $this->addFlash('success', 'Votre message a été envoyé');


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
            'cours' => $coursRepository->orderByCours(),
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
            'evenements' => $evenementRepository->orderByDateLimit(),
        ]);
    }

    #[Route('/prestations/demande', name: 'app_demande')]
    public function demande(Request $request, DemandePrestationRepository $demandePrestationRepository, MailerService $mailer): Response
    {
        $demandePrestation = new DemandePrestation();
        $form = $this->createForm(DemandePrestationType::class, $demandePrestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandePrestationRepository->save($demandePrestation, true);


            $contactFormData = $form->getData();

            $date = $contactFormData->getDatePrestation()->format('d-m-Y');


            $subject = 'Demande de prestation sur le site du Bagad Orvez : ' . $contactFormData->getNomPrestation();
            $content =
                'Une demande de prestation est arrivée via le site du bagad. Nom de la prestation : ' .
                $contactFormData->getNomPrestation() .
                '. Demande de prestation pour la date suivante : '
                . $date .
                ' à '
                . $contactFormData->getLieuPrestation() .
                ', pour une prestation de type : '
                . $contactFormData->getTypePrestation() .
                '. <br>Heure de début : '
                . $contactFormData->getHeureDebutPrestation() .
                ', heure de fin : '
                . $contactFormData->getHeureFinPrestation() .
                '. Nb de sonneurs désiré : ' .
                $contactFormData->getNbMinimumSonneursPrestation() .
                '. Informations complémentaires : ' .
                $contactFormData->getInformationsPrestation() .
                '. Téléphone du demandeur : '
                . $contactFormData->getTelephoneDemandeurPrestation() .
                ' ou par mail : '
                . $contactFormData->getEmailDemandeurPrestation() .
                '. Plus d\'infos dans l\'espace administration du site.';

            $mailer->sendEmail(subject: $subject, content: $content);
            $this->addFlash('success', 'Votre demande a été envoyée !');

            return $this->redirectToRoute('app_demande', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('prestations/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form,

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