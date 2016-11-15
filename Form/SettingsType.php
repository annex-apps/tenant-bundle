<?php
// src/TenantBundle/Form/SettingsType.php
namespace Annex\TenantBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public $em;

    function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $this->em = $options['em'];

        $yesNoChoice = [
            'Yes' => 1,
            'No' => 0
        ];

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $builder->getData();

        $builder->add('timezone', TimezoneType::class, array(
            'label' => 'Timezone',
            'required' => true,
            'data' => $tenant->getTimeZone(),
            'attr' => array(
                'data-help' => '',
            )
        ));

        $builder->add('name', TextType::class, array(
            'label' => 'Company name',
            'data' => $tenant->getName(),
            'required' => true,
            'attr' => array(
                'placeholder' => '',
            )
        ));

        $builder->add('country', CountryType::class, array(
            'label' => 'Company country',
            'data' => $tenant->getCountry(),
            'required' => true,
            'attr' => array(
                'placeholder' => '',
            )
        ));

        $builder->add('ownerEmail', TextType::class, array(
            'label' => 'Primary contact email address',
            'data' => $tenant->getOwnerEmail(),
            'required' => true,
            'attr' => array(
                'placeholder' => '',
                'data-help' => ''
            )
        ));

        $builder->add('telephone', TextType::class, array(
            'label' => 'Telephone number',
            'data' => $tenant->getTelephone(),
            'required' => false,
            'attr' => array(
                'placeholder' => '',
                'data-help' => ''
            )
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'em' => null
        ));
    }
}