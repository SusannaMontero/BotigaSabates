<!DOCTYPE html>
<!-- En aquest document hi ha la VistaClient que veurà l'Administradora quan vulgui modificar, crear o eliminar productes -->

<?php

include '../DAO/MetodesAdmin.php';

// rebo la opció sigui 1 o 2 en funció del que em faci falta

$opcio = $_REQUEST['opcio'];

switch  ($opcio)    {
    case 1:
        $cod = "";
        $desc = "";
        $preu = "";
        $stock = "";
        $estat = "";
        $detall = "";
        $categ = "";
        break;

    case 2:
       $cod = $_REQUEST['cod'];
        $objMetodes = new MetodesAdmin();
        $llista = $objMetodes->llistarProductesCodAdmin($cod);
        $cod = $llista[0];
        $desc = $llista[1];
        $preu = $llista[2];
        $stock = $llista[3];
        $estat = $llista[4];
        $detall = $llista[5];
        $categ = $llista[7];
        break;
    default:
        break;
}

?>

<!-- formulari per manteniment, el cridarà ADMIN/productes.php -->
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
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Botiga de Sabates Su</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sing out</a>
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
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Producte
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Comandes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Sortir
            </a>
          </li>
        </ul>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h3 align="center" style="margin-top: 50px">Productes</h3>
    <form enctype="multipart/form-data" action="manteniment.php" method="POST">
        <table border="0"  align="center" width="400">
            <tr>
                <td>Codi: </td>
                <td><input type="text" name="txtCod" value="<?php echo $cod; ?>"
                class="form-control input-sm" style="margin-top: 5px;"
                readonly="readonly"></td>
            </tr>
            <tr>
                <td>Descripció: </td>
                <td><input type="text" name="txtDesc" value="<?php echo $desc; ?>"
                class="form-control input-sm" style="margin-top: 5px;"></td>
            </tr>
            <tr>
                <td>Preu: </td>
                <td><input type="text" name="txtPreu" value="<?php echo $preu; ?>"
                class="form-control input-sm" style="margin-top: 5px;"></td>
            </tr>
            <tr>
                <td>Quantitat: </td>
                <td><input type="text" name="txtQuantitat" value="<?php echo $stock; ?>"
                class="form-control input-sm" style="margin-top: 5px;"></td>
            </tr>
            <tr>
                <td>Estat: </td>
                <td><input type="text" name="txtEstat" value="<?php echo $estat; ?>"
                class="form-control input-sm" style="margin-top: 5px;"></td>
            </tr>
            <tr>
                <td>Detall: </td>
                <td><input type="text" name="txtDetall" width="100" rows="3" 
                class="form-control input-sm" style="margin-top: 5px;"><?php echo $detall; ?></textarea></td>
            </tr>
            <tr>
                <td>Imatge:  </td>
                <td><input  name="arxiu" type="file" /></td>
            </tr>
            <tr>
                <td>Categoria: </td>
                <td><input type="text" name="txtCateg" value="<?php echo $categ; ?>"
                class="form-control input-sm" style="margin-top: 5px;"></td>
            </tr>
            <tr style="margin-top: 10px;">
                <th><a href="productes.php" class="btn btn-secondary" data-dismiss="modal">Tornar</a></th>
                <th><input type="submit" value="Desar" class="btn btn-primary" name="btnDesar"/></th>
            </tr>
            <input type="hidden" value="<?php echo $opcio;?>" class="btn btn-primary" name="opcio"/>
        </table>
    </form>

    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>

    </body>
</html>