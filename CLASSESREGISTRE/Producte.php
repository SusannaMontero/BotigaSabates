<?php

// plantilla que principalment em servirà pels mètodes inserta i eliminar

class Producte{
    public $cod;
    public $desc;
    public $preu;
    public $stock;
    public $estat;
    public $detall;
    public $imatge;
    public $categ;


    function __construct($cod, $desc, $preu, $stock, $estat, $detall, $imatge, $categ)   {
        $this->cod = $cod;
        $this->desc = $desc;
        $this->preu = $preu;
        $this->stock = $stock;
        $this->estat = $estat;
        $this->detall = $detall;
        $this->imatge = $imatge;
        $this->categ = $categ;
    }

// get
function getCod()    {
    return $this->cod;
}

function getDes()    {
    return $this->des;
}

function getPreu()  {
    return $this->preu;
}

function getStock()   {
    return $this->stock;
}

function getEstat()   {
    return $this->estat;
}

function getDetall()   {
    return $this->detall;
}

function getImatge()   {
    return $this->imatge;
}

function getCateg()   {
    return $this->categ;
}

// set
function setCod()    {
    $this->cod = $cod;
}

function setDes()   {
    $this->des = $des;
}

function setPreu()  {
    $this->preu = $preu;
}

function setStock()   {
    $this->stock = $stock;
}

function setEstat()    {
    $this->estat = $estat;
}

function setDetall()    {
    $this->detall = $edetall;
}

function setImatge()    {
    $this->imatge = $imatge;
}

function setCateg()    {
    $this->categ = $categ;
}


}

?>
