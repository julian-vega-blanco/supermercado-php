<?php


require_once("../config/db.php");

class Config extends conectar{
    private $id;
    private $nombres;
    private $decripcion;
    private $imagen;


    protected $dbCnx;


    public function __construct($id= 0, $nombres="", $decripcion="", $imagen= "", $dbCnx=""){

        $this ->id = $id;
        $this -> nombres = $nombres;
        $this -> decripcion= $decripcion;
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

    public function setdecripcion($decripcion){
        $this-> decripcion = $decripcion;
    }

    public function getdecripcion(){
        return $this -> decripcion;
    }

    public function setimagen($imagen){
        $this ->imagen =$imagen;
    }

    public function getimagen(){
        return $this -> imagen;
    }

    

    public function insertData(){
        try {
            $stm =$this-> dbCnx -> prepare("INSERT INTO facturadetalle(nombres, decripcion, imagen) values(?,?,?)");
    
            $stm-> execute([$this->nombres, $this->decripcion, $this->imagen]);
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function obtainAll(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM facturadetalle");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete(){
        try {
            $stm =$this-> dbCnx -> prepare("DELETE FROM facturadetalle WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
            echo "<script>alert('registro eliminado');document.location='estudiantes.php'</script>";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM facturadetalle WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }


    public function update(){
        try {
            $stm =$this-> dbCnx -> prepare("UPDATE facturadetalle SET nombres = ?, decripcion = ?, imagen = ? WHERE id = ?");
            $stm -> execute([$this->nombres, $this->decripcion, $this -> imagen, $this -> id]);

        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

}

?>