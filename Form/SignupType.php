<?php

namespace Annex\TenantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SignupType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
            'required' => true,
            'label' => 'Your name'
        ));

        $builder->add('company', TextType::class, array(
            'required' => true,
            'label' => 'Company name'
        ));

        $builder->add('email', TextType::class, array(
            'label' => 'Email address',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

        $builder->add('brightpearlAccount', TextType::class, array(
            'label' => 'Brightpearl account code',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

        $choices = [
            'Europe'  => 'ws-eu1',
            'US East' => 'ws-use',
        ];
        $builder->add('brightpearlDataCentre', ChoiceType::class, array(
            'choices' => $choices,
            'label' => 'Brightpearl data centre',
            'required' => true,
            'attr' => array(
                'data-help' => ""
            )
        ));

    }

    public function getBlockPrefix()
    {
        return 'signup';
    }
}