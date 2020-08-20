<?php


namespace App\Entity;

class Contact
{
    private $nom;

    private $email;

    private $message;

    private $sujet;

    private $to;

    public function __construct()
    {
        $this->setTo("groupeContact@masocieter.com");
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     * @return Contact
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

/**
 * @return mixed
 */
public function getSujet()
{
    return $this->sujet;
}/**
 * @param mixed $sujet
 * @return Contact
 */
public function setSujet($sujet)
{
    $this->sujet = $sujet;
    return $this;
}

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


}