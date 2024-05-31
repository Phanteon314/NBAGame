document.addEventListener('DOMContentLoaded', () => {
    var nuevoJugador = document.getElementById('nuevoJugador');

    var seleccionado = document.getElementById('seleccionado');

    var caja1 = document.getElementById('caja1');
    var caja2 = document.getElementById('caja2');
    var caja3 = document.getElementById('caja3');
    var caja4 = document.getElementById('caja4');

    const compra1 = document.getElementById('compra1');
    const compra2 = document.getElementById('compra2');
    const compra3 = document.getElementById('compra3');
    const compra4 = document.getElementById('compra4');


    caja1.addEventListener('click', (event) => {   
        seleccionado.classList.remove("caja2");
        seleccionado.classList.remove("caja3");
        seleccionado.classList.remove("caja4");
        seleccionado.classList.add("caja1");
    });
    caja2.addEventListener('click', (event) => {   
        seleccionado.classList.remove("caja1");
        seleccionado.classList.remove("caja3");
        seleccionado.classList.remove("caja4");
        seleccionado.classList.add("caja2");
    });
    caja3.addEventListener('click', (event) => {   
        seleccionado.classList.remove("caja1");
        seleccionado.classList.remove("caja2");
        seleccionado.classList.remove("caja4");
        seleccionado.classList.add("caja3");
    });
    caja4.addEventListener('click', (event) => {   
        seleccionado.classList.remove("caja1");
        seleccionado.classList.remove("caja2");
        seleccionado.classList.remove("caja3");
        seleccionado.classList.add("caja4");
    });

});


function nuevoJugador(element) {

    const botonCrear = document.getElementById('guardarMazo');

    const noDisponibles1 = document.getElementById('noDisponibles1');
    const noDisponibles2 = document.getElementById('noDisponibles2');
    const noDisponibles3 = document.getElementById('noDisponibles3');
    const noDisponibles4 = document.getElementById('noDisponibles4');

    element.style.display = "none";

    const idCompra = element.querySelector('#idCompra').innerHTML;
    const fotoJugador = element.querySelector('#fotoJugador').innerHTML;

    if (seleccionado.classList.contains("caja1")) {

        if (noDisponibles1.classList == "") {
            noDisponibles1.classList.add("caja1-"+idCompra);
        } else {

            const cajaPrevia = noDisponibles1.classList[0];
            const division = cajaPrevia.split("-");
            const idCajaPrevia = division[1];

            const cajaPreviaElement = document.getElementById(idCajaPrevia);
            cajaPreviaElement.style.display = "block";

            while (noDisponibles1.classList.length > 0) {
                noDisponibles1.classList.remove(noDisponibles1.classList.item(0));
            }
            const text = noDisponibles1.classList[0];
            noDisponibles1.classList.add("caja1-"+idCompra);
            noDisponibles1.classList.remove();
        }

        compra1.value = idCompra;
        if (compra1.value != "" && compra2.value != "" && compra3.value != "" && compra4.value != "") {
            botonCrear.disabled = false;
        } else {
            botonCrear.disabled = true;
        }
        cajaImagen = document.getElementById('caja1').querySelector("img");
        cajaImagen.src = "http://localhost:8012/laravel/NBAGame/public/images/cartas/"+fotoJugador+"";
    } 
    if (seleccionado.classList.contains("caja2")) {
        
        if (noDisponibles2.classList == "") {
            noDisponibles2.classList.add("caja2-"+idCompra);
        } else {

            const cajaPrevia = noDisponibles2.classList[0];
            const division = cajaPrevia.split("-");
            const idCajaPrevia = division[1];

            const cajaPreviaElement = document.getElementById(idCajaPrevia);

            cajaPreviaElement.style.display = "block";

            while (noDisponibles2.classList.length > 0) {
                noDisponibles2.classList.remove(noDisponibles2.classList.item(0));
            }
            const text = noDisponibles2.classList[0];
            noDisponibles2.classList.add("caja2-"+idCompra);
            noDisponibles2.classList.remove();
        }

        compra2.value = idCompra;
        if (compra1.value != "" && compra2.value != "" && compra3.value != "" && compra4.value != "") {
            botonCrear.disabled = false;
        } else {
            botonCrear.disabled = true;
        }
        cajaImagen = document.getElementById('caja2').querySelector("img");
        cajaImagen.src = "http://localhost:8012/laravel/NBAGame/public/images/cartas/"+fotoJugador+"";
    } 
    if (seleccionado.classList.contains("caja3")) {

        if (noDisponibles3.classList == "") {
            noDisponibles3.classList.add("caja3-"+idCompra);
        } else {

            const cajaPrevia = noDisponibles3.classList[0];
            const division = cajaPrevia.split("-");
            const idCajaPrevia = division[1];

            const cajaPreviaElement = document.getElementById(idCajaPrevia);

            cajaPreviaElement.style.display = "block";

            const compra3 = document.getElementById('compra3');
            compra3.value = idCompra;

            while (noDisponibles3.classList.length > 0) {
                noDisponibles3.classList.remove(noDisponibles3.classList.item(0));
            }
            const text = noDisponibles3.classList[0];
            noDisponibles3.classList.add("caja3-"+idCompra);
            noDisponibles3.classList.remove();
        }
        
        compra3.value = idCompra;
        if (compra1.value != "" && compra2.value != "" && compra3.value != "" && compra4.value != "") {
            botonCrear.disabled = false;
        } else {
            botonCrear.disabled = true;
        }
        cajaImagen = document.getElementById('caja3').querySelector("img");
        cajaImagen.src = "http://localhost:8012/laravel/NBAGame/public/images/cartas/"+fotoJugador+"";
    } 
    if (seleccionado.classList.contains("caja4")) {

        if (noDisponibles4.classList == "") {
            noDisponibles4.classList.add("caja4-"+idCompra);
        } else {

            const cajaPrevia = noDisponibles4.classList[0];
            const division = cajaPrevia.split("-");
            const idCajaPrevia = division[1];
            const cajaPreviaElement = document.getElementById(idCajaPrevia);

            cajaPreviaElement.style.display = "block";

            while (noDisponibles4.classList.length > 0) {
                noDisponibles4.classList.remove(noDisponibles4.classList.item(0));
            }
            const text = noDisponibles4.classList[0];
            noDisponibles4.classList.add("caja4-"+idCompra);
            noDisponibles4.classList.remove();
        }
        
        compra4.value = idCompra;
        if (compra1.value != "" && compra2.value != "" && compra3.value != "" && compra4.value != "") {
            botonCrear.disabled = false;
        } else {
            botonCrear.disabled = true;
        }
        cajaImagen = document.getElementById('caja4').querySelector("img");
        cajaImagen.src = "http://localhost:8012/laravel/NBAGame/public/images/cartas/"+fotoJugador+"";
    } 
};

function dragWord(event){
    event.dataTransfer.setData("Id", event.target.id+"|"+event.target.parentNode.id);
}                   
function dropWord(event){ 
    var dropData = event.dataTransfer.getData("Id");
    
    dropItems = dropData.split("|"); 
    var prevElem = document.getElementById(dropItems[1]); 

    var fin = event.target.src;
    var salida = prevElem.getElementsByTagName("img")[0].src;

    event.target.src = salida;
    prevElem.getElementsByTagName("img")[0].src = fin;

    prevElem.getElementsByTagName("img")[0].id = event.target.id;
    event.target.id = prevElem.getElementsByTagName("img")[0].id; 

    event.target.id = dropItems[0]; 
    event.preventDefault(); 
} 


