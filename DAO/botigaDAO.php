<?php

/* En aquest arxiu manipularé per un costat el catàleg de productes i per un altre costat la cistella*/

// catàleg
// com que per accedir al catàleg em fa falta iniciar sessió primer treballo amb la sessió de l'usuari

session_start ();

// crido al mètode de llistar productes que el tinc a l'arxiu MetodesDAO.php amb un include

include './MetodesDAO.php';

// creo dues opcions, opcio1 per treballar amb la llista de productes i opcio2 per treballar amb la cistella, utilitzo variable de sessió
// rep de detall.php 3 coses, a saber: 'opcio', 'id'i 'action'
// REQUEST per recollir valors [la opció triada]
// unset, ens neteja la llista que stà a la variable de tipus sessió

$opcio = $_REQUEST['opcio']; 

switch ($opcio) {
    case 1:
        //netejo
        unset ($_SESSION['llista']);

        //a l'instanciar la classe MetodesDAO i crear objMetode, aquest podrà fer servir tots els mètodes de la classe MetodesDAO
        //instancio
        $objMetode = new MetodesDAO ();

        //cridant a llistarProductes portem tota la llista i la guardem a llista
        //crido mètode
        $llista=$objMetode->llistarProductes();

        //necessito que la llista es mantingui operativa mentre duri la sessió de l'usuari, per això la variable llista omple la varialbe SESSION i es mantingui activa i amb dades
        //guardo llista a sessió
        $_SESSION['llista'] = $llista;

        //em ridercciono amb un location cap a la carpeta Vista on tinc el catàleg, això sempre que sigui la opcio1 del switch
        //redirecciono a catàleg
        header ("Location: ../VISTESCLIENT/Cataleg.php");
        break;

// Llògica de la cistella de la compra, 

        //utilitzo l'id de producte per poder rebre el producte i fer servir la cistella, la cistella és una variable de sessió
    case 2:

        /* isset tornarà FALSE si troba una variable que ha sigut definida com a NULL, així el primer if serà per confirmar que el valor que rep no és buit (NULL),
             si en canvi rep valor el guardarà a la viariable id, else per si rep el valor buit aleshores valido amb 1 
             Amb $_REQUEST per defecte de PHP es rep un valor */
            
        if (isset ($_REQUEST['id']))   {
            $id = $_REQUEST['id'];
        } 
        else {
            $id = 1;
        }

        /* condicional que em permet validar si la cistella és plena o és buida, aquí valido amb action, en lloc d'id, si rebo un action és que la cistella és plena si no
            és que la cistella és buida */

        if (isset($_REQUEST['action']))   {
            $action = $_REQUEST['action'];
        } 
        else {
            $action = 'cistellaBuida';
        }  
        
        /* switch sobre action, per determinar que pasarà segons l'action que tinguem: agregar, eliminar o cistella buida */

        switch ($action)    {
            case 'agregar':
                $quantitat=$_REQUEST['txtQuantitat'];
                /* if la cistella no ariba buida serà la variable de sessió cistella amb un id concret + igual a la quantitat que rep (se li afegirà o sumarà), +=(acumulador)
                    creo una variable de sessió cistella per cada producte que afegeixo a la cistella, així després per eliminar un producte em serà més fàcil*/
                if (isset($_SESSION['cistella'][$id]))
                    $_SESSION['cistella'][$id]+=$quantitat;

                else
                    $_SESSION['cistella'][$id]=$quantitat;

                break;

            case 'eliminar': 
                /* si la variable de sessió cistella arriba plena li resto 1 amb --, si anem treient productes i queda = 0 aleshores elimino la variable 
                    de sessió que s'ha creat per aquell producte */
                if (isset ($_SESSION['cistella'][$id]))   {
                    $_SESSION['cistella'][$id] -- ;
                    //però
                    if ($_SESSION['cistella'][$id] == 0)
                        unset ($_SESSION['cistella'][$id]);
                }

                break;

            case 'cistellaBuida': 
                unset ($_SESSION['cistella']);

                break;
        }

        /* Un cop finalitzada l'acció sobre la cistella de la compra el que faig és redireccionar cap a VISTESCLIENT i cap a pàgina de la cistella on es llegeig la cistella que 
            acabo de crear (header, predefinit php) */

        header ("Location: ../VISTESCLIENT/cistella.php");
        

        break;



}


?>