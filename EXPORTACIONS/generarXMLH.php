<?php

include '../CON_BBDD/ConexioDB.php';
include '../CLASSESREGISTRE/Producte.php';

// genero un arxiu XMl a partir dels productes del catàleg i per categories

$xml = new XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->setIndentString('	'); 
$xml->startDocument('1.0', 'UTF-8');


// connexió a la bbdd i consulta
$con=new ConexioDB();
$conOK=$con->getConnexio();

$res=$conOK->prepare ("SELECT * FROM productes WHERE categoria='home'");
$res->execute();

$xml->startElement('Productes Corresponents a la Categoria Home');

// poso els elements resultants de la consulta a BBDD dins d'un array i el vaig descomponent per poder-los posar a les variables corresponents per poder llistar
        
    foreach ($res as $row) {
        $xml->startElement('productes');
        $codPro = $row [0];
        $descripcio = $row [1];
        $preu = $row [2];
        $stock = $row [3];
        $estat = $row [4];
        $detall = $row [5];
        // $img = $row [6];
        $categoria = $row [7];
           
        // es genera el llistat XML creant els elements + els valors de les variables
        $xml->writeElement('codPro', $codPro);
        $xml->writeElement('descripcio', $descripcio);
        $xml->writeElement('preu', $preu);
        $xml->writeElement('stock', $stock);
        $xml->writeElement('estat', $estat);
        $xml->writeElement('detall', $detall);
        // $xml->writeElement('imatge', $imatge);
        $xml->writeElement('categoria', $categoria);
        $xml->endElement();
            
    }
$xml->endElement();

$generar = $xml->outputMemory();
ob_end_clean();
ob_start();
header('Content-Type: application/xml; charset=UTF-8');
header('Content-Encoding: UTF-8');
header('Content-Disposition: attachment;filename=generarXML.xml');
header('Expires: 0');
header('Pragma: cache');
header('Cache-Control: private');
echo $generar;
?>


        
            
            
            

           
  
