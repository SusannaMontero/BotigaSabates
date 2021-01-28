<?php 

include '../DAO/MetodesAdmin.php';

$opcio=$_REQUEST['opcio'];

switch ($opcio) {
    // si és case 1 inserta un client nou
    case 1:
        $objCli = new Client(0, $_REQUEST['txtNom'], $_REQUEST['txtMail'], $_REQUEST['txtPas']);

        $metodes = new MetodesAdmin();
        $metodes->desarClientsAdmin($objCli);

        header('Location: clients.php');

        break;

    // si és case 2 modifico un client 
    // faig pràcticament el mateix pk si vull modificar la imatge repeteixo el procès del case 2
    case 2:
        $objCli= new Client($_REQUEST['txtCod'], $_REQUEST['txtNom'], $_REQUEST['txtMail'], $_REQUEST['txtPas']);

        $metodes = new MetodesAdmin();
        $metodes->modificarClientsAdmin($objCli);

        header('Location: clients.php');

        break;

    // si és case 3 elimino client
    case 3:
        $metodes = new MetodesAdmin();
        $metodes->eliminarClientsAdmin($_REQUEST['codCli']);

        header('Location: clients.php');

        break;
    
    default:
        break;

}


?>