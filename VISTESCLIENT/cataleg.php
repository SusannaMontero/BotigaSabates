<!DOCTYPE html>

<!--totes les pàgines que treballen amb variables de sessió han de tenir el session_start-->

<?php
session_start();

//porto la llista de productes

$llista = $_SESSION['llista'];

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
                        <a class="nav-link" href="registre.php">Registre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cistella.php">Cistella</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Inici de Sessió</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="tancar.php" class="nav-link">Tancar Sessió</a>
                    </li>
                </ul>
            </div>
          </div>
        </nav>
    <!-- fi del menú -->

  
        <div class="container-fluid">
                    <h2 align="center" style="margin-top: 80px;">CATÀLEG DE PRODUCTES</h2>
            <table border="0" width="700" align="center" class="table">
                <tr align="center">

            <?php

                foreach ($llista as $registre)   {
                    if($num==3) {
                        echo "<tr align=center>";
                        $num=1;
                    }else{
                        $num++;
                    }
                
                    ?>
                <th><img src="../IMATGES/<?php echo $registre[6]?>" width="180" height="180"><br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="enviar(<?php echo $registre[0];?>)">Veure</button></th>
                
                <?php
                }  
                ?>  
            </table>
        </div>

        <!-- Modal Bootstrap detall-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detall del Producte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body" id="mostrar">
                    ...
                </div>
                <div class="modal-footer"></div>
                </div>
            </div>
        </div>

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
                            <h6 align="center">No hi ets? Registra't</h6>
                    </form>
                </div>                  
            </div>
        </div>
    
    <!-- Codi Ajax per crear la finestra emergent amb el producte sel.leccionat -->
    <!-- Funció que em permet enviar a la pàgina detall.php el codi de producte quan click a Agregar, crido la funció a la pàgina detall.php
        cada cop que premo Agregar estic cridant al mètode enviar que rep com a paràmetre el codi de producte i em direcciono cap a la pàgina detall.php enviant-li també com a paràmetre el codi-->
        <script>

            var resultado = document.getElementById("mostrar");
            function enviar(codi) {
                                                            
                var xmlhttp;
                if (window.XMLHttpRequest)  {
                    xmlhttp=new XMLHttpRequest();
                }else {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

    // Funció que em permet accedir a un div en concret a través d'una variable que es dirà reslutat            
                xmlhttp.onreadystatechange=function () {

                    // amb aquest if concreto que si la pàgina o l'estat de la pàgina és correcte, és a dir no hi ha error de not found 404
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)   {
                            resultado.innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","detall.php?cod="+codi,true);
                xmlhttp.send();
            }
        </script>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>