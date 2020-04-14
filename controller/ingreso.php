<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            background: #fff;

            padding: 20px 40px;
            outline: 1px solid #1F4CA6;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 310px;

            text-align: center;

            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>


    <?php

    require '../model/ingreso.php';

    $c_ingreso = new ingreso();
    $l = empty($_POST['cliente']);
    
    if (empty($_POST['cliente']) || empty($_POST['impresora']) || empty($_POST['usuario']) || empty($_POST['monto'])) {
      echo $_POST['cliente'];
      echo $_POST['impresora'];
      echo $_POST['usuario'];
      echo $_POST['monto']
      

    ?>

        <div class="container">
            <section>
                <h4>Ya pe! Ingresa bien los datos</h4>
            </section>
            <section style="text-align:center">
                <a type="button" class="btn btn-warning" href="../index"> Volver a intertarlo </a>
            </section>
        </div>
    <?php
    } else {
        echo "hola";
        $c_ingreso->setDate(date('Y-m-d'));
        $c_ingreso->setHour(date('H:i:s'));
        $c_ingreso->setCliente(filter_input(INPUT_POST, 'cliente'));
        $c_ingreso->setPrint_id(filter_input(INPUT_POST, 'impresora'));
        $c_ingreso->setIdUsuario(filter_input(INPUT_POST, 'usuario'));
        $c_ingreso->setMonto(filter_input(INPUT_POST, 'monto'));


        $c_ingreso->generarCodigo();
        $c_ingreso->insertar();
    ?>

        <div class="container">
            <section>
                <h4>Bien! Se guardaron los datos</h4>
            </section>
            <section style="text-align:center">
                <a type="button" class="btn btn-warning" href="../index"> Ingresar Otra Venta </a>
            </section>
        </div>
    <?php
    }





    // header("Location: ../index.php");
    ?>


</body>
<!-- Boostrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>