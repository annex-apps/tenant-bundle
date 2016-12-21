<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TenantController extends Controller
{
    /**
     * @Route("/tenant/list", name="tenant_list")
     */
    public function tenantListAction()
    {
        if ($this->get('session')->get('tenantId')) {
            $this->addFlash('error', "Sorry, no can do.");
            return $this->redirectToRoute('homepage');
        }

        $em = $this->getDoctrine()->getManager();
        /** @var \Annex\TenantBundle\Repository\TenantRepository $repo */
        $repo = $em->getRepository('AnnexTenantBundle:Tenant');
        $tenants = $repo->findAll();

        return $this->render('AnnexTenantBundle::tenant_admin/tenant_list.html.twig', [
            'appName' => $this->get('session')->get('appName'),
            'tenants' => $tenants
        ]);
    }
}
