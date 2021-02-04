<!DOCTYPE html>

<?php 

session_start();
include './MetodesDAO.php';


$objMet = New MetodesDAO();

if(isset($_SESSION['cistella']))    {
    $codCli = $_SESSION['codCli'];
    $nom = $_SESSION['nom'];
    $data = date("Y-m-d");

    $nomTaula = new MetodesDAO();
    $nomT = $nomTaula->nomTaula($codCli);

    $objCom = new Comanda(0, $codCli, $data);
    $objMet->registrarComanda($codCli, $data, $nomT);
    

    // recullo el numero de la darrera comanda
   /* $ultimoPed = $objMet->numComanda();
    echo ($ultimoPed);

    foreach ($_SESSION['cistella'] as $id=>$x)  {
        $objDetall = new DetallComanda($ultimoPed[0], $id, $x, $nomTaula);
        $objMet->insertarDetallComanda($objDetall);
    }*/

    // elimino la sessió cistella per poder realitzar una nova compra si es vol
    

}   unset($_SESSION['cistella']);


?>

<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Cover Template · Bootstrap</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.2/examples/cover/">

        <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>
        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.2/examples/cover/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
            </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Comanda Realitzada</h1>
            <p class="lead">S'ha desat la Comanda a la taula "comanda" a la BBDD i tot el contingut("detall") de la comanda a la taula que es va crear en el moment que l'usuari es va enregistrar</p>
            <p class="lead">
            <a href="../VISTESCLIENT/cataleg.php" class="btn btn-lg btn-secondary">Tornar a la botiga</a>
            </p>
        </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
        <p>Hola <a href="https://getbootstrap.com/">Fonsi</a>, ten <a href="https://twitter.com/mdo">piedad</a>.</p>
        </div>
    </footer>
    </div>
</body>

</html>
