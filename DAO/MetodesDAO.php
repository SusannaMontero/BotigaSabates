<?php

/*creo una classe on hi hauràn tots els mètodes que faran falta, com que per qualsevol gestió que vulgui fer
huaré de fer servir la connexió i la tinc a una altra carpeta el primer que faré serà crear un include on especifico
que surto de carpeta DAO i vaig a carpeta CON_BBDD*/

include '../CON_BBDD/ConexioDB.php';

class MetodesDAO    {

    public function LlistarProductes ()  {
    //instancio la classe ConexioDB i creo un objecte con de tipus ConexioDB

        $con = new ConexioDB ();

    //crido al mètode amb la fletxa i guardo la connexió a la variable conOk

        $conOK = $con->getConexio ();

    //faig la consulta a la BBDD amb una sentència SELECT per llistar els productes que guardo a la variable res i que després mitjançant un foreach aniré desant a l'array llista
            //comando prepare permet preparar la sentència SQL abans de ser executada

        $res = $conOK->prepare ("select * from productes");
            //executem el select i el resultat el deso a res
        $res->execute();

            //guardo a l'array descomponent per files(row)
        foreach ($res as $row) {
            $llista[] = $row;
        }

        return $llista;

    }
}
