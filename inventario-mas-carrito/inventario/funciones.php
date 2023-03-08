<?php 

function crearConexion(){

$DB_DRIVER = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "inventario";
$DB_LOGIN = "root";
$DB_PASS = ""; //OpenServer.
$connectionString = $DB_DRIVER.':host='.$DB_HOST.';dbname='.$DB_NAME;
	try{
		$conexion= new PDO($connectionString, $DB_LOGIN, $DB_PASS);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		return $conexion;
		}catch(PDOException $e){
		return die("Error: ".$e->getMessage());

	}
}

function seleccionarVentas($id){
$conexion=crearConexion();
	$venta = (isset($_POST['boton']))?$_POST['boton']:"";
	
	try{

		$SQL=$conexion->prepare("INSERT INTO carrito( nombre, precioventa, preciocompra, codigo) SELECT nombre, precioventa, preciocompra, codigo FROM productos WHERE id=:id");
		$SQL->bindParam(":id",$id);
		$SQL->execute();
		return $SQL;

	}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}

}

function mostrarCantidadArticulos(){
	$conexion=crearConexion();
	try{
		$SQL=$conexion->prepare("SELECT * FROM carrito");
		$SQL->execute();
		$cuenta = $SQL->rowCount();
		return $cuenta;

	}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}
}

function mostrarTablaArticulos(){
$conexion=crearConexion();
try{
	$SQL = $conexion->prepare("SELECT * FROM carrito");
	$SQL->execute();
	$fetch = $SQL->fetchAll(PDO::FETCH_ASSOC);

	return $fetch;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}
}

function actualizarCarrito($id,$cantidad){
	$conexion=crearConexion();
	$fecha = date("Y-m-d");

	try{
		$SQL = $conexion->prepare("UPDATE carrito SET fecha=:fecha, cantidad=:cantidad WHERE id=:id");
		$SQL->bindParam(":fecha",$fecha);
		$SQL->bindParam(":cantidad",$cantidad);
		$SQL->bindParam(":id",$id);
		$SQL->execute();


	return $SQL;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}
}

function borrarArticulo($id){
	$conexion=crearConexion();

	try{
		$SQL = $conexion->prepare("DELETE FROM carrito WHERE id=:id");
		$SQL->bindParam(":id",$id);
		$SQL->execute();


	return $SQL;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}
}

function mostrarPrecioCarrito(){
$conexion=crearConexion();
$total=0;
	try{
		$SQL = $conexion->prepare("SELECT precioventa,cantidad FROM carrito");
		$SQL->execute();
		$fetch = $SQL->fetchAll(PDO::FETCH_ASSOC);
		foreach ($fetch as $muestra => $value) {
			$total += $value['precioventa']*$value['cantidad'];
		}

	return $total;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
 }

}

function venderProductosCarrito(){
$conexion=crearConexion();
acomodarArticulosCarrito();
	try{
		$SQL = $conexion->prepare('INSERT INTO almacen (nombre, preciocompra, precioventa, codigo, 
								  cantidadventa, fecha) SELECT nombre, preciocompra, precioventa, codigo, 
								  cantidad, fecha FROM carrito');
		$SQL->execute();


	return $SQL;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
 }

}

function acomodarArticulosCarrito(){
$conexion=crearConexion();

	try{
		$SQL = $conexion->prepare("SELECT id, precioventa, preciocompra, cantidad, codigo FROM carrito");
		$SQL->execute();
		$fetch = $SQL->fetchAll(PDO::FETCH_ASSOC);

		foreach ($fetch as $key => $value) {
			$id = $value['id'];
			$neto = ($value['precioventa'] - $value['preciocompra']) * $value['cantidad'];
			$bruto = $value['precioventa'] * $value['cantidad'];
			$codigo = $value['codigo'];

			restarArticulosAProductos($codigo,$value['cantidad']);

			$SQL2 = $conexion->prepare("UPDATE carrito SET precioventa=:neto, preciocompra=:bruto
			 WHERE id=:id");
			$SQL2->bindParam(":id",$id);
			$SQL2->bindParam(":neto",$neto);
			$SQL2->bindParam(":bruto",$bruto);
			$SQL2->execute();
		}
	return $SQL2;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
 }
}

function limpiarCarrito(){
$conexion=crearConexion();

	try{
		$SQL = $conexion->prepare("DELETE FROM carrito WHERE id >= 0");
		$SQL->execute();


	return $SQL;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}
}

function restarArticulosAProductos($codigo,$cantidad){
$conexion=crearConexion();

	try{
		$SQL2 = $conexion->prepare("SELECT cantidad FROM productos WHERE codigo=:codigo");
		$SQL2->bindParam(":codigo",$codigo);
		$SQL2->execute();
		$fetch = $SQL2->fetch(PDO::FETCH_ASSOC);
		$cantidad = $fetch['cantidad'] - $cantidad;

		$SQL = $conexion->prepare("UPDATE productos SET cantidad=:cantidad WHERE codigo=:codigo");
		$SQL->bindParam(":codigo",$codigo);
		$SQL->bindParam(":cantidad",$cantidad);
		$SQL->execute();


	return $SQL;
}catch(PDOException $e){
		return die("Error: ".$e->getMessage());
	}

}

function codigoAzar($min,$max,$count){
	$nums = range($min, $max);
	shuffle($nums);
	
	$response = array();
	for($i=0;$i<$count && $i<count($nums);$i++)
	{
		array_push($response, $nums[$i]);
	}
	
	return $response;
}

function eliminarSession(){
	session_start();

	session_unset();
	
	session_destroy();
}

?>