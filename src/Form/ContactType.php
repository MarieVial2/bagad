<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomContact',  TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('prenomContact',  TextType::class, [
                'label' => 'Votre prénom',
            ])

            ->add('emailContact',  EmailType::class, [
                'label' => 'Votre e-mail',
                'required'   => false,
            ])
            ->add('telephoneContact',  TextType::class, [
                'label' => 'Votre téléphone',
            ])
            ->add('sujetContact',  TextType::class, [
                'label' => 'Sujet',
            ])
            ->add('messageContact',  TextareaType::class, [
                'label' => 'Votre message',
            ])
            // ->add('captcha', CaptchaType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}