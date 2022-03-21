<?php

namespace App\Form;

use App\Entity\Utilisateurs;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
//use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;



class UtilisateursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                    
        
        ->add('nom', TextType::class, [
            'label' => 'Votre nom',
            'required' => false
        ])
        
        ->add('prenom', TextType::class, [
            'label' => 'Votre prénom',
            'required' => false
        ])
        
        ->add('date', BirthdayType::class, [
            'label' => 'Date Naissance',
            'required' => false,
            'widget' => 'single_text'
        ])
        ->add('telephone', TextType::class, [
            'label' => 'Le numéro de téléphone :',
            'required' => false
        ])
        ->add('fax', TextType::class, [
            'label' => 'Fax :',
            'required' => false
        ])

              ->add('email', EmailType::class, [
                'label' => 'Votre email'
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse :',
                'required' => false
            ])
            ->add('code_postal', TextType::class, [
                'label' => 'Code_Postal :',
                'required' => false
            ])
            ->add('villes', TextType::class, [
                'label' => 'Ville :',
                'required' => false
            ])
            ->add('departement', TextType::class, [
                'label' => 'Département :',
                'required' => false
            ])
            ->add('pays', TextType::class, [
                'label' => 'Pays :',
                'required' => false
            ])
            ->add('status', TextType::class, [
                'label' => 'Status :',
                'required' => false
            ])
            
            ->add('civilite', ChoiceType::class, [
                'label' => 'Votre civilité',
                'required' => false,
                'choices' => ["Mme" => "Mme", "Mlle" => "Mlle", "M." => "M."],
                'multiple' => false,
            ])
            ->add('role', ChoiceType::class, [
                'label' => 'Votre Role :',
                'required' => false,
                'choices' => ["Admin" => "Admin", "Anonyme" => "Anonyme", "utilisateur" => "utilisateur", 'Client' => 'Client', 'Salarié' => 'Salarié'],
                'multiple' => false,
            ])
            ->add('imageName', TextType::class, [
                'label' => 'Image :',
                'required' => false
            ])

            
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Utilisateurs::class,
    ]);
}
}
  
