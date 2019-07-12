<?php
 
require_once 'database.php';
class Equipamento{
	private $idEquipamento;
	private $nome;
	private $registro;
    private $fornecedor;
    private $preco;
	
	
	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}
	function setIdequipamento($value){
		$this->idEquipamento = $value;
	}
	function setNome($value){
		$this->nome = $value;
	}
	function setRegistro($value){
		$this->registro = $value;
	}
	function setFornecedor($value){
		$this->fornecedor = $value;
    }
    function setPreco($value){
		$this->preco = $value;
	}
	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `equipamento`(`nome`, `registro`, `fornecedor`, `preco`) VALUES (:nome, :registro, :fornecedor, :preco)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":registro", $this->registro);
            $stmt->bindParam(":fornecedor", $this->setor);
            $stmt->bindParam(":preco", $this->senha);
	
			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `funcionario` SET `nome` = :nome, `registro` = :registro, `fornecedor` = :fornecedor, `preco`= :preco WHERE `idequipamento` = :idequipamento");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":registro", $this->registro);
            $stmt->bindParam(":fornecedor", $this->setor);
            $stmt->bindParam(":preco", $this->senha);
			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `equipamento` WHERE `idequipamento` = :idequipamento");
			$stmt->bindParam(":idequipamento", $this->idequipamento);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `equipamento` WHERE `idequipamento` = :idequipamento");
		$stmt->bindParam(":idequipamento", $this->idequipamento);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `equipamento` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	public function locate(){
        $stmt = $this->conn->prepare("SELECT * FROM `equipamento` WHERE `registro` = :registro");
        $stmt->bindParam(":registro", $this->registro);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
	
}
?>
     