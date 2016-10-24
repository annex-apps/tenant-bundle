<?php

namespace Annex\TenantBundle\Controller;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AnnexTenantBundle::themes/template.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/admin", name="admin_home")
     */
    public function dashboardAction(Request $request)
    {
        return $this->render('AnnexTenantBundle::dash.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..')
        ]);
    }

    /**
     * @Route("/admin/users", name="user_list")
     */
    public function userListAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var \Annex\TenantBundle\Repository\ContactRepository $contactRepo */
        $contactRepo = $em->getRepository('AnnexTenantBundle:Contact');

        return $this->render('AnnexTenantBundle::users.html.twig', [
            'users' => $contactRepo->findAll()
        ]);
    }

    /**
     * @Route("/admin/not_installed", name="not_installed")
     */
    public function notInstalledAction(Request $request)
    {
        return $this->render('AnnexTenantBundle::not_installed.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..')
        ]);
    }

    /**
     * @Route("logout", name="logout", defaults={"_locale"="en"}, requirements = {"_locale" = "fr|en|nl"})
     */
    public function logoutAction()
    {
        return $this->redirect($this->generateUrl('homepage'));
    }

}
