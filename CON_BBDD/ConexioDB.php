<?php



class ConexioDB	{

	//Paràmetres de connexió
	/*public $servidor="localhost";
	public $usuari="root";
	public $contr="";
	public $bd="BotigaSabates";*/
	
    //connexió amb la BBDD
        //creo una funció per realitzar la connexió amb la BBDD amb els atributs de dalt, la cridaré cada vegada que em faci falta conectar amb la BBDD

	public function getConnexio ()	{

		//$con=new PDO ($servidor,$usuari,$contr,$bd);

		$con=new PDO("mysql:host=localhost; dbname=BotigaSabates", "root", "");

		//$con = new mysqli($this->servidor, $this->usuari,$this->contr,$this->bd);
		
			//or die("No s'ha pogut realitzar la connexió: ". mysqli_connect_error());
        
            //retornem la connexió
			return $con;
		
		}
}

?>