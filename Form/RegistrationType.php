<?php

// src/TenantBundle/Form/RegistrationType.php

/**
 * Override the default FOSUserBundle Registration form
 *
 */
namespace Annex\TenantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', TextType::class, array(
            'required' => true,
            'label' => 'First name:'
        ));

        $builder->add('lastName', TextType::class, array(
            'required' => false,
            'label' => 'Last name:'
        ));

        $builder->add('email', TextType::class, array(
            'label' => 'Email address:',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

        $builder->add('telephone', TextType::class, array(
            'label' => 'Telephone number:',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

        // Hide the user name (filled with email address by JS)
        $builder->add('username', HiddenType::class, array(
            'label' => 'Username:',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}