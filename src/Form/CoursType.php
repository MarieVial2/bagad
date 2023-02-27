<?php

namespace App\Form;

use App\Entity\Prof;
use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('instrumentCours',  TextType::class, [
                'label' => 'Instrument enseigné',
            ])
            ->add('publicCours',  TextType::class, [
                'label' => 'Type de public (adulte/enfant)',
                'required'   => false,
            ])
            ->add('jourCours',  TextType::class, [
                'label' => 'Jour du cours',
            ])
            ->add('heureDebutCours',  TextType::class, [
                'label' => 'Heure de début',
            ])
            ->add('heureFinCours',  TextType::class, [
                'label' => 'Heure de fin',
            ])
            ->add('lieuCours',  TextType::class, [
                'label' => 'Lieu du cours',
            ])

            ->add('villeCours',  TextType::class, [
                'label' => 'Ville où a lieu le cours',
            ])
            ->add(
                'idProf',
                EntityType::class,
                [
                    'class' => Prof::class,
                    'choice_label' => 'prenomProf',
                    'label' => 'Professeur',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}