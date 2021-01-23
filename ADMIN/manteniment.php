<?php 

include '../DAO/MetodesAdmin.php';

$opcio=$_REQUEST['opcio'];

switch ($opcio) {
    // si és case 1 inserta un producte nou
    case 1:
        // pujo la nova imatge pel nou producte al servidor
        // indico on vull que es desi la nova imatge
        $target_path = "../IMATGES/";
        // trec el nom de l'arxiu
            $target_path = $target_path . basename( $_FILES['archivo']['name']);
        // ho pujo al servidor
            move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path);
        // deso el nom de la imatge per desar-ho a la BBDD
            $img=basename( $_FILES['archivo']['name']);

        $objPro = new Producte(0, $_REQUEST['txtDesc'], $_REQUEST['txtPreu'], $_REQUEST['txtQuantitat'], $_REQUEST['selectEstat'], $_REQUEST['txtDetall'], $img);

        $metodes = new MetodesAdmin();
        $metodes->desarProducteAdmin($objPro);

        header('Location: productes.php');

        break;

    // si és case 2 modifico un producte 
    // faig pràcticament el mateix pk si vull modificar la imatge repeteixo el procès del case 2
    case 2:
        $target_path = "../IMATGES/";
            $target_path = $target_path . basename( $_FILES['archivo']['name']);
            move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path);
            $img=basename( $_FILES['archivo']['name']);

            $objPro = new Producte($_REQUEST['txtCod'], $_REQUEST['txtDesc'], $_REQUEST['txtPreu'], $_REQUEST['txtQuantitat'], $_REQUEST['selectEstat'], $_REQUEST['txtDetall'], $img);

        $metodes = new MetodesAdmin();
        $metodes->modificarProducteAdmin($objPro);

        header('Location: productes.php');

        break;

    // si és case 3 elimino producte
    case 3:
        $metodes = new MetodesAdmin();
        $metodes->eliminarProducteAdmin($_REQUEST['cod']);

        header('Location: productes.php');

        break;
    
    default:
        break;

}


?>