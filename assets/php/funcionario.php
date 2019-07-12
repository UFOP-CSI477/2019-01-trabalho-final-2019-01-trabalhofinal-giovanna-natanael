<?php
 
require_once 'database.php';
class Funcionario{
	private $idfuncionario;
	private $nome;
	private $registro;
    private $setor;
    private $senha;
	
	
	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}
	function setIdfunionario($value){
		$this->idfuncionario = $value;
	}
	function setNome($value){
		$this->nome = $value;
	}
	function setRegistro($value){
		$this->registro = $value;
	}
	function setSetor($value){
		$this->setor = $value;
    }
    function setSenha($value){
		$this->senha = $value;
	}
	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `funcionario`(`nome`, `registro`, `setor`, `senha`) VALUES (:nome, :registro, :setor, :senha)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":registro", $this->registro);
            $stmt->bindParam(":setor", $this->setor);
            $stmt->bindParam(":senha", $this->senha);
	
			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `funcionario` SET `nome` = :nome, `registro` = :registro, `setor` = :setor, `senha`= :senha WHERE `idfuncionario` = :idfuncionario");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":registro", $this->registro);
            $stmt->bindParam(":setor", $this->setor);
            $stmt->bindParam(":senha", $this->senha);
			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `funcionario` WHERE `idfuncionario` = :idfuncionario");
			$stmt->bindParam(":idfuncionario", $this->idfuncionario);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE `idfuncionario` = :idfuncionario");
		$stmt->bindParam(":idfuncionario", $this->idfuncionario);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	public function locate(){
        $stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE `registro` = :email");
        $stmt->bindParam(":registro", $this->registro);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
	
}
?>
     