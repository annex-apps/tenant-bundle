<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Setting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Annex\TenantBundle\Form\SettingsType;
use Symfony\Component\HttpFoundation\Session\Session;

class SettingsController extends Controller
{

    /**
     * @Route("account/settings", name="account_settings")
     */
    public function settingsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $options = ['em' => $em];
        $form = $this->createForm(SettingsType::class, null, $options);

        $form->handleRequest($request);

        /** @var $repo \Annex\TenantBundle\Repository\SettingRepository */
        $repo =  $em->getRepository('Annex\TenantBundle\Entity\Setting');

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        if ($form->isSubmitted()) {

            foreach ($request->get('settings') AS $setup_key => $setup_data) {

                if ($repo->isValidSettingsKey($setup_key)) {
                    if (!$setting = $repo->findOneBy(['setupKey' => $setup_key])) {
                        $setting = new Setting();
                        $setting->setSetupKey($setup_key);
                    }
                    $setting->setSetupValue($setup_data);
                    $em->persist($setting);
                }

            }

            try {
                $em->flush();
                $this->addFlash('success','Settings updated.');
            } catch (\PDOException $e) {
                $this->addFlash('error','Error updating settings.');
            }

            return $this->redirectToRoute('account_settings');
        }

        return $this->render('AnnexTenantBundle::settings.html.twig', array(
            'form' => $form->createView(),
            'tenant' => $tenant
        ));

    }

}