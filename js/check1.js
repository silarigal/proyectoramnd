document.addEventListener("DOMContentLoaded", () => {

    let vuelosLS = localStorage.getItem("vuelosGuardados");

    if (!vuelosLS) {
        console.warn("⚠ No hay vuelosGuardados en localStorage");
        return;
    }

    const vuelos = JSON.parse(vuelosLS);

    if (!Array.isArray(vuelos) || vuelos.length === 0) {
        console.warn("⚠ vuelosGuardados está vacío");
        return;
    }

    // TOMAMOS EL ÚLTIMO VUELO REGISTRADO
    const datos = vuelos[vuelos.length - 1];
    console.log("➡️ Usando vuelo:", datos);

    // RUTA IDA Y VUELTA
    $("#tituloIda").html(`${datos.desde.ciudad} a ${datos.hacia.ciudad}`);
    $("#tituloVuelta").html(`${datos.hacia.ciudad} a ${datos.desde.ciudad}`);

    // HORAS DE IDA DESDE LA URL
    const urlParams = new URLSearchParams(window.location.search);

    $("#horaIdaA").html(urlParams.get("horaA"));
    $("#horaIdaB").html(urlParams.get("horaB"));

    // PRECIO DE IDA
    let precioIda = parseFloat(urlParams.get("precio")) || 0;

    $("#precioIda").html(
        precioIda.toLocaleString("es-CO", {
            style: "currency",
            currency: "COP" 
        })
    );

    // FECHA
    $("#tarifaText2").html(datos.fecha);
});

 



/* ============================================
   🔹 CARGAR DATOS GUARDADOS (vuelosGuardados)
   ============================================ */

document.addEventListener("DOMContentLoaded", () => {

    let vuelosLS = localStorage.getItem("vuelosGuardados");

    if (!vuelosLS) {
        console.warn("⚠ No hay vuelosGuardados en localStorage");
        return;
    }

    const vuelos = JSON.parse(vuelosLS);
    const datos = vuelos[0]; // Usamos el vuelo elegido

    // RUTAS
    $("#tituloIda").html(`${datos.desde.ciudad} a ${datos.hacia.ciudad}`);
    $("#tituloVuelta").html(`${datos.hacia.ciudad} a ${datos.desde.ciudad}`);

    // HORAS (URL)
    const urlParams = new URLSearchParams(window.location.search);
    $("#horaIdaA").html(urlParams.get("horaA"));
    $("#horaIdaB").html(urlParams.get("horaB"));

    // PRECIO
    let precioIda = parseFloat(urlParams.get("precio")) || 0;

    $("#precioIda").html(precioIda.toLocaleString("es-CO", {
        style: "currency",
        currency: "COP"
    }));

    // FECHA
    $("#tarifaText2").html(datos.fecha);
});



/* ============================================
   🔹 FUNCIÓN EXISTENTE (NO TOCADA)
   ============================================ */

function vueloVuelta(horaA, horaB, precio, tipo_fecha){
    $('#sin_sorpresas').hide();
    $('#precios').hide();
    $('#horaA').html(horaA);
    $('#horaB').html(horaB);

    var formatoMoneda = precio.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP'
    });

    $('#precio').html(formatoMoneda);

    var urlParams = new URLSearchParams(window.location.search);
    var precioV1 = urlParams.get('precio');

    var precioTotal = parseFloat(precioV1) + parseFloat(precio);

    var formatoMoneda2 = precioTotal.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP'
    });

    $('#precioTotal').html(formatoMoneda2);

    $('#vueloLlegada').show();
    $('#modal_tarifa').hide();
    $("#continuar").removeAttr("disabled");
}



/* ============================================
   🔹 MODAL DE TARIFAS (CORREGIDO)
   ============================================ */

