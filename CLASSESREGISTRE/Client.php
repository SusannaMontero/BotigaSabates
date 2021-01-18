<?php


class Client    {

    // atributs classe Client
    public $codCli;
    public $nom;
    public $mail;
    public $pas;


// constructor de la classe Client i els seus mètodes get i set

    function __construct ($codCli, $nom, $mail, $pas)   {
        $this->codCli = $codCli;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->pas = $pas;
    }
    
    // get
    function getCodCli()    {
        return $this->codCli;
    }

    function getNom()    {
        return $this->nom;
    }

    function getMail()  {
        return $this->mail;
    }

    function getPas()   {
        return $this->pas;
    }

    // set
    function setCodCli()    {
        $this->codCli = $codCli;
    }

    function setNom()   {
        $this->nom = $nom;
    }

    function setMail()  {
        $this->mail = $mail;
    }

    function setPas()   {
        $this->pas = $pas;
    }

}
?>