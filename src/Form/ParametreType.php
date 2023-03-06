<?php

namespace App\Form;

use App\Entity\Parametre;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ParametreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneeScolaireEnCoursParametre',  TextType::class, [
                'label' => 'Année scolaire en cours',
            ])
            ->add('momentRepetitionParametre',  TextType::class, [
                'label' => 'Jour et heures de la répétition',
            ])
            ->add('lieuRepetitionParametre',  TextType::class, [
                'label' => 'Lieu de la répétition',
            ])
            ->add('categorieBagadParametre',  TextType::class, [
                'label' => 'Catégorie du Bagad',
            ])
            ->add('prixCoursParametre',  TextType::class, [
                'label' => 'Le prix des cours',
            ])
            ->add('prixAdhesionParametre',  CKEditorType::class, [
                'label' => 'Les prix de l\'adhésion',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parametre::class,
        ]);
    }
}