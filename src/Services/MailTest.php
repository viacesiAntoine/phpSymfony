<?php
namespace App\Services;

use App\Entity\Produit;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailTest{
    private $mailer;
    private $renderer;

    public function __construct(MailerInterface $mail, Environment $rend)
    {
        $this->mailer=$mail;
        $this->renderer=$rend;
    }

    public function Send(Produit $p)
    {
        $message=(new Email())
            ->from('abellenoue@cesi.fr')
            ->to('abellenoue@cesi.fr')
            ->subject('!dlsbn')
            ->html($this->renderer->render('mail/TestMail.html.twig',['produit'=>$p]));

        $this->mailer->send($message);
    }

}