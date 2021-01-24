<?php


// com que necessito el mètode validarUsuari:
include '../DAO/MetodesDAO.php';

$usu = $_REQUEST['txtUsu'];
$pas = $_REQUEST['txtPas'];

// instancio la Classe MetodesDao.php, creo un nou objecte i crido al mètode validarUsuari
$objMetodes = new MetodesDAO();
$llista = $objMetodes->validarUsuari($usu, $pas);

// vaig a verificar quants elements té aquesta $llista amb sizeof, a continuació creo la variable de sessió usuari i accés, la variable amb totes les dades de l'usuari que està accedint

if (sizeof($llista) > 0)    {
    session_start();
    $_SESSION['acces'] = true;
    $_SESSION['codCli'] = $llista[0];
    $_SESSION['nom'] = $llista[1];
    header ("Location: cataleg.php");
}
else {
    header ("Location: loginClient.php?error=Usuari incorrecte!!");
   
}

?> 