<?php
$id = $_POST['id'];
$venta = (!empty($_POST['venta']))?$_POST['venta']:"";

try{
    $conexion = new PDO("mysql:host=localhost;dbname=inventario","root","");
    
    
        $sqlQ=$conexion->prepare("SELECT cantidad FROM productos WHERE id=:id");
        $sqlQ->bindParam(':id',$id);
        $sqlQ->execute();
        $result = $sqlQ->fetch(PDO::FETCH_ASSOC);
        $cantidad=$result['cantidad'];

        $query =$conexion->prepare("UPDATE productos SET cantidad=:cantidad WHERE id=:id");
        $query->bindParam(':id',$id);
        $cantidad-=$venta;
        $query->bindParam(':cantidad',$cantidad);
        $query->execute();


        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $preciocompra = ($_POST['precioventa'] - $_POST['preciocompra']) * $venta;
        $precioventa = $_POST['precioventa'] * $venta;
        $cantidadventa = $venta;
        $fecha=date("Y-m-d H:i:s");


        $query1 = $conexion->prepare("INSERT INTO almacen(id, nombre, codigo, preciocompra, precioventa, cantidadventa, fecha) VALUES(:id, :nombre, :codigo, :preciocompra, :precioventa, :cantidadventa, :fecha)");
        $query1->bindParam(':id', $id);
        $query1->bindParam(':nombre', $nombre);
        $query1->bindParam(':codigo', $codigo);
        $query1->bindParam(':preciocompra', $preciocompra);
        $query1->bindParam(':precioventa', $precioventa);
        $query1->bindParam(':cantidadventa', $cantidadventa);
        $query1->bindParam(':fecha', $fecha);
        $query1->execute();


    header("Location: index.php");
    }catch(PDOException $e){
        echo $e->getMessage()."<br>";
        die();
    }

   
    // preciocompra= ganancia
    // precioventa= ganancia bruta

    