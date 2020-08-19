<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Services\MailTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/mail", name="mail")
     */
    public function mail(MailTest $email)
    {
        $produitRepo = $this->getDoctrine()->getRepository(Produit::class);
        $produit=$produitRepo->find(50);
        $email->Send($produit);

        return $this->redirectToRoute("default");
    }
}
