<?php
error_reporting(E_ALL ^ E_NOTICE);
/*creo una classe on hi hauràn tots els mètodes que faran falta, com que per qualsevol gestió que vulgui fer
huaré de fer servir la connexió i la tinc a una altra carpeta el primer que faré serà crear un include on especifico
que surto de carpeta DAO i vaig a carpeta CON_BBDD*/

include '../CON_BBDD/ConexioDB.php';
include '../CLASSESREGISTRE/Client.php';
include '../CLASSESREGISTRE/Comanda.php';
include '../CLASSESREGISTRE/DetallComanda.php';




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


// Funció que em permet llistar per preus els productes
    public function ordenarPerPreu()    {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("SELECT * FROM productes ORDER BY preu DESC");;
        $res->execute();

        // tanco la connexió
        $conOK = null;

        foreach ($res as $row) {
            $llistaPreu[] = $row;
        }

        return $llistaPreu;

    }

// Funcio que em permet validar a l'usuari, la creo abans de crear l'arxiu de validació
    public function validarUsuari ($nom,$pas)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
    
    // faig la consulta a la BBDD amb una sentència SELECT 

        $res=$conOK->prepare ("SELECT * FROM clients WHERE nom='$nom' AND pas=SHA('$pas')");
        $res->execute();

        // tanco la connexió
        $conOK = null;
    
        foreach ($res as $row) {
            $llista = $row;
        }
    
        return $llista;
    
        }   

    // Funcio que em permet validar el registre d'usuari 
    public function validarRegistre (Client $cli)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
    
        // faig la consulta a la BBDD amb una sentència SELECT 
        $res=$conOK->prepare ("SELECT * FROM clients WHERE nom='$cli->nom' AND mail='$cli->mail' AND pas=SHA('$cli->pas')");
        $res->execute();

        // tanco la connexió
        $conOK = null;
    
        foreach ($res as $row) {
            $llista = $row;
        }

        if ($llista > 0)    {

        ?>
            <div align="center">
                <div class="modal-body" id="mostrar">

                    <h3  class="text-danger">Aquest nom d'Usuari<?php $cli->nom ?> ja existeix.</h3>
                </div>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Provar amb un altre Nom/Nick o </h6>
                    </li>
                    <li class="list-inline-item">
                        <h6 class="text-secondary"><a href="loginClient.php">Iniciar Sessió</a></h6>
                    </li>
                </ul>
            </div> 
        
        <?php
            if (isset($_REQUEST['error']))     {
                echo $_REQUEST['error'];
            }

        }
        else {
           
            return true;
        }
        
    
    }   


// Funció que em permet  fer el registre d'un nou usuari,  rep de paràmetre un objecte $cli de la casse Client, per tant ja està rebent amb $cli tots els atributs de client   
    public function registrarClient (Client $cli)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
        $res=$conOK->prepare ("INSERT INTO clients values (0,'$cli->nom', '$cli->mail', SHA('$cli->pas'))");
        
        $confirmar = $res->execute();

                    
        // tanco la connexió
        $conOK = null;
        return $confirmar;
        
    } 

// Funcio que crea una taula nova anomenada com el Nick del nou usuari registrat        
    public function createTable(Client $cli)   {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();
        $res=$conOK->prepare  ("CREATE TABLE $cli->nom
        (numComanda int NOT NULL, 
        codCli int NOT NULL, 
        can int NOT NULL, 
        FOREIGN KEY (codCli) REFERENCES clients (codCli));");
       
        $res->execute();
                 
        // tanco la connexió
        $conOK = null;

    }

        
// Funció que em permet desar la nova comanda d'usuari
    public function registrarComanda ($codCli, $data)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();


        $res=$conOK->prepare ("INSERT INTO comanda values ('$com->codCli', '$com->data')");
        $confirmar = $res->execute();

        // tanco la connexió
        $conOK = null;
        return $confirmar;
        
        }   
        
// Funcio que em permet treure el num de Comanda per poder registrar posteriorment el detall de la comanda a la seva taula a la BBDD
    public function numComanda ()  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();

    // faig la consulta a la BBDD amb una sentència SELECT 

        $res=$conOK->prepare ("SELECT max(numComanda) FROM comanda");
        $res->execute();

        // tanco la connexió
        $conOK = null;

        foreach ($res as $row) {
            $numComanda= $row;
        }

        return $numComanda;

        }   

//  Funció que em permet treure el codi de Client per obtenir el seu nom d'usuari i així poder insertar el detall de la comanda a la taula corresponent
    public function nomTaula ($codCli) {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOk->prepare ("SELECT nom FROM clients WHERE codCli='$codCli'");
        $nomTa=$res->execute();
        $conOK=null;

        return $nomTa;

        }

// Funció que em permet insertar la taula amb el detall de la nova comanda
    public function insertarDetallComanda (DetallComanda $det)  {


        $con=new ConexioDB();
        $conOK=$con->getConnexio();
        $res=$conOK->prepare ("INSERT INTO $det->nomTaula values ($det->numComanda,'$det->codPro', '$det->can')");
        $confirmar = $res->execute();

        // tanco la connexió
        $conOK = null;
        return $confirmar;
        
        }   

}