function getTarifa(text1, text2, tarifa, tipo_fecha){

    let vuelos = JSON.parse(localStorage.getItem("vuelosGuardados"));
    let datos = vuelos[0];

    let origen = datos.desde.codigo;
    let destino = datos.hacia.codigo;

    // Reemplazo de AXM-AXM por BAQ-BOG o el que sea
    let textFormateado = text1
        .replace(/^AXM/, origen)
        .replace(/AXM$/, destino);

    $("#tarifaText1").html(`<strong>${textFormateado}</strong>`);
    $("#tarifaText2").html(datos.fecha);

    /* =============================
       🔹 TARIFAS ORIGINALES
       ============================= */

    if(tarifa == 1){
        let horaA = "08:05";
        let horaB = "09:39";

        imgs = `
            <img src="media/tarifa1.png" onclick="vueloVuelta('${horaA}', '${horaB}', 49999, '${tipo_fecha}');">
            <img src="media/tarifa2.png" onclick="vueloVuelta('${horaA}', '${horaB}', 99999, '${tipo_fecha}');">
            <img src="media/tarifa3.png" onclick="vueloVuelta('${horaA}', '${horaB}', 129999, '${tipo_fecha}');">
            <img src="media/tarifa4.png" onclick="vueloVuelta('${horaA}', '${horaB}', 169999, '${tipo_fecha}');">
        `;
    }
    else if(tarifa == 2){
        let horaA = "09:50";
        let horaB = "11:24";

        imgs = `
            <img src="media/tarifa5.png" onclick="vueloVuelta('${horaA}', '${horaB}', 119200, '${tipo_fecha}');">
            <img src="media/tarifa6.png" onclick="vueloVuelta('${horaA}', '${horaB}', 169200, '${tipo_fecha}');">
            <img src="media/tarifa7.png" onclick="vueloVuelta('${horaA}', '${horaB}', 199200, '${tipo_fecha}');">
            <img src="media/tarifa8.png" onclick="vueloVuelta('${horaA}', '${horaB}', 239200, '${tipo_fecha}');">
        `;
    }
    else if(tarifa == 3){
        let horaA = "15:45";
        let horaB = "17:19";

        imgs = `
            <img src="media/tarifa9.png" onclick="vueloVuelta('${horaA}', '${horaB}', 269540, '${tipo_fecha}');">
            <img src="media/tarifa10.png" onclick="vueloVuelta('${horaA}', '${horaB}', 369540, '${tipo_fecha}');">
            <img src="media/tarifa11.png" onclick="vueloVuelta('${horaA}', '${horaB}', 349540, '${tipo_fecha}');">
            <img src="media/tarifa12.png" onclick="vueloVuelta('${horaA}', '${horaB}', 389540, '${tipo_fecha}');">
        `;
    }
    else if(tarifa == 4){
        let horaA = "18:30";
        let horaB = "20:04";

        imgs = `
            <img src="media/tarifa13.png" onclick="vueloVuelta('${horaA}', '${horaB}', 332000, '${tipo_fecha}');">
            <img src="media/tarifa14.png" onclick="vueloVuelta('${horaA}', '${horaB}', 382000, '${tipo_fecha}');">
            <img src="media/tarifa15.png" onclick="vueloVuelta('${horaA}', '${horaB}', 412000, '${tipo_fecha}');">
            <img src="media/tarifa16.png" onclick="vueloVuelta('${horaA}', '${horaB}', 45200, '${tipo_fecha}');">
        `;
    }

    $('#precios_tarifa').html(imgs);
    $('#modal_tarifa').show(300);
}



/* ============================================
   🔹 RESTO DE FUNCIONES
   ============================================ */

function closeModalTarifa(){
    $('#modal_tarifa').hide();
}

function editarVuelo(precioA){
    $('#sin_sorpresas').show();
    $('#precios').show();

    var formatoMoneda = precioA.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP'
    });

    $('#precioTotal').html(formatoMoneda);
    $('#vueloLlegada').hide();
    $("#continuar").attr("disabled", true);
}

function regrear(){
    localStorage.clear();
    window.location.href = "index.php";
}

function continuarViaje(){
    var textoPrecio = $("#precioTotal").text();
    const url = `dataUser.php?precio=${textoPrecio}`;
    window.location.href = url;
}
