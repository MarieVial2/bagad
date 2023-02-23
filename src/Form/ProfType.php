<?php

namespace App\Form;

use App\Entity\Prof;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomProf',  TextType::class, [
                'label' => 'Nom',])
            ->add('prenomProf',  TextType::class, [
                'label' => 'Prénom',])
            ->add('pupitreProf',  TextType::class, [
                'label' => 'Instrument enseigné',])
            ->add('experienceProf',  TextareaType::class, [
                'label' => 'Expériences/description',])
            ->add('photoProf', FileType::class, [
                'label' => 'Photo',
                // En le laissant optionnel, nous n'avons pas à ré-ajouter notre image à chaque fois que
                
                // nous éditons notre Article
                'required' => false,
                'data_class' => null,
                'constraints' => [
                new File([
                'maxSize' => '1024k',
                'mimeTypes' => [
                'image/png',
                'image/jpeg',
                ],
                'mimeTypesMessage' => 'Format invalide',
                ])
                ],
                ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prof::class,
        ]);
    }
}