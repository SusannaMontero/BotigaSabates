<!DOCTYPE html>

<?php

include '../CON_BBDD/ConexioDB.php';
include '../CLASSESREGISTRE/Producte.php';

// genero un arxiu EXCEL a partir dels productes del catàleg i per categories

// connexió a la bbdd i consulta
$con=new ConexioDB();
$conOK=$con->getConnexio();

$res=$conOK->prepare ("SELECT * FROM productes WHERE categoria='dona'");
$res->execute();

?>

<html>
    <head>
            <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Exportació a Excel del Catàleg de productes categoria: Dona</title>
    </head>

            <table id="" class="table table-striped table-bordered">
        <tr>
        <th>Codi Producte</th>
        <th>Descripció</th>
        <th>Preu</th>
        <th>Stock</th>
        <th>Estat</th>
        <th>Detall</th>
        <th>Categoria</th>
        </tr>
    <tbody>
        <?php foreach ($res as $row) {
        $codPro = $row [0];
        $descripcio = $row [1];
        $preu = $row [2];
        $stock = $row [3];
        $estat = $row [4];
        $detall = $row [5];
        // $img = $row [6];
        $categoria = $row [7];

        echo "<tr>";
        echo "<td>" . $codPro . "</td>";
        echo "<td>" . $descripcio . "</td>";
        echo "<td>" . $preu . "</td>";
        echo "<td>" . $stock . "</td>";
        echo "<td>" . $estat . "</td>";
        echo "<td>" . $detall . "</td>";
        echo "<td>" . $categoria . "</td>";
     
        echo "</tr>";
      }
     
      echo "</table>";       

      header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
      header('Content-disposition: attachment; filename=productesDona.xls');
            
            

?>