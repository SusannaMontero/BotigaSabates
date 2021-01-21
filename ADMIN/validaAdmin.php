<?php


// com que necessito el mètode validarUsuari:
include '../DAO/MetodesAdmin.php';

$usu = $_REQUEST['txtNomAdmin'];
$pas = $_REQUEST['txtPasAdmin'];

// instancio la Classe MetodesDao.php, creo un nou objecte i crido al mètode validarUsuari
$objMetodes = new MetodesAdmin();
$llista = $objMetodes->validarUsuariAdmin($usu, $pas);

// vaig a verificar quants elements té aquesta $llista amb sizeof, a continuació creo la variable de sessió usuari i accés, la variable amb totes les dades de l'usuari que està accedint

if (sizeof($llista) > 0)    {
    session_start();
    $_SESSION['accesAdmin'] = true;
    header ("Location: productes.php");
}
else {
    header ("Location: login.php?error=Usuari incorrecte!!");
   
}

?> 