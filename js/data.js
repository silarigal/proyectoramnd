/*
    DATA.JS – REGISTRO DE VUELOS SOLO CON LOCALSTORAGE
*/

console.log("✅ VERSIÓN data.js ACTUALIZADA");

// Estructura del vuelo actual
let vueloActual = {
    desde: null,
    hacia: null,
    fecha: null
};


/* ------------------------------
   FUNCIÓN PRINCIPAL: insertData
------------------------------ */
function insertData(data) {

    if (data.startsWith("Desde:")) {

        vueloActual = { desde: null, hacia: null, fecha: null };

        const match = data.match(/\((.*?)\)\s*\((.*?)\)/);

        if (match) {
            vueloActual.desde = { codigo: match[1], ciudad: match[2] };

            $("#desde").html(vueloActual.desde.codigo);
            $("#origen1").html(vueloActual.desde.ciudad);
        }

        $("#modalDesde").hide();
        $("#modalHasta").fadeIn();
    }

    else if (data.startsWith("Hacia:")) {

        const match = data.match(/\((.*?)\)\s*\((.*?)\)/);

        if (match) {
            vueloActual.hacia = { codigo: match[1], ciudad: match[2] };

            $("#hacia").html(vueloActual.hacia.codigo);
            $("#origen2").html(vueloActual.hacia.ciudad);
        }

        $("#modalHasta").hide();

        const tipo = $('input[name="radio-group"]:checked').val();
        if (tipo === "rango") $("#modalC1").show();
        else $("#modalC2").show();
    }

    else if (data.startsWith("Fecha:")) {

        const match = data.match(/\(([^()]*)\)$/);

        if (match) {
            vueloActual.fecha = match[1];
            $("#fecha").html(vueloActual.fecha);
        }

        $("#modalC1").hide();
        $("#modalC2").hide();

        guardarVuelo(vueloActual);
    }

    console.log("🟡 Vuelo en edición:", vueloActual);
}


/* ------------------------------
   GUARDAR SOLO EN LOCALSTORAGE
------------------------------ */
function guardarVuelo(vuelo) {

    // Guardar lista completa
    let vuelos = JSON.parse(localStorage.getItem("vuelosGuardados")) || [];
    vuelos.push(vuelo);
    localStorage.setItem("vuelosGuardados", JSON.stringify(vuelos));

    // Guardar último vuelo
    localStorage.setItem("datosVuelo", JSON.stringify(vuelo));

   
    console.log("📦 Lista completa:", vuelos);

   
}



function buscarVuelos() {

    // Validar que existan datos
    const raw = localStorage.getItem("vuelosGuardados");
    if (!raw) {
        alert("Debes seleccionar origen, destino y fecha antes de continuar.");
        return;
    }

    let lista;
    try {
        lista = JSON.parse(raw);
    } catch {
        alert("Error leyendo los datos del vuelo.");
        return;
    }

    if (!Array.isArray(lista) || lista.length === 0) {
        alert("Debes seleccionar un vuelo primero.");
        return;
    }

    const ultimo = lista[lista.length - 1];

    if (!ultimo.desde || !ultimo.hacia || !ultimo.fecha) {
        alert("Información incompleta. Selecciona origen, destino y fecha.");
        return;
    }

   /* ============================
       MOSTRAR LOADER
   ============================ */
const loader = document.getElementById("loadingScreen");

// Agregar la clase que lo activa (display:flex)
loader.classList.add("show");

// Animación fade con jQuery (sin romper flex)
$(loader).hide().fadeIn(200);

/* ============================
       REDIRECCIÓN
   ============================ */
setTimeout(() => {
    window.location.href = "booking.php";
}, 3000); // <-- 3000 ms = 3 segundos

}
