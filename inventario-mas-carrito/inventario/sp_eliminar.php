<?php
$id = $_GET['id'];


    $conexion=mysqli_connect('localhost','root','','inventario');
    $sql = "DELETE FROM productos WHERE id='$id'";
    $result = mysqli_query($conexion, $sql);

    if(!$result){
        echo "No se  elimino!";
    }
    else{
        header("Location: index.php");
    }
   
?>