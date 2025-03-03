<?php

namespace App\Form;

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\AddressType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
<<<<<<< HEAD
    public function buildForm(FormBuilderInterface $builder, array $options)         
=======
    public function buildForm(FormBuilderInterface $builder, array $options): void
>>>>>>> 1bbc3d687a4a0c82e2075d6d5a1a6a38a43417e9
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password', PasswordType::class, [
                'mapped' => false, 
                'required' => false, 
                'attr' => ['autocomplete' => 'new-password'],
            ])
            ->add('address', AddressType::class)
            ->add('city', TextType::class, ['label' => 'Ville'])
            ->add('postalCode', TextType::class, ['label' => 'Code Postal']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}


