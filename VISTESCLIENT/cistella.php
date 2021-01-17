<!DOCTYPE html>

<?php
// per poder fer servir les variables de sessió
    session_start();

// necessito un mètode que hi ha a DAO  així que: 
    include '../DAO/MetodesDAO.php';

?>

<html>
    <head>
                <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
            <!-- valido sessió, de tal manera que si var de sessió 'acces' és buida o diferent de true apareixerà el registre -->
                    <?php
                        if (!isset ($_SESSION['acces']) || $_SESSION['acces']<>true) {

                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="registre.php">Registre</a>
                    </li>
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


        <div class="container">
            <h2 align="center" style="margin-top: 80px">Cistella de Productes</h2>
            <table border="1" align="center" width="400" class="table">

                <tr style ="background: lightblue">
                    <th>Producte</th>
                    <th>Preu</th>
                    <th>Quantiat</th>
                    <th>Cost</th>
                </tr>

            <!-- pregunto amb isset si la cistella és buida o plena -->
            <?php
                if (isset ($_SESSION['cistella'])) {
                    $total = 0;
                // amb el foreach recorro la variable de sessió que es diu cistella i trec els id i els poso a la quantitat
                    foreach ($_SESSION['cistella'] as $id=>$quantitat) {
                        $objMetodes=new MetodesDAO();
                    // dels productes que mostraré a la cistella serà igual a objecteMetodes i crido a llistarProductesCod(que és a MetodesDAO) i passo per paràmetre l'id
                        $llista=$objMetodes->llistarProductesCod($id);

        // prova //////////////////////
                    foreach ($llista as $row) {
                        $nom = $row [1];
                        $preu = $row [2];
                    }

                    // mostrem doncs
                       /* $nom=$llista[1];
                        $preu=$llista[2];*/
                        $cost=$quantitat*$preu;
                        $total=$total+$cost;
                        ?>
                <tr>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $preu; ?></td>
                <!-- posem href per anar al switch amb la opció 2 i la opció de restar productes i li he d'enviar l'id del producte que ha de restar, l'id es troba a un php amb la variable id
                    poso & per concatenar tot el que he d'enviar-->
                    <td><?php echo $quantitat; ?><a href="../DAO/botigaDAO.php?id=<?php echo $id ?>$action=eliminar" class="btn-light">&nbsp - Menys</a></td>
                    <td><?php echo $cost; ?></td>
                </tr>

                        <?php
                    }
                    ?>
                <!-- fora del foreach mostrarem el preu total -->
                <tr>
                    <td colspan="3">Total: </td>
                    <td><?php echo $total; ?></td>
                </tr>
                <?php
                }
            ?>
            </table>
        
        <!-- creo botons per poder tornar al catàleg, eliminar cistella i realitzar pagament -->
            <h6 align="center"></h6>
                <a href="cataleg.php" class="btn btn-primary">Seguir comprant</a>
                <a href="../DAO/botigaDAO.php?action=cistellaBuida&opcio=2" class="btn btn-primary">Anul.lar Cistella</a>
                <button class="btn btn-secondary">Realitzar Pagament</button>

        </div>

            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>