<!doctype html>

<?php 
  include '../DAO/MetodesAdmin.php';

  session_start();

  if ($_SESSION['accesAdmin']<>TRUE) {
        header("Location: Login.php");
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.2/examples/dashboard/">

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
    <link href="https://getbootstrap.com/docs/4.2/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../VISTESCLIENT/cataleg.php">Botiga de Sabates Su</a>
  
  <!-- botons generar XML per categories -->  
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Generar XML per categories:</a>
    </label>
    <label class="btn  active">
      <a href="../EXPORTACIONS/generarXML.php">Dona</a>
    </label>
    <label class="btn active">
      <a href="../EXPORTACIONS/generarXMLH.php">Home</a>
    </label>
  </div>
  <!-- fi -->
  <!-- generar EXCEL per categories -->
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Generar EXCEL per categories:</a>
    </label>
    <label class="btn  active">
      <a href="../EXPORTACIONS/generarXML.php">Dona</a>
    </label>
    <label class="btn active">
      <a href="../EXPORTACIONS/generarXMLH.php">Home</a>
    </label>
  </div>
  <!-- fi -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="tancarSessioAdmin.php">Tancar</a>
    </li>
  </ul>

</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productes.php">
              <span data-feather="file"></span>
              Producte
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comandes.php">
              <span data-feather="shopping-cart"></span>
              Comandes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clients.php">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
        </ul>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <!-- mostro el llistat de productes al dashboard de l'admin -->
        <br>
        <h3 align="center">Llistat de Productes</h3>
        <div  align="right">
          <a href="formulari.php?opcio=1&cod=0"  class="btn btn-primary">Afegir Nous Productes</a>
        </div>
        <table class="table">
          <tr>
              <th>Codi</th><th>Descripció</th><th>Preu</th><th>Stock</th><th>Estat</th><th>Imatge</th><th>Categoria</th><th>Editar</th>
          </tr>

        <?php 
            $metodes = new MetodesAdmin();
            $llista = $metodes->llistarProductesAdmin();

            foreach ($llista as $row) {
              ?>

              <tr>
                  <td><?php echo $row[0]?></td>  
                  <td><?php echo $row[1]?></td>
                  <td><?php echo $row[2]?></td>
                  <td><?php echo $row[3]?></td>
                  <td><?php echo $row[4]?></td>
                  <td><img src="../IMATGES/<?php echo $row[6]?>" width="50" height="50"></td>
                  <td><?php echo $row[7]?></td>
                  <td>
                      <a href="formulari.php?opcio=2&cod=<?php echo $row[0]?>" class="btn btn-success" style="color:white;">Modificar</a> ||
                      <a href="manteniment.php?opcio=3&cod=<?php echo $row[0]?>" class="btn btn-danger" style="color:white;">Eliminar</a>
                  </td>
              </tr>

            <?php
            } 
        ?>

       
        </table>
    </main>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
    </body>
</html>
          