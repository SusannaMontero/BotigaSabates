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
       
        <title></title>
    </head>
    <body>

    <!-- Menu Bootstrap -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
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

        <h3 align="center" style="margin-top: 80px;">Registre d'usuaris</h3>
       <!-- form action buit "" perque les dades s'envien a la mateixa pàgina, aquesta -->
        <form action="" method="get">
            <table border="0" width="300" align="center">
                <tr>
                    <td>Nom/Nick: </td>
                    <td><input type="text" name="txtNom"></td>
                </tr>
                <tr>
                    <td>Correu electrònic: </td>
                    <td><input type="email" name="txtMail"></td>
                </tr>
                <tr>
                    <td>Contrasenya: </td>
                    <td><input type="text" name="txtPas"></td>
                </tr>
                <tr>
                    <th colspan="2"><input class="btn btn-primary" type="submit" name="btnEnviar" value="Desar Dades"></th>
                </tr>
            </table>      
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
                if ($confirmar == 1)
                    header ("Location: cataleg.php");
                else
                    echo "<h4 align=center>Registre no realitzat</h4>";
            }
        ?>

          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>