<?php 

class DetallComanda  {
    public $numComanda;
    public $codPro;
    public $can;

    function __construct($numComanda, $codPro, $can)   {
        $this->numComanda = $numComanda;
        $this->codPro = $codPro;
        $this->can = $can;
    }

    // getters
    function getNumComanda()    {
        return $this->numComanda;
    }

    function getcodPro() {
        return $this->codPro;
    }

    function getcan()  {
        return $this-$can;
    }

    // setters
    function setNumComanda($numComanda) {
        $this->numComanda = $numComanda;
    }

    function setcodPro($codPro) {
        $this->codPro = $codPro;
    }

    function setcan($can)  {
        $this->can = $can;
    }
}

?>