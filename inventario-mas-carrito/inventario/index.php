<?php
    require('funciones.php');
    $conexion=mysqli_connect('localhost','root','','inventario');
    $accion = (isset($_POST['boton']))?$_POST['boton']:"";
    $id = (isset($_POST['id_p']))?$_POST['id_p']:"";
    // carrito
    $carritoLleno = mostrarCantidadArticulos();
    if($accion=="Vender"){
        seleccionarVentas($id);
        header('Location: index.php');
    }

    // 
    $mensaje = codigoAzar(10,30,2);

        $codigo = "A".$mensaje[0]."H".$mensaje[1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nona Elena</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="title_menu">
        <h1>Nona Elena</h1>
    </div>
    <div class="almacen_button">
        <a class="btn btn-info" href="almacen.php">Almacen</a>
    </div>
    <?php if(!empty($carritoLleno)){ ?>
    <div class="carrito">
        <img src="" alt="carrito">
        <h6><?php echo $carritoLleno; ?></h6>
        <a href="carrito.php">Ver Carrito</a>
    </div>
    <?php } ?>
    <form action="insertar.php" method="post">
        <div class="cont">
            <div class="containe bg-white rounded shadow p-4 col-xl-4 col-lg-6">
                <div>
                    <h2>Registrar inventario</h2>
                </div>
                <br>
                <div class="mb-3">
                    <input class="form-control" placeholder="ID" type="text" name="id" readonly="readonly">
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Nombre" type="text" name="nombre" id="">
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Cantidad" type="text" name="cantidad" id="">
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Precio de compra" type="text" name="preciocompra" id="">
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Precio de venta" type="text" name="precioventa" id="">
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Codigo de barra" type="text" name="codigo" id="">
                </div>

                <br>
                <div class="boton">
                    <input class="btn btn-secondary" type="submit" value="Enviar Datos">
                </div>
                <br>
                <br>
            </div>
        </div>
    </form>
    <br>
    <div class="buscar">
        <div class="containe bg-white rounded shadow p-4 col-xl-4 col-lg-6">
            <form action="buscador.php" method="post">
                <div class="mb-3">    
                    <input class="form-control" placeholder="Buscar por codigo" type="text" name="buscar" id="">
                    <br>
                    <div class="boton"><input class="btn btn-secondary" type="submit" value="Buscar"></div>
                </div>
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
                    <th>Opciones</th>
                </tr>

                <?php
                $sql = "SELECT * FROM productos order by id";
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
                        <form method="POST">
                            <input type="submit" name="boton" value="Vender">
                            <input type="hidden" name="id_p" value="<?php echo $mostrar['0']?>">
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </thead>
        </table>    
    </div>
     <?php
     if(!empty($codigo)){
        echo var_dump($codigo);
    }
    ?>
</body>
</html>