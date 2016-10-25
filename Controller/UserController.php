<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

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

}
