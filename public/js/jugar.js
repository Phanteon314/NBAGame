document.addEventListener('DOMContentLoaded', () => {
    const btnJugar = document.getElementById('btnJugar');
    const contenedorResultado = document.getElementById('contenedorResultado');

    btnJugar.addEventListener('click', () => {
        // Simulación de un proceso
        btnJugar.setAttribute('disabled', 'disabled');
    });
});