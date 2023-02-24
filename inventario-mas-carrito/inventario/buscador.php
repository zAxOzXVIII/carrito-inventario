<?php

    $conexion=mysqli_connect('localhost','root','','inventario');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Nona Elena</title>
</head>
<body>
    <a class="mb-3 btn btn-light" href="index.php">Pagina principal</a>

        <div class="containe bg-white rounded shadow p-2 col-xl-2 col-lg-3">
            <form action="buscador.php" method="post">    
                <div class="mb-3"><input class="form-control" placeholder="Buscar por codigo" type="text" name="buscar" id=""></div>
                <input class="btn btn-secondary form-control" type="submit" value="Buscar">
            </form>
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
                    <th>Opciones</th>
                </tr>

                <?php
                $buscar = $_POST['buscar'];
                $sql = "SELECT * FROM productos where codigo like '$buscar' '%' order by id desc";
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
                        <a href="editar.php?
                        id=<?php echo $mostrar['0']?> &
                        nombre=<?php echo $mostrar['1']?> &
                        codigo=<?php echo $mostrar['2']?> &
                        preciocompra=<?php echo $mostrar['3']?> &
                        precioventa=<?php echo $mostrar['4']?> &
                        cantidad=<?php echo $mostrar['5']?>
                        ">Editar</a>
                        <a href="sp_eliminar.php?
                        id=<?php echo $mostrar['0']?>
                        ">Eliminar</a>
                        <a href="ventas.php?
                        id=<?php echo $mostrar['0']?> &
                        nombre=<?php echo $mostrar['1']?> &
                        preciocompra=<?php echo $mostrar['2']?> &
                        precioventa=<?php echo $mostrar['3']?> &
                        codigo=<?php echo $mostrar['4']?>
                        ">Vender</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </thead>
        </table>    
    </div>
</body>
</html>