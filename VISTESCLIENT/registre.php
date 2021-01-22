<!DOCTYPE html>

<?php

// com que faré servir la classe Client i crearé objectes de classe Client em fa falta l'include però com que també necessito la classe MetodesDAO i aquesta ja inclou Client.php
    //en aquest cas no posaré l'include de Client.php, el deixo en comentaris per ser conscient que en un altre cas sí que em faria falta
//include '../CLASSESREGISTRE/Client.php';
include '../DAO/MetodesDAO.php';

?>

<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.2/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

 
        <title></title>
    </head>
    <body>

    <!-- Menu Bootstrap -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
             <span class="navbar-text">Botiga de Sabates Su</span>
                <span class="navbar-toggle-icon"></span>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="cistella.php">Cistella</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../DAO/botigaDAO.php?opcio=1">Botiga</a>
                    </li>
            <!-- valido sessió, de tal manera que si var de sessió 'acces' és buida o diferent de true apareixerà el registre -->
                    <?php
                        if (!isset ($_SESSION['acces']) || $_SESSION['acces']<>true) {

                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Inici de Sessió</a>
                    </li>
                    
                    
            <!-- en cas que la var de sessió no sigui buida o sigui true aleshores apareix el missatge de benvinguda + el nom de l'usuari -->
                    <?php
                        }
                        else{
                    ?>

                    <li class="nav-item">
                        <a class="nav-link">Benvinguda/Benvingut <?php echo $_SESSION['nom']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="tancar.php" class="nav-link">Tancar Sessió</a>
                    </li>

                    <?php
                        }
                    ?>

                </ul>
            </div>
          </div>
        </nav>
    <!-- fi del menú -->

    <!-- formulari Registre nou Usuari -->
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
    <link href="https://getbootstrap.com/docs/4.2/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="" method="get">
     
        <img class="mb-4" src="../IMATGES/descarga.jpg" alt="" width="110" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Registre</h1>

        <label for="inputName" class="sr-only"></label>
        <input type="txt" id="inputName" name="txtNom" class="form-control" placeholder="Nom/Nick" required autofocus>

        <label for="inputEmail" class="sr-only"></label>
        <input type="email" id="inputMail" name="txtMail" class="form-control" placeholder="Correu Electrònic" required>

        <label for="inputPassword" class="sr-only"></label>
        <input type="password" id="inputPassword" name="txtPas" class="form-control" placeholder="Contrasenya" required>

        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnEnviar" value="Desar Dades">Enviar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>

    </form>

        <?php

            if (isset ($_REQUEST['btnEnviar'])) {
                $nom = $_REQUEST['txtNom'];
                $mail = $_REQUEST['txtMail'];
                $pas = $_REQUEST['txtPas'];

            // creo un objecte te tipus Client, el primer que serà el codiClient com que és autoincrement no em fa falta inserir-ho, per això hi poso un 0
                $objCli = new Client(0, $nom, $mail, $pas);

            // crido al mètode creant un nou objecte de la classe MetodesDAO
                $metodes = new MetodesDAO();

            // a MetodesDAO tinc la funció registrarClient que rep de paràmetre un objecte i retorna $confirmar que pot ser un o 0, així que aquí creo una variabe confirmar que serà igual a:
                $confirmar = $metodes->registrarClient($objCli);

            // valido la resposta rebuda de $confirmar
                if ($confirmar == 1) {
                    header ("Location: cataleg.php");
                }
                else {

                ?>
                    <h2 align="center" class="text-danger">
                    
                    <?php
                         if (isset($_REQUEST['error']))     {
                            echo $_REQUEST['error'];
                 }
                 ?> </h2>
                 <?php
                }
            }
        ?>

<!-- Modal Bootstrap login-->
         <!-- a aquest modal login(id="loginModal) el cridarà l'inici de sessió de l'usuari que es troba al menú -->
         <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="valida.php">
                        <div class="modal-body" id="mostrar">

                            <table border="0" align="center">
                                <tr>
                                    <td>Usuari: </td>
                                    <td><input type="text" name="txtUsu"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="pasword" name="txtPas"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary">Tancar</button>
                            <button class="btn btn-primary" onclick="submit()">Iniciar Sessió</button>
                        </div>
                        <!-- Registre després serà un hipervincle -->
                            <h6 align="center"><a href="registre.php">No hi ets? Registra't</a></h6>
                    </form>
                </div>                  
            </div>
        </div>   
          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>