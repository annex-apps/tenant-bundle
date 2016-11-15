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

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        $form = $this->createForm(SettingsType::class, $tenant, $options);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($tenantService->updateTenant()) {
                $this->addFlash('success','Settings updated.');
            } else {
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