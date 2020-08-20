<?php


namespace App\Services;


use App\Entity\Contact;
use App\Entity\Produit;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class Mail
{
    private $mailer;
    private $renderer;

    public function __construct(MailerInterface $mail, Environment $rend)
    {
        $this->mailer=$mail;
        $this->renderer=$rend;
    }

    public function sendMailInfo(Produit $p,Contact $c)
    {
        $message=(new Email())
            ->from($c->getEmail())
            ->to($c->getTo())
            ->subject($c->getSujet())
            ->html($this->renderer->render('mail/MailContactProduit.html.twig',['produit'=>$p,'contact'=>$c]));

        $this->mailer->send($message);
    }

}