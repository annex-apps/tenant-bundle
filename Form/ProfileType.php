<?php

// src/TenantBundle/Form/ProfileType.php

/**
 * Override the default FOSUserBundle Profile form
 *
 */
namespace Annex\TenantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', TextType::class, array(
            'required' => true
        ));

        $builder->add('lastName', TextType::class, array(
            'required' => false
        ));

        $builder->add('email', TextType::class, array(
            'label' => 'Email address',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

        // Hide the user name (filled with email address by JS)
        $builder->add('username', HiddenType::class, array(
            'label' => 'Username',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}