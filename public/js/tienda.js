document.addEventListener('DOMContentLoaded', () => {
    const exampleModal = document.getElementById('exampleModal')
    const comprar = document.getElementById('enlaceComprar')

    exampleModal.addEventListener('show.bs.modal', event => {

        const button = event.relatedTarget

        const nombre = button.getAttribute('data-bs-nombre')
        const precio = button.getAttribute('data-bs-precio')
        const img = button.getAttribute('data-bs-img')

        const imgElement = document.getElementById('imagenCompra');
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelectorAll('.modal-body input')

        const nombreInput = modalBodyInput[1];
        const precioInput = modalBodyInput[2];
        console.log(nombreInput)
        console.log(precioInput)

        modalTitle.textContent = 'Comprar '+nombre+' por '+precio+'€'
        nombreInput.value = nombre
        precioInput.value = precio
        imgElement.src = img;

    })

    comprar.addEventListener('click', (event) => {
        event.preventDefault();

        formularioCompra = document.getElementById('formularioCompra');
        formularioCompra.submit();
    })
});