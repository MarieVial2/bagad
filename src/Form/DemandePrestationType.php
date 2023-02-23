<?php

namespace App\Form;

use App\Entity\DemandePrestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandePrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrestation')
            ->add('datePrestation')
            ->add('heureDebutPrestation')
            ->add('heureFinPrestation')
            ->add('typePrestation')
            ->add('informationsPrestation')
            ->add('nbMinimumSonneursPrestation')
            ->add('emailDemandeurPrestation')
            ->add('telephoneDemandeurPrestation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandePrestation::class,
        ]);
    }
}
