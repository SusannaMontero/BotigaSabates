<?php 

class Comanda  {
    public $numComanda;
    public $codCli;
    public $data;

    function __construct($numComanda, $codCli, $data)   {
        $this->numComanda = $numComanda;
        $this->codCli = $codCli;
        $this->data = $data;
    }

    // getters
    function getNumComanda()    {
        return $this->numComanda;
    }

    function getCodCli() {
        return $this->codCli;
    }

    function getData()  {
        return $this->data;
    }

    // setters
    function setNumComanda($numComanda) {
        $this->numComanda = $numComanda;
    }

    function setCodCli($codCli) {
        $this->codCli = $codCli;
    }

    function setData($data)  {
        $this->data = $data;
    }
}

?>