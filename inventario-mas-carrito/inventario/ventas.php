<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>

<?php
$id = (!empty($_GET['id']))?$_GET['id']:"";
$nombre = (!empty($_GET['nombre']))?$_GET['nombre']:"";
$codigo = (!empty($_GET['codigo']))?$_GET['codigo']:"";
$preciocompra = (!empty($_GET['preciocompra']))?$_GET['preciocompra']:"";
$precioventa = (!empty($_GET['precioventa']))?$_GET['precioventa']:"";

$boton = (!empty($_POST['boton']))?$_POST['boton']:"";
// $id_e = (!empty($_POST['id_e']))?$_POST['id_e']:"";

$conexion=mysqli_connect('localhost','root','','inventario');


?>
    <form action="sp_venta.php" method="post" id="form-rep">
        
        <div class="struc">
            <div class="containe bg-white rounded shadow p-4 col-xl-4 col-lg-6">
                <div class="mb-3">
                    <label>ID</label>
                    <input class="form-control" type="text"  name="id[]" value="<?=$id?>"> 
                </div>
                <div class="mb-3">
                    <label>Nombre</label>
                    <input class="form-control" type="text"  name="nombre[]" id="" value="<?=$nombre?>">
                </div>
                <div class="mb-3">
                    <label>Codigo de Barra</label>
                    <input class="form-control" type="text"  name="codigo[]" id="" value="<?=$codigo?>">
                </div>
                <div class="mb-3">
                    <label>Precio de Compra</label>
                    <input class="form-control" type="text"  name="preciocompra[]" id="" value="<?=$preciocompra?>">
                </div>
                <div class="mb-3">
                    <label>Precio de Venta</label>
                    <input class="form-control" type="text"  name="precioventa[]" id="" value="<?=$precioventa?>">
                </div>
                <div class="mb-3">
                    <label>Cantidad a vender</label>
                    <input class="form-control" type="number" name="venta[]" id="">
                </div>
                <br>
                <div class="butoneditar">
                    <input class="btn btn-success" type="submit" value="Vender">
                    <a class="btn btn-light" href="index.php">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
    <div>

            <button class="magic-btn" id="boton" type="button" onclick="aggFormularios()" name="boton" value="">Agregar otra venta</button> 
        
    </div>
    <?php 


    ?>
<script type="text/javascript" src="workshop.js"></script>
</body>
</html>