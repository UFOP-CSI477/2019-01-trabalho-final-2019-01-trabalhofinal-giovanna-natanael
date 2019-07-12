<?php
 
require_once 'database.php';
require_once 'funcionario.php';
require_once 'equipamento.php';
class Entrada {
     
   private $identrada;
   private $lote;
   private $data;
   private $horario;
   private $obs;
   private $funcionario_idfuncionario;
   private $equipamento_idequipamento;

   public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
       
 
    function setIdentrada($value) {
        $this->identrada = $value;
    }
 
    function setLote($value) {
        $this->lote = $value;
    }    
    function setData($value) {
        $this->data = $value;
    }
    function setHorario($value) {
        $this->horario = $value;
    }
    function setObs($value) {
        $this->obs = $value;
    }
    function setFuncionario_idfuncionario($value) {
        $this->funcionario_idfuncionario = $value;
    }
    function setEquipamento_idequipamento($value) {
        $this->equipamento_idequipamento = $value;
    }
    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `entrada`(`identrada`,`lote`, `data`, `horario`, `obs`,`funcionario_idfuncionario`, `equipamento_idequipamento` ) VALUES(:identrada, :lote, :data, :horario, :obs, :funcionario_idfuncionario, :equipamento_idequipamento)");
            $stmt->bindParam(":identrada", $this->identrada);
            $stmt->bindParam(":lote", $this->lote);
            $stmt->bindParam(":data", $this->data);
            $stmt->bindParam(":horario", $this->horario);
            $stmt->bindParam(":obs", $this->obs);
            $stmt->bindParam(":funcionario_idfuncionario", $this->funcionario_idfuncionario);
            $stmt->bindParam(":equipamento_idequipamento",$this->equipamento_idequipamento);
            
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `entrada` SET `identrada` = :identrada, `lote` = :lote, `data` = :data,  `horario` = :horario, `obs` = :obs, `funcionario_idfuncionario` = :funcionario_idfuncionario, `equipamento_idequipamento`= :equipamento_idequipamento ");
            
            $stmt->bindParam(":identrada", $this->identrada);
            $stmt->bindParam(":lote", $this->lote);
            $stmt->bindParam(":data", $this->data);
            $stmt->bindParam(":horario", $this->horario);
            $stmt->bindParam(":obs", $this->obs);
            $stmt->bindParam(":funcionario_idfuncionario", $this->funcionario_idfuncionario);
            $stmt->bindParam(":equipamento_idequipamento",$this->equipamento_idequipamento);
           
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
         
    }
    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `entrada` WHERE `identrada` = :identrada ");
            $stmt->bindParam(":identrada", $this->identrada);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }
    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `entrada` WHERE `identrada` = :identrada");
        $stmt->bindParam(":identrada", $this->identrada);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `entrada` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}