<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvenement',  TextType::class, [
                'label' => 'Nom de l\'évènement',
            ])
            ->add('dateEvenement',  DateType::class, [
                'label' => 'Date de l\'évènement',
            ])
            ->add('heureDebutEvenement',  TextType::class, [
                'label' => 'Heure de début',
            ])
            ->add('heureFinEvenement',  TextType::class, [
                'label' => 'Heure de fin',
                'required' => false,
            ])
            ->add('lieuEvenement',  TextType::class, [
                'label' => 'Lieu',
            ])
            ->add('photoEvenement', FileType::class, [
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
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Format invalide',
                    ])
                ],
            ])
            ->add('descriptionEvenement',  TextareaType::class, [
                'label' => 'Description de l\'évènement',
                'required' => false,
            ])
            ->add(
                'idUser',
                EntityType::class,
                [
                    'class' => User::class,
                    'choice_label' => 'nomUser prenomUser',
                    'label' => 'Créateur de l\'évènement',
                    'required' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}