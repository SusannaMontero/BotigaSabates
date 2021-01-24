<!doctype html>
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
                        <a class="nav-link" href="../VISTESCLIENT/cistella.php">Cistella</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../DAO/botigaDAO.php?opcio=1">Botiga</a>
                    </li>
            <!-- valido sessió, de tal manera que si var de sessió 'acces' és buida o diferent de true apareixerà el registre -->
                    <?php
                        if (!isset ($_SESSION['acces']) || $_SESSION['acces']<>true) {

                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../VISTESCLIENT/loginClient.php" >Inici de Sessió</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin</a>
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
    <form class="form-signin" action="validaAdmin.php">

        <h2 align="center" class="text-danger"><?php
        if (isset($_REQUEST['error']))     {
            echo $_REQUEST['error'];
        }
        ?> </h2>
        <img class="mb-4" src="../IMATGES/imatgesCorporatives/descarga.jpg" alt="" width="110" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Si us plau entra</h1>

        <label for="inputName" class="sr-only">Nom Admin</label>
        <input type="txt" id="inputName" name="txtNomAdmin" class="form-control" placeholder="Nom/Nick" required autofocus>

        <label for="inputPassword" class="sr-only">Contrasenya</label>
        <input type="password" id="inputPassword" name="txtPasAdmin" class="form-control" placeholder="Contrasenya" required>

        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>

    </form>

      
</body>
</html>

