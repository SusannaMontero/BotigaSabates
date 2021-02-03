<?php

include '../CON_BBDD/ConexioDB.php';
include '../CLASSESREGISTRE/Producte.php';
include '../CLASSESREGISTRE/Client.php';

class MetodesAdmin  {

// Funcio que em permet validar a l'usuariAdmin, 
    public function validarUsuariAdmin ($nomAdmin,$pasAdmin)  {

        $con=new ConexioDB();
        $conOK=$con->getConnexio();
    
    // faig la consulta a la BBDD amb una sentència SELECT 

        $res=$conOK->prepare ("SELECT * FROM administrador WHERE nomAdmin='$nomAdmin' AND pasAdmin='$pasAdmin'");
        $res->execute();

        // tanco la connexió
        $conOK = null;
    
        foreach ($res as $row) {
            $llista = $row;
        }
    
        return $llista;
    
    }   


// Funció per llistar els productes 
    public function llistarProductesAdmin ()  {
    
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("SELECT * FROM productes");
        $res->execute();

        // tanco la connexió
        $conOK = null;

        foreach ($res as $row) {
            $llista[] = $row;
        }

        return $llista;

    }

    // Mètodes per realitzar el mantniment de la BBDD

// Funció que em permet desar un producte nou, rep com a paràmetre l'objecte producte de la Classe producte
    public function desarProducteAdmin (Producte $pro)   {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("INSERT INTO productes VALUES(null, '$pro->desc', '$pro->preu', '$pro->stock', '$pro->estat', '$pro->detall','$pro->imatge', '$pro->categ')");
        $res->execute();
        $conOK = null;
    }


// Funció que em permet modificar productes
    public function modificarProducteAdmin (Producte $pro)   {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("UPDATE productes SET descripcio='$pro->desc', preu='$pro->preu', stock='$pro->stock', estat'$pro->estat', detall'$pro->detall', imatge'$pro->imatge', categoria'$pro->categ' WHERE codPro=$pro->cod");
        $res->execute();
        $conOK = null;
    }


// Funció que em permet eliminar productes
    public function eliminarProducteAdmin($cod)  {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("DELETE FROM productes WHERE codPro=$cod");
        $res->execute();
        $conOK = null;
    }


// Funció que em permet llistar Productes per Codi
    public function llistarProductesCodAdmin($cod)  {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("SELECT * FROM productes WHERE codPro=$cod");
        $res->execute();
        $conOK = null;

        foreach ($res as $row)  {
            $llista = $row;
        }
        
        return $llista;
    }
    

// Funció que em permet llistar clients    
    public function llistarClientsAdmin()    {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("SELECT * FROM clients");
        $res->execute();
        $conOK = null;

        foreach ($res as $row)  {
            $llista[] = $row;
        }
        
        return $llista;
    }
    
// Funció que em permet modificar clients
    public function modificarClientsAdmin (Client $cli)   {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("UPDATE clients SET nom='$cli->nom', mail='$cli->mail', pas='$cli->pas' WHERE codCli=$cli->codCli");
        $res->execute();
        $conOK = null;
    }


// Funció que em permet eliminar clients
    public function eliminarClientsAdmin($codCli)  {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("DELETE FROM clients WHERE codCli=$codCli");
        $res->execute();
        $conOK = null;

        
    }


// Funció que em permet llistar clients  per codi  
    public function llistarClientsCod($codCli)    {
        $con=new ConexioDB();
        $conOK=$con->getConnexio();

        $res=$conOK->prepare ("SELECT * FROM clients WHERE codCli=$codCli");
        $res->execute();
        $conOK = null;

        foreach ($res as $row)  {
            $llista = $row;
        }
        
        return $llista;
    }



    

}
