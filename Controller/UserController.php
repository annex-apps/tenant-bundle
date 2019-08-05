<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

    /**
     * @Route("/account/users", name="account_users")
     */
    public function userListAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var \AppBundle\Repository\ContactRepository $contactRepo */
        $contactRepo = $em->getRepository('AppBundle:Contact');

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        return $this->render('AnnexTenantBundle::users.html.twig', [
            'users' => $contactRepo->findAll(),
            'tenant' => $tenant
        ]);
    }

}
