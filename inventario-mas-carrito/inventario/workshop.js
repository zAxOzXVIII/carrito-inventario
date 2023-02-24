"use strict";

const formulario = document.getElementById("form-rep");


function aggFormularios() {
	const nuevo = document.createElement("div");
	nuevo.innerHTML = ` 
		<div class="struc">
            <div class="containe bg-white rounded shadow p-4 col-xl-4 col-lg-6">
                <div class="mb-3">
                    <label>ID</label>
                    <input class="form-control" type="text"  name="id[]" value=""> 
                </div>
                <div class="mb-3">
                    <label>Nombre</label>
                    <input class="form-control" type="text"  name="nombre[]" id="" value="">
                </div>
                <div class="mb-3">
                    <label>Codigo de Barra</label>
                    <input class="form-control" type="text"  name="codigo[]" id="" value="">
                </div>
                <div class="mb-3">
                    <label>Precio de Compra</label>
                    <input class="form-control" type="text"  name="preciocompra[]" id="" value="">
                </div>
                <div class="mb-3">
                    <label>Precio de Venta</label>
                    <input class="form-control" type="text"  name="precioventa[]" id="" value="">
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
	`;
	formulario.appendChild(nuevo);
}