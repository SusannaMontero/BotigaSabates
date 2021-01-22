<?php

/*creo una classe on hi hauràn tots els mètodes que faran falta, com que per qualsevol gestió que vulgui fer
huaré de fer servir la connexió i la tinc a una altra carpeta el primer que faré serà crear un include on especifico
que surto de carpeta DAO i vaig a carpeta CON_BBDD*/

include '../CON_BBDD/ConexioDB.php';
include '../CLASSESREGISTRE/Client.php';

class MetodesDAO    {

// Funció per llistar els productes del catàleg que tinc a la BBDD fent un SELECT. Aquesta funció la crido a la pàgina BotigaDAO
    public function llistarProductes ()  {
   
    // instancio la classe ConexioDB i creo un objecte con de tipus ConexioDB

        $con=new ConexioDB();

    //crido al mètode amb la fletxa i guardo la connexió a la variable conOk

        $conOK=$con->getConnexio();

    // faig la consulta a la BBDD amb una sentència SELECT per llistar els productes que guardo a la variable res i que després mitjançant un foreach aniré desant a l'array llista
            // comando prepare permet preparar la sentència SQL abans de ser executada

        $res=$conOK->prepare ("select * from productes");
            // executem el select i el resultat el deso a res
        $res->execute();

        // tanco la connexió
        $conOK = null;

            // guardo a l'array descomponent per files(row)
        foreach ($res as $row) {
            $llista[] = $row;
        }

        return $llista;

    }

// Funció per llistar els productes per codi que tinc a la BBDD, rep com paràmetre el codi del producte ja que en aquest cas vull seleccionar que llisto segons el codi.
    // aquesta funció la crido a la pàgina de detall
    public function llistarProductesCod ($cod)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
    
    // faig la consulta a la BBDD amb una sentència SELECT però aquí afegeixo el where per seleccionar segons el codi de producte

        $res=$conOK->prepare ("select * from productes where codPro = $cod");
        $res->execute();

        // tanco la connexió
        $conOK = null;

    
        foreach ($res as $row) {
            $llista[] = $row;
        }
    
        return $llista;
    
    }

// Funcio que em permet validar a l'usuari, la creo abans de crear l'arxiu de validació
    public function validarUsuari ($nom,$pas)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
    
    // faig la consulta a la BBDD amb una sentència SELECT 

        $res=$conOK->prepare ("SELECT * FROM clients WHERE nom='$nom' AND pas='$pas'");
        $res->execute();

        // tanco la connexió
        $conOK = null;
    
        foreach ($res as $row) {
            $llista = $row;
        }
    
        return $llista;
    
        }   

// Funció que em permet     rep de paràmetre un objecte $cli de la casse Client, per tant ja està rebent amb $cli tots els atributs de client
        // segurament aquí podré fer el create table per crear la taula que demana el Fonsi
    public function registrarClient (Client $cli)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
        $res=$conOK->prepare ("INSERT INTO clients values (0,'$cli->nom', '$cli->mail', '$cli->pas')");
        $confirmar = $res->execute();
        // tanco la connexió
        $conOK = null;
        return $confirmar;
        
        }              
}
