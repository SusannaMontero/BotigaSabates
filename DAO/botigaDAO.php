<?php

/*En aquest arxiu manipularé per un costat el catàleg de productes i per un altre costat la cistella*/

//catàleg
//com que per accedir al catàleg em fa falta iniciar sessió primer treballo amb la sessió de l'usuari

session_start ();

//crido al mètode de llistar productes que el tinc a l'arxiu MetodesDAO.php amb un include

include './MetodesDAO.php';

//creo dues opcions, opcio1 per treballar amb la llista de productes i opcio2 per treballar amb la cistella
//REQIEST per recollir valors [la opció triada]
//unset, ens neteja la llista que stà a la variable de tipus sessió

$opcio = $_REQUEST ['opcio'];

switch ($opcio) {
    case 1:
        //netejo
        unset ($_SESSION ['llista']);

        //a l'instanciar la classe MetodesDAO i crear objMetode, aquest podrà fer servir tots els mètodes de la classe MetodesDAO
        //instancio
        $objMetode = new MetodesDAO ();

        //cridant a llistarProductes portem tota la llista i la guardem a llista
        //crido mètode
        $llista=$objMetode->llistarProductes();

        //necessito que la llista es mantingui operativa mentre duri la sessió de l'usuari, per això la variable llista omple la varialbe SESSION i es mantingui activa i amb dades
        //guardo llista a sessió
        $_SESSION ['llista'] = $llista;

        //em ridercciono amb un location cap a la carpeta Vista on tinc el catàleg, això sempre que sigui la opcio1 del switch
        //redirecciono a catàleg
        header ("Location: ../VISTAS/Cataleg.php");
        break;

    case 2:
        break;



}


?>