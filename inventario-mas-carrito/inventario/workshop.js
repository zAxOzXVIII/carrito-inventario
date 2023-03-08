"use strict";

function verificarCodigo(){
    let busqueda=document.getElementById("busqueda");
    let boton=document.getElementById("boton");
    if(length(busqueda.value)<=0){
        boton.addEventListener("load",function(){
            e.preventDefault();
            alert("Llene el formulario");
        })
    }
}

