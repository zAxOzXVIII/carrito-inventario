<?php
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$preciocompra = $_POST['preciocompra'];
$precioventa = $_POST['precioventa'];
$cantidad = $_POST['cantidad'];

    $conexion=mysqli_connect('localhost','root','','inventario');
    $sql = "INSERT INTO productos(nombre, codigo, preciocompra, precioventa, cantidad) VALUES('$nombre', '$codigo', '$preciocompra', '$precioventa', '$cantidad')";
    $result = mysqli_query($conexion, $sql);

    if(!$result){
        echo "No se  inserto!";
    }
    else{
        header("Location:index.php");
    }
?>