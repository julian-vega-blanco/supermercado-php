<?php


require_once("config/db.php");

class Config extends conectar{
    private $id;
    private $nombres;
    private $compañia;
    private $imagen;


    protected $dbCnx;


    public function __construct($id= 0, $nombres="", $compañia="", $imagen= "", $dbCnx=""){

        $this ->id = $id;
        $this -> nombres = $nombres;
        $this -> compañia= $compañia;
        $this -> imagen = $imagen;
        parent:: __construct($dbCnx);


       /* $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] ); */
    }

    //getter
    public function setId($id){
        $this ->id = $id;
    }

    public function getId(){
        return $this -> id;
    }

    public function setnombres($nombres){
        $this ->nombres = $nombres;
    }

    public function getnombres(){
        return $this -> nombres;
    }

    public function setcompañia($compañia){
        $this-> compañia = $compañia;
    }

    public function getcompañia(){
        return $this -> compañia;
    }

    public function setimagen($imagen){
        $this ->imagen =$imagen;
    }

    public function getimagen(){
        return $this -> imagen;
    }

    

    public function insertData(){
        try {
            $stm =$this-> dbCnx -> prepare("INSERT INTO clientes(nombres, compañia, imagen) values(?,?,?)");
    
            $stm-> execute([$this->nombres, $this->compañia, $this->imagen]);
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function obtainAll(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM clientes");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete(){
        try {
            $stm =$this-> dbCnx -> prepare("DELETE FROM clientes WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
            echo "<script>alert('registro eliminado');document.location='estudiantes.php'</script>";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM clientes WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }


    public function update(){
        try {
            $stm =$this-> dbCnx -> prepare("UPDATE clientes SET nombres = ?, compañia = ?, imagen = ? WHERE id = ?");
            $stm -> execute([$this->nombres, $this->compañia, $this -> imagen, $this -> id]);

        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

}

?>