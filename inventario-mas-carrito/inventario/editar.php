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
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$codigo = $_GET['codigo'];
$preciocompra = $_GET['preciocompra'];
$precioventa = $_GET['precioventa'];
$cantidad = $_GET['cantidad'];

?>

    <form action="sp_editar.php" method="post">
        <div class="struc">
            <div class="containe bg-white rounded shadow p-4 col-xl-4 col-lg-6">
                <div class="mb-3">
                    <label>ID</label>
                    <input class="form-control" type="text" readonly="readonly" name="id" value="<?=$id?>">
                </div>

                <div class="mb-3">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="" value="<?=$nombre?>">
                </div>

                <div class="mb-3">
                    <label>Codigo de Barra</label>
                    <input class="form-control" type="text" name="codigo" id="" value="<?=$codigo?>">
                </div>

                <div class="mb-3">
                    <label>Precio compra</label>
                    <input class="form-control" type="text" name="preciocompra" id="" value="<?=$preciocompra?>">
                </div>

                <div class="mb-3">
                    <label>Precio venta</label>
                    <input class="form-control" type="text" name="precioventa" id="" value="<?=$precioventa?>">
                </div>

                <div class="mb-3">
                    <label>Cantidad</label>
                    <input class="form-control" type="text" name="cantidad" id="" value="<?=$cantidad?>">
                </div>

                <br>

                <div class="butoneditar">
                    <input class="btn btn-secondary" type="submit" value="Actualizar">
                    <a class="btn btn-light" href="index.php">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
    <?php  $test;
    echo var_dump($id);?>
</body>
</html>