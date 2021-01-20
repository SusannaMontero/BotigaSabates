<?php



class ConexioDB	{

	// Paràmetres de connexió
	/* public $servidor="localhost";
	public $usuari="root";
	public $contr="";
	public $bd="BotigaSabates"; */
	
    //c onnexió amb la BBDD
        // creo una funció per realitzar la connexió amb la BBDD amb els atributs de dalt, la cridaré cada vegada que em faci falta conectar amb la BBDD
		// connexió PDO, s'instancia la classe PDO, El constructor accepta paràmetres per especificar l'origen de la BD(conegut com a DSN), Si hi ha error 
			//de connexió es llençarà un objecte PDOException.
	public function getConnexio ()	{

		//$con=new PDO ($servidor,$usuari,$contr,$bd);

	///////////// POSAR UN TRY PER CONTROLAR L'ERROR D'EXCEPCIÓ SI ES CASUA PER LA NEW PDO	
		$con=new PDO("mysql:host=localhost; dbname=BotigaSabates", "root", "");

		// $con = new mysqli($this->servidor, $this->usuari,$this->contr,$this->bd);
		
			// or die("No s'ha pogut realitzar la connexió: ". mysqli_connect_error());
        
            // retornem la connexió
			return $con;
		
		}
}

?>