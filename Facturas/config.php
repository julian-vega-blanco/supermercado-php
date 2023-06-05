<?php


require_once("../config/db.php");

class Config extends conectar{
    private $id;
    private $idfactura;
    private $idempleado;
    private $idcliente;


    protected $dbCnx;


    public function __construct($id= 0, $idfactura="", $idempleado="", $idcliente= "", $dbCnx=""){

        $this -> id = $id;
        $this -> idfactura = $idfactura;
        $this -> idempleado= $idempleado;
        $this -> idcliente = $idcliente;
        parent:: __construct($dbCnx);

        /* $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] ); */
    }

    //getter
    public function setid($id){
        $this ->id = $id;
    }

    public function getid(){
        return $this -> id;
    }

    public function setidfactura($idfactura){
        $this ->idfactura = $idfactura;
    }

    public function getidfactura(){
        return $this -> idfactura;
    }

    public function setidempleado($idempleado){
        $this-> idempleado = $idempleado;
    }

    public function getidempleado(){
        return $this -> idempleado;
    }

    public function setidcliente($idcliente){
        $this ->idcliente =$idcliente;
    }

    public function getidcliente(){
        return $this -> idcliente;
    }

    

    public function insertData(){
        try {
            $stm =$this-> dbCnx -> prepare("INSERT INTO facturas(idfactura, idempleado, idcliente) values(?,?,?)");
    
            $stm-> execute([$this->idfactura, $this->idempleado, $this->idcliente]);
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function obtainAll(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM facturas");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete(){
        try {
            $stm =$this-> dbCnx -> prepare("DELETE FROM facturas WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
            echo "<script>alert('registro eliminado');document.location='estudiantes.php'</script>";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM facturas WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }


    public function update(){
        try {
            $stm =$this-> dbCnx -> prepare("UPDATE facturas SET idfactura = ?, idempleado = ?, idcliente = ? WHERE id = ?");
            $stm -> execute([$this->idfactura, $this->idempleado, $this -> idcliente, $this -> id]);

        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

}

?>