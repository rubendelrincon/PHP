// document.addEventListener("DOMContentLoaded", function () {
//     const form = document.getElementById("registroForm");
//     const edadInput = document.getElementById("edad");
//     const planBaseSelect = document.getElementById("plan_base");
//     const duracionSelect = document.getElementById("duracion");
//     const paquetesCheckboxes = document.querySelectorAll("input[name='paquete']");

//     form.addEventListener("submit", function (event) {
//         let edad = parseInt(edadInput.value);
//         let planBase = planBaseSelect.value;
//         let duracion = duracionSelect.value;
//         let paquetesSeleccionados = Array.from(paquetesCheckboxes).filter(p => p.checked).map(p => p.value);

//         // Restricción 1: Usuarios menores de 18 años solo pueden contratar el Pack Infantil
//         if (edad < 18 && paquetesSeleccionados.some(p => p !== "Infantil")) {
//             alert("Usuarios menores de 18 años solo pueden contratar el Pack Infantil");
//             event.preventDefault();
//             return;
//         }

//         // Restricción 2: Usuarios del Plan Básico solo pueden seleccionar un paquete adicional
//         if (planBase === "Basico" && paquetesSeleccionados.length > 1) {
//             alert("Usuarios del Plan Básico solo pueden contratar un paquete adicional");
//             event.preventDefault();
//             return;
//         }

//         // Restricción 3: El Pack Deporte solo puede ser contratado con una suscripción anual
//         if (paquetesSeleccionados.includes("Deporte") && duracion !== "Anual") {
//             alert("El Pack Deporte solo puede ser contratado con suscripción anual");
//             event.preventDefault();
//             return;
//         }
//     });
// });



document.getElementById('registroForm').addEventListener('submit', function(event) {
    // Obtener los valores de los campos
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const email = document.getElementById('email').value.trim();
    const edad = parseInt(document.getElementById('edad').value.trim());
    const plan_base = document.getElementById('plan_base').value.trim();
    const duracion = document.getElementById('duracion').value.trim();
    
    // Verificar si se ha seleccionado algún paquete adicional
    const paquetes = document.querySelectorAll('input[name="paquete[]"]:checked');
    const paquetesSeleccionados = Array.from(paquetes).map(paquete => paquete.value);

    // Validaciones
    if (!nombre || !apellido || !email || !edad || !plan_base || !duracion) {
        alert('Por favor, completa todos los campos.');
        event.preventDefault(); // Prevenir envío
    } 
    else if (!email.includes('@')) {
        alert('Por favor, introduce un correo electrónico válido.');
        event.preventDefault(); // Prevenir envío
    } 
    else if (edad < 18 && plan_base !== "Infantil" && paquetesSeleccionados.length > 0) {
        alert('Para seleccionar un plan distinto al infantil, debes ser mayor de edad.');
        event.preventDefault(); // Prevenir envío
    }
    else if (paquetesSeleccionados.includes("Deporte") && duracion !== "Anual") {
        alert('Para seleccionar el paquete de deportes, la duración debe ser anual.');
        event.preventDefault(); // Prevenir envío
    }
});
