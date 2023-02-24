<?php  
require('funciones.php');
$conexion = crearConexion();
$accion = (isset($_POST['boton']))?$_POST['boton']:"";
$id = (isset($_POST['id']))?$_POST['id']:"";

$total = mostrarPrecioCarrito();

switch ($accion) {
	case 'Borrar':
		borrarArticulo($id);
		header('Location: carrito.php');
		break;

	case 'Actualizar':
		$cantidad = (isset($_POST['cantidad']))?$_POST['cantidad']:"";
		if (!empty($id) && !empty($cantidad)) {
			
			actualizarCarrito($id,$cantidad);
			header('Location: carrito.php');
			
		}else{
			echo "llenar campos";
		}

		break;

		case 'Vender':
		venderProductosCarrito();
		limpiarCarrito();
		header('Location: index.php');
		break;
	
	default:
		# code...
		break;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carrito Nona Elena</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nombre Articulo</th>
			<th>Codigo</th>
			<th>Precio Venta</th>
			<th>Cantidad</th>
			<th>Fecha</th>
			<th>Opciones</th>
		</tr>
	<?php 
		$columnas = mostrarTablaArticulos();
		foreach ($columnas as $value ) {
			
		
	?>
		<form method="POST">
		<tr>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['nombre']; ?></td>
			<td><?php echo $value['codigo']; ?></td>
			<td><?php echo $value['precioventa']; ?></td>
			<td><input type="number" name="cantidad" placeholder="<?php echo $value['cantidad']; ?>"></td>
			<td><?php echo $value['fecha']; ?></td>
			<td>
				
				<input type="submit" name="boton" value="Borrar">
				<input type="submit" name="boton" value="Actualizar">
				<input type="hidden" name="id" value="<?php echo $value['id']; ?>">

			</td>
		</tr>
		</form>
	<?php } 
	if(!empty($total)){
	echo var_dump($total);
	}
	?>
	</table>
	<div>
		<form method="POST">
			<input type="submit" name="boton" value="Vender">
			<a href="index.php">Salir de Carrito</a>
		</form>
	</div>
</body>
</html>