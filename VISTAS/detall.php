<!DOCTYPE html>

<?php

// 3. include la carpeta amb els mètodes que em fan falta per llistar els detalls dels prodectes agregats dsd la BBDD

include '../DAO/MetodesDAO.php';

// 1. $_REQUEST predefinit de php per rebre els paràmetres d'una altre pàgina, sigui amb get sigui amb post.
// cada vegada que es premi el botó agregar aquí rebrà el codi del producte, ve de la pàgina catàleg i del mètode enviar

$cod = $_REQUEST['cod'];

// 2. Tenint el codi ara puc cridar al mètode per mostrar el detall del producte  agregat
// 4. instancio la classe MetodesDao.php

$objMetodes = new MetodesDAO();

// 5. Crido dsd objMetodes al seu mètode llistarProductesCod($cod) que ve de MetodesDao.php

$llista = $objMetodes -> llistarProductesCod($cod);

// 6. Enmagatzemo els detalls dels productes que tinc a la BBDD a les següents variables i amb un foreach recorro l'array per poder-lo imprimir correctament

foreach ($llista as $row) {
    $nom = $row [1];
    $preu = $row [2];
    $detall = $row [5];
    $img = $row [6];
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form>
            <table border = "0">
                <tr> 
                    <th rowspan="4"><img src="../IMATGES/<?php echo $img; ?>" width="200" height="170"></th>
                    <th><?php echo $nom; ?></th>
                </tr>
                <tr>
                    <td align = "justify"><?php echo $detall; ?></td>
                </tr>
                <tr>
                    <td align = "right"><?php echo $preu; ?></td>
                </tr>
                <tr>
                    <td align = "right">Quantitat: <input type="number" min="1" max="10" value="1" name="txtQuantitat"></td>
                </tr>
                <tr>
                    <th align = "right" colspan="2">
                        <button type="button" class="btn btn-secondary">Tancar</button>
                        <button type="button" class="btn btn-primary">Agregar al Carret</button>
                    </th>
                </tr>
            </table>
        </form>
    </body>
</html>