<?php
require_once 'model/ingreso.php';
require_once 'model/usuario.php';
require_once 'model/impresora.php';

$ingreso = new ingreso();
$c_usuario = new usuario();
$c_impresora = new impresora();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boostrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Ingreso de Imprsiones</title>
</head>

<body>


  <div class="container">
    <div class="form">

      <form class="formulario" method="post" action="controller/ingreso.php">
        <h4>Registro de Ingresos</h4>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Ingrese Usuario</label>
          <select class="form-control" name="usuario" id="exampleFormControlSelect1">
            <?php
            foreach ($c_usuario->verFilas() as $fila) {
            ?>
              <option value="<?php echo $fila['id'] ?>"><?php echo $fila['name'] ?></option>
            <?php
            }
            
                   ?>


          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Impresora</label>
          <select class="form-control" name="impresora" id="exampleFormControlSelect1">
            <?php
            foreach ($c_impresora->verFilas() as $fila) {
            ?>
              <option value="<?php echo $fila['id'] ?>"><?php echo $fila['name_print'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Monto</label>
          <input type="number" name="monto" class="form-control" id="formGroupExampleInput" placeholder="Ingrese monto">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Cliente</label>
          <input type="text" name="cliente" class="form-control" id="formGroupExampleInput" placeholder="Ingrese nombre del cliente">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-danger btn-block " >Guardar</button>
          <a type="button" class=" btn btn-outline-primary mt-2 btn-block" href="ver_ingreso.php" >Ventas</a>
         
        </div>

      
      </form>
     

    </div>
  </div>


  <!-- Boostrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="js/mensaje.js"></script>
</body>

</html>