<?php

require_once ("config.php");
$data = new Config();

$id = $_GET['id'];




$data->setId($id);

$record = $data->selectOne();

 
$val = $record[0];



if(isset($_POST['editar'])){
$data -> setnombres($_POST['nombres']);
$data -> setdecripcion($_POST['decripcion']);
$data -> setImagen($_POST['imagen']);

$data->update();
echo "<script>;document.location='estudiantes.php'</script>";
}

require_once("config.php");

$data = new Config();
$all = $data->obtainAll();

$imagenPath = "images/"; 
$imagenes = scandir($imagenPath);


$imagenes = array_filter($imagenes, function ($item) {
    return !in_array($item, ['.', '..']);
});
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Estudiante</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body class="container" >
  <div style="display: flex; justify-content: center;" class="contenedor">

    
<div class="a">
    
        <h2 class="m-2">Detalle de la Factura a Editar</h2>
      <div class="menuTabla">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombres" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombres"
                  name="nombres"
                  class="form-control"  
                 value="<?php echo $val['nombres'];?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="decripcion" class="form-label">Decripcion</label>
                <input 
                  type="text"
                  id="decripcion"
                  name="decripcion"
                  class="form-control"  
                  
                  value="<?php echo $val['decripcion']; ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Imagen</label>
                <select id="imagen" name="imagen" class="form-control">

                  <?php foreach ($imagenes as $imagen): ?>

                    <option value="<?php echo $imagen; ?>" <?php echo ($val['imagen'] == $imagen) ? 'selected' : ''; ?>><?php echo $imagen; ?></option>

                  <?php endforeach; ?>
                  
                </select>
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                <a class="btn btn-warning" href="estudiantes.php?id=<?=$val['id']?>">RETURN</a>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    

  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>