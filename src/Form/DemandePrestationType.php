<?php

namespace App\Form;

use App\Entity\DemandePrestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DemandePrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrestation',  TextType::class, [
                'label' => 'Nom de la prestation',
            ])
            ->add('datePrestation',  DateType::class, [
                'label' => 'Date de la prestation',
            ])
            ->add('heureDebutPrestation',  TextType::class, [
                'label' => 'Heure de début de la prestation',
            ])

            ->add('heureFinPrestation',  TextType::class, [
                'label' => 'Heure de fin de la prestation',
                'required'   => false,
            ])
            ->add('lieuPrestation',  TextType::class, [
                'label' => 'Lieu de la prestation',
            ])
            ->add('typePrestation',  TextType::class, [
                'label' => 'Type de prestation (défilé, scène, déambulation / plusieurs valeurs possibles)',
            ])

            ->add('nbMinimumSonneursPrestation',  IntegerType::class, [
                'label' => 'Le nombre de sonneurs désiré',
                'required'   => false,
            ])
            ->add('informationsPrestation',  TextareaType::class, [
                'label' => 'Informations supplémentaires sur la prestation',
                'required'   => false,
            ])
            ->add('emailDemandeurPrestation',  EmailType::class, [
                'label' => 'Votre e-mail',
            ])
            ->add('telephoneDemandeurPrestation',  TextType::class, [
                'label' => 'Votre numéro de téléphone',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandePrestation::class,
        ]);
    }
}