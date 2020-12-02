"use strict"
const talba = document.getElementById('tablita');
const usuario = document.querySelector('input[name="usuario"]').value;



document.addEventListener('DOMContentLoaded', () => {
    getComentarios();

    document.getElementById('formcomentar').addEventListener('submit', e => {

        e.preventDefault();
        addcomentario();
    });


});

function getComentarios() {

    let idproductos = document.querySelector('input[name="idproductos"]').value;
    fetch('http://localhost/TPEWEB/api/comentarios/' + idproductos)
        .then(response => response.json())
        .then(comentarios => render(comentarios))
        .catch(error => console.log(error));
}

function addcomentario() {
    const comentarios = {

        comentario: document.querySelector('input[name="comentario"]').value,
        puntaje: document.querySelector('select[name="puntaje"]').value,
        id_productos: document.querySelector('input[name="idproductos"]').value
    }
    fetch('http://localhost/TPEWEB/api/comentarios', {
        "method": 'POST',
        "headers": { 'Content-type': 'application/json' },
        "body": JSON.stringify(comentarios)
    })
        .then(response => response.json())
        .then(comentarios => getComentarios())
        .catch(error => console.log(error));
}


function eliminar(id) {
    fetch("http://localhost/TPEWEB/api/comentarios" + "/" + id, {
        "method": "DELETE",
        "mode": "cors",
    }).then(response => response.json())
        .then(function () {
            getComentarios();
        }).then(function (e) {
            console.log(e);
        })
}





function render(comentarios) {
    if (comentarios.lenght != 0) {
        document.getElementById('tabladecomentarios').classList.remove("ocultar");
        talba.innerHTML = "";


        const contenedor = document.querySelector('#contenedor');
        for (let comentario of comentarios) {


            let boton = document.createElement("button");
            boton.innerText = "BORRAR COMENTARIO";
            let nodoTr = document.createElement("tr");
            let nodoTd1 = document.createElement("td"); // voy a mostrar los comentarios
            let nodoTd2 = document.createElement("td"); // voy a mostrar el puntaje
            let nodoTd3 = document.createElement("td"); // voy a mostrar el boton

            nodoTd1.innerHTML = `${comentario.comentario}`;
            nodoTd2.innerHTML = `${comentario.puntaje}`;
            
            talba.appendChild(nodoTr);

            nodoTd1.id = comentario.id;

            nodoTr.appendChild(nodoTd1);
            nodoTr.appendChild(nodoTd2);
            nodoTr.appendChild(nodoTd3);

            
            if(usuario == 1){
            nodoTd3.appendChild(boton);
            nodoTr.appendChild(boton);
            boton.addEventListener('click', e => eliminar(comentario.id))
            }
        }
    }else{
        document.getElementById('tabladecomentarios').classList.add("ocultar");
    }
}





