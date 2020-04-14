<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hola</title>
</head>

<body>
    <?php
    require_once "model/ingreso.php";;

    $o_ingreso = new ingreso();
    $datos = $o_ingreso->verFilas();

    ?>
    <div class="container">

        <div class="tabla" style="  margin: 100px auto;
    ">
            <h4>Lista de Ventas</h4>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Impresora</th>
                        <th scope="col">Monto</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    $suma_total = 0;
                    foreach ($datos as $fila) {
                        $suma_total += $fila['monto'];
                    ?><tr>
                            <th scope="row"> <?php echo $fila['usuario']; ?> </th>
                            <td> <?php echo $fila['date']; ?> </td>
                            <td> <?php echo $fila['hour']; ?> </td>
                            <td> <?php echo $fila['cliente']; ?> </td>

                            <td> <?php echo $fila['impresora']; ?> </td>
                            <td> <?php echo $fila['monto']; ?> </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th scope="text-left"> Total</th>
                        <td><?php echo number_format($suma_total, 2) ?></td>

                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
    <!-- Boostrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/mensaje.js"></script>
</body>

</html>