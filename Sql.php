<?php 

//class extend do php Data object  
class sql extends PDO {

	private $conn;

	//metodo costrutor para realaizar a conexão com o BD de forma automática.
	public function __construct(){

		$this->conn = new PDO("mysql:dbname=dbatendimento;host=localhost","gomes","gomes001");

	}

	private function setParams($statement, $parameters = array()){

		//associar os paramentros ao comando
		foreach ($parameters as $key => $value) {  ///percorrer as linhas rows
			$this->setParam($key,$value);///percorer as colunas ID
		}
	}
		///Metodo que irá setar o paramentro 
	private function setParam($statement,$key, $value){
		 $statement->bindParam($key, $value);

	}

		//funcão que realiza a execução no BD
		//Essa função recebe como parametros uma query qualquer e um parametro do tipo array para agrupar os dados
	public function query ($rawQuery, $params = array()){
		//Criando o statement
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt,$params); 
		$stmt->execute();
		
		return $stmt;
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);
		$resultado = $stmt->fetchall(PDO::FETCH_ASSOC);

		return $resultado;

		//return $stmt->fechAll(PDO::FETCH_ASSOC);
	}

}


?>
