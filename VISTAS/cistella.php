<!DOCTYPE html>

<?php
// per poder fer servir les variables de sessió
    session_start();

// necessito un mètode que hi ha a DAO  així que: 
    include '../DAO/MetodesDAO.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h2 align="center">Cistella de Productes</h2>
        <!-- pregunto amb isset si la cistella és buida o plena -->
        <?php
            if (isset ($_SESSION ['cistella'])) {
                $total = 0;
                foreach ($_SESSION ['cistella'] as $id=>$x) {
                    $objMetodes = New MetodesDAO();
                    $llista = $objMetodes->llistarProductesCod($id);
                }
            }
        ?>

    </body>
</html>