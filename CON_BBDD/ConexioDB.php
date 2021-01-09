<?php



session_start();
header("Content-Type: text/html;charset=utf-8");


class ConexioDB	{

	//Paràmetres de connexió
	public $servidor="localhost";
	public $usuari="root";
	public $contr="";
	public $bd="BotigaSabates";
	
    //connexió amb la BBDD
        //creo una funció per realitzar la connexió amb la BBDD amb els atributs de dalt, la cridaré cada vegada que em faci falta conectar amb la BBDD

	function getConnexio ()	{

		$con = new mysqli($this->servidor, $this->usuari,$this->contr,$this->bd)
		
			or die("No s'ha pogut realitzar la connexió: ". mysqli_connect_error());
        
            //retornem la connexió
			return $con;
		
		}
}

?>