<?php
// src/TenantBundle/Form/SettingsType.php
namespace Annex\TenantBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
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

        // Get the settings
        /** @var $repo \Annex\TenantBundle\Repository\SettingRepository */
        $repo =  $this->em->getRepository('Annex\TenantBundle\Entity\Setting');
        $dbData = $repo->getAllSettings();

        $builder->add('org_timezone', TimezoneType::class, array(
            'label' => 'Timezone',
            'required' => true,
            'data' => $dbData['org_timezone'],
            'attr' => array(
                'data-help' => '',
            )
        ));

        $builder->add('org_name', TextType::class, array(
            'label' => 'Organisation name',
            'data' => $dbData['org_name'],
            'required' => true,
            'attr' => array(
                'placeholder' => '',
            )
        ));

        $builder->add('org_country', CountryType::class, array(
            'label' => 'Organisation country',
            'data' => $dbData['org_country'],
            'required' => true,
            'attr' => array(
                'placeholder' => '',
            )
        ));

        $builder->add('org_email', TextType::class, array(
            'label' => 'Organisation email address',
            'data' => $dbData['org_email'],
            'required' => true,
            'attr' => array(
                'placeholder' => '',
                'data-help' => 'This can be different from the email address you use to log into Annex Apps.'
            )
        ));

        $builder->add('org_cellphone', TextType::class, array(
            'label' => 'Your mobile/cellphone number',
            'data' => $dbData['org_cellphone'],
            'required' => true,
            'attr' => array(
                'placeholder' => '',
                'data-help' => 'So that you can receive SMS messages via the Inventory Notifier app. Enter an international format number including country code; eg +44776522143 for UK or +14156652243 for USA'
            )
        ));

    }

    /**
     * Required function for form types
     * @return string
     */
    public function getName()
    {
        return "settings";
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