<?php
// src/Form/UserType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('pseudo', TextType::class, [
            'label' => 'Pseudo',
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Mot de passe',
            'mapped' => false, // Ne pas mapper directement au champ password
            'required' => false, // Optionnel pour la modification
        ])
        ->add('address', TextType::class, [
            'label' => 'Adresse de livraison',
            'required' => false,
        ])
        ->add('city', TextType::class, [
            'label' => 'Ville',
            'required' => false,
        ])
        ->add('postalCode', TextType::class, [
            'label' => 'Code postal',
            'required' => false,
        ])
        ->add('phoneNumber', TextType::class, [
            'label' => 'Numéro de téléphone',
            'required' => false,
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
?>

