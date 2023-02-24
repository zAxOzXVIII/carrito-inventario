<?php 
try{
 $conexion=mysqli_connect('localhost','root','','inventario');
}catch(Exception $e){
    get_message($e);
}
$busqueda = (isset($_POST['busqueda']))?$_POST['busqueda']:"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Almacen</title>
</head>
<body>
    <div><a class="btn btn-light" href="index.php">Pagina principal</a></div>
    <br>
    <div>
        <form action="buscador_almacen.php" action="POST">
            <label for="busqueda">Busqueda por fecha</label>
            <input class="btn btn-secondary" type="submit" name="boton" value="Buscar">
        </form>
        <?php 
        
        ?>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del producto</th>
                <th>Codigo de Barra</th>
                <th>Ganancia Neta</th>
                <th>Ganancia Bruta</th>
                <th>Cantidad Vendida</th>
                <th>Fecha Vendida</th>
            </tr>
            <?php
            $sql = "SELECT * FROM almacen order by fecha";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_row($result)){
            ?>
            <tr>
                    <td><?php echo $mostrar['0']?></td>
                    <td><?php echo $mostrar['1']?></td>
                    <td><?php echo $mostrar['2']?></td>
                    <td><?php echo $mostrar['4']?></td>
                    <td><?php echo $mostrar['3']?></td>
                    <td><?php echo $mostrar['5']?></td>
                    <td><?php echo $mostrar['6']?></td>
            
            <?php
            }
            ?>
        </thead>
    </table>
</body>
</html>