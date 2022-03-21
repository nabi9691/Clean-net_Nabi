<?php

namespace App\Form;

use App\Entity\Clients;

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

class ClientsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                    
        
        ->add('nom_client', TextType::class, [
            'label' => 'Le nom du client :',
            'required' => false
        ])
        ->add('status', TextType::class, [
            'label' => 'Status :',
            'required' => false
        ])
->add('date', BirthdayType::class, [
            'label' => 'Date Naissance',
            'required' => false,
            'widget' => 'single_text'
        ])
        ->add('service', TextType::class, [
            'label' => 'Service demandé :',
            'required' => false
        ])
                ->add('facture', TextType::class, [
            'label' => 'Votre facture  :',
            'required' => false
        ])    
                        
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Clients::class,
    ]);
}
}
  
