
<?php
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
<html style="display: flex; aling-items: center; justify-content: center" >

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body style="display: flex; justify-content: center; aling-items: center;">
<div class="container bg-info bg-gradient">
  <h1><a href="../Categoria/estudiantes.php?id=<?=$val['id']?>">Categoria</a></h1>
  <h1><a href="../Clientes/estudiantes.php?id=<?=$val['id']?>">Clientes</a></h1>
  <h1><a href="../Empleados/estudiantes.php?id=<?=$val['id']?>">Empleados</a></h1><h1><a href="../Facturas/estudiantes.php?id=<?=$val['id']?>">Facturas</a></h1>
  <h1><a href="../FacturaDetalle/estudiantes.php?id=<?=$val['id']?>">FacturaDetalle</a></h1>
  
  <h1><a href="../Producto/estudiantes.php?id=<?=$val['id']?>">Producto</a></h1>
  <h1><a href="../Provedor/estudiantes.php?id=<?=$val['id']?>">Provedor</a></h1>
</div>
    <div class="parte-media container">
    <h1 class="center">Detalles de las Facturas</h1>
      <div style="display: flex; justify-content: center;">
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">FACTURA</th>
              <th scope="col">EMPLEADO</th>
              <th scope="col">CLIENTE</th>
              <th scope="col">BORRAR</th>
              <th scope="col">EDITAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
         
          <?php
          foreach ($all as $key => $val){
          ?>
          <tr>
            <td><?php echo $val ['id']?></td>
            <td><?php echo $val ['idfactura']?></td>
            <td><?php echo $val ['idempleado']?></td>
            <td><?php echo $val ['idcliente']?></td>
            
            
            <td>
              <a class="btn btn-danger" href="borrarEstudiantes.php?id=<?=$val['id']?>&req=delete">Borrar</a>
              
            </td><td><a class="btn btn-warning" href="actualizarCampers.php?id=<?=$val['id']?>">Editar</a></td>
          </tr>
            <?php } ?>
          </tbody>
        
        </table>



    </div>

   




    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Factura</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarEstudiantes.php" method="post">
              <div class="mb-1 col-12">
                <label for="idfactura" class="form-label">ID Factura</label>
                <input 
                  type="number"
                  id="idfactura"
                  name="idfactura"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="idempleado" class="form-label">ID Empleado</label>
                <input 
                  type="number"
                  id="idempleado"
                  name="idempleado"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="idcliente" class="form-label">ID Cliente</label>
                <input 
                  type="text"
                  id="idcliente"
                  name="idcliente"
                  class="form-control"  
                />
              </div>

            
            
              

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>