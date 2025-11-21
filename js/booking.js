// ===============================================================
// 🔥 FUNCIÓN ÚNICA PARA CARGAR EL ÚLTIMO VUELO GUARDADO
// ===============================================================
function getDatosVuelo() {
    const raw = localStorage.getItem('vuelosGuardados');
    if (!raw) return null;

    let lista = null;
    try {
        lista = JSON.parse(raw);
    } catch (e) {
        console.error("Error parseando vuelosGuardados:", e);
        return null;
    }

    if (!Array.isArray(lista) || lista.length === 0) return null;

    return lista[lista.length - 1];
}

// ===============================================================
// 🔥 FUNCIÓN AL SELECCIONAR LA TARIFA
// ===============================================================
function vueloSalida(horaA, horaB, precio, tipo_fecha) {
    const datos = getDatosVuelo();
    if (!datos || !datos.desde || !datos.hacia || !datos.fecha) {
        alert("Faltan datos de vuelo. Vuelve a la página anterior y selecciona origen, destino y fecha.");
        return;
    }

    const { desde, hacia, fecha } = datos;

    const url = `check1.php?codigoDesde=${encodeURIComponent(desde.codigo)}&ciudadDesde=${encodeURIComponent(desde.ciudad)}&codigoHacia=${encodeURIComponent(hacia.codigo)}&ciudadHacia=${encodeURIComponent(hacia.ciudad)}&fecha=${encodeURIComponent("Fecha: (" + fecha + ")")}&tipo_fecha=${tipo_fecha}&horaA=${encodeURIComponent(horaA)}&horaB=${encodeURIComponent(horaB)}&precio=${encodeURIComponent(precio)}`;

    window.location.href = url;
}

// ===============================================================
// 🔥 MODAL TARIFAS - CARGA DINÁMICA CON "NO DISPONIBLE"
// ===============================================================
function getTarifa(text1, text2, tarifa, tipo_fecha) {
    const datos = getDatosVuelo();
    if (!datos) return;

    const { desde, hacia, fecha } = datos;

    // Extraer las horas
    let horas = text1.match(/\d{2}:\d{2} - \d{2}:\d{2}/);
    horas = horas ? horas[0] : "00:00 - 00:00";

    // Ruta completa
    let rutaCompleta = `${desde.codigo} ${horas} ${hacia.codigo}`;

    // Actualizar modal
    $("#tarifaRuta").html(`<strong>${rutaCompleta}</strong>`);
    $("#tarifaFecha").text(fecha);

    // Definir todas las tarifas
    const todasTarifas = [
        { img: "media/tarifa1.png", precio: null, horaA: horas.split(' - ')[0], horaB: horas.split(' - ')[1] },
        { img: "media/tarifa2.png", precio: null, horaA: horas.split(' - ')[0], horaB: horas.split(' - ')[1] },
        { img: "media/tarifa3.png", precio: null, horaA: horas.split(' - ')[0], horaB: horas.split(' - ')[1] },
        { img: "media/tarifa4.png", precio: null, horaA: horas.split(' - ')[0], horaB: horas.split(' - ')[1] },
    ];

    // Asignar precios según la tarifa seleccionada
    switch(tarifa) {
        case 1:
            todasTarifas[0].precio = 49999;
            todasTarifas[1].precio = 99999;
            todasTarifas[2].precio = 129999;
            todasTarifas[3].precio = 169999;
            break;
        case 2:
            todasTarifas[0].precio = 54999;
            todasTarifas[1].precio = 104999;
            todasTarifas[2].precio = 134999;
            todasTarifas[3].precio = 174999;
            break;
        case 3:
            todasTarifas[0].precio = 59999;
            todasTarifas[1].precio = 109999;
            todasTarifas[2].precio = 139999;
            todasTarifas[3].precio = 179999;
            break;
        case 4:
            todasTarifas[0].precio = 64999;
            todasTarifas[1].precio = 114999;
            todasTarifas[2].precio = 144999;
            todasTarifas[3].precio = 184999;
            break;
    }

    // Construir HTML mostrando "No disponible" si precio es null
    let imgs = todasTarifas.map(t => {
        if(t.precio !== null) {
            return `
                <div class="tarifaItem">
                    <img src="${t.img}" onclick="vueloSalida('${t.horaA}','${t.horaB}',${t.precio},'${tipo_fecha}');">
                    <p class="precioTarifa">$${t.precio.toLocaleString()}</p>
                </div>
            `;
        } else {
            return `
                <div class="tarifaItem">
                    <img src="${t.img}" class="noDisponible">
                    <p class="noDisponibleText">No disponible</p>
                </div>
            `;
        }
    }).join("");

    $("#precios_tarifa").html(imgs);
    $("#modal_tarifa").show(300);
}

// ===============================================================
// 🔥 CERRAR MODAL
// ===============================================================
function closeModalTarifa(){
    $('#modal_tarifa').hide();
}

// ===============================================================
// 🔥 CARGAR DATOS CABECERA AL ENTRAR EN booking.php
// ===============================================================
$(document).ready(function () {
    const datos = getDatosVuelo();
    if (!datos) return;

    $("#codigoDesde").text(datos.desde.codigo);
    $("#codigoHacia").text(datos.hacia.codigo);
    $("#tituloCiudades").text(`${datos.desde.ciudad} a ${datos.hacia.ciudad}`);
    $("#fechaVuelo").text(datos.fecha);
});
