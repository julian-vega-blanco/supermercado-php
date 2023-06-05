<?php


require_once("../config/db.php");

class Config extends conectar{
    private $id;
    private $empleado;
    private $celularempleado;
    private $direccionempleado;
    private $imagen;


    protected $dbCnx;


    public function __construct($id= 0, $empleado="", $celularempleado="",$direccionempleado="", $imagen= "", $dbCnx=""){

        $this ->id = $id;
        $this -> empleado = $empleado;
        $this -> celularempleado= $celularempleado;
        $this -> direccionempleado = $direccionempleado;
        $this -> imagen = $imagen;
        

        /* $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] ); */
    }

    //getter
    public function setId($id){
        $this ->id = $id;
    }

    public function getId(){
        return $this -> id;
    }

    public function setempleado($empleado){
        $this ->empleado = $empleado;
    }

    public function getempleado(){
        return $this -> empleado;
    }

    public function setcelularempleado($celularempleado){
        $this-> celularempleado = $celularempleado;
    }

    public function getcelularempleado(){
        return $this -> celularempleado;
    }

    public function setdireccionempleado($direccionempleado){
        $this-> direccionempleado = $direccionempleado;
    }

    public function getdireccionempleado(){
        return $this -> direccionempleado;
    }

    public function setimagen($imagen){
        $this ->imagen =$imagen;
    }

    public function getimagen(){
        return $this -> imagen;
    }

    

    public function insertData(){
        try {
            $stm =$this-> dbCnx -> prepare("INSERT INTO empleados(empleado, celularempleado,direccionempleado, imagen) values(?,?,?,?)");
    
            $stm-> execute([$this->empleado, $this->celularempleado,$this->direccionempleado, $this->imagen]);
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function obtainAll(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM empleador");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete(){
        try {
            $stm =$this-> dbCnx -> prepare("DELETE FROM empleados WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
            echo "<script>alert('registro eliminado');document.location='estudiantes.php'</script>";
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm =$this-> dbCnx -> prepare("SELECT * FROM empleados WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }


    public function update(){
        try {
            $stm =$this-> dbCnx -> prepare("UPDATE empleados SET empleado = ?, celularempleado = ?,direccionempleado = ?, imagen = ? WHERE id = ?");
            $stm -> execute([$this->empleado, $this->celularempleado,$this->direccionempleado, $this -> imagen, $this -> id]);

        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

}

?>