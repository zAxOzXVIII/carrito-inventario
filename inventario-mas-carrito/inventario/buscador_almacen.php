<?php

    $conexion=mysqli_connect('localhost','root','','inventario');
    $busqueda = (isset($_POST['busqueda']))?$_POST['busqueda']:"";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Nona Elena</title>
</head>
<body>
    <a class="btn btn-light" href="index.php">Volver al menu</a><br>
    <div class="busquedafecha">
        <div class="containe bg-white rounded shadow p-2 col-xl-2 col-lg-3">
            <form action="buscador_almacen.php" method="POST">    
                <div class="mb-3"><input class="form-control" type="date" name="busqueda" id=""></div>
                <input class="btn btn-secondary form-control" type="submit" name="boton" value="Buscar">
            </form>
        </div>
    </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del producto</th>
                    <th>Codigo de Barra</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Cantidad Disponible</th>
                    <th>Fecha</th>
                </tr>

                <?php
                $sql = "SELECT * FROM almacen where fecha like '$busqueda' '%' order by id desc";
                $result = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_row($result)){
                 ?>
                <tr>
                    <td><?php echo $mostrar['0']?></td>
                    <td><?php echo $mostrar['1']?></td>
                    <td><?php echo $mostrar['2']?></td>
                    <td><?php echo $mostrar['3']?></td>
                    <td><?php echo $mostrar['4']?></td>
                    <td><?php echo $mostrar['5']?></td>
                    <td>
                        <?php echo $mostrar['6']?>
                    </td>
                </tr>
                <?php
                }
                echo var_dump($busqueda);
                ?>
            </thead>
        </table>    
    </div>
</body>
</html>