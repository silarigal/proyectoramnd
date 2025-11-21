<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/icon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Avianca | #NACIONALES</title>
</head>
 
<body>

    <div class="content_booking">

        <!-- ========================== -->
        <!--      HEADER SUPERIOR       -->
        <!-- ========================== -->
        <div class="headerPickF">
            <img src="media/icon.png" alt="" class="icon">

            <div class="ciudades">
                <p id="codigoDesde">AXM</p>
                <img src="media/felchasSF.png" alt="">
                <p id="codigoHacia">AXM</p>
            </div>

            <div class="fecha">
                <p id="fechaVuelo"></p>
            </div>

            <a href="index.php"><img src="media/icon-edit.png" alt=""></a>
        </div>

        <!-- ========================== -->
        <!--      HEADER INFO TEXTO     -->
        <!-- ========================== -->
        <div class="header_info">
            <p>Selecciona tu vuelo de salida - </p>
            <h4 id="tituloCiudades">Armenia a Armenia</h4>
        </div>

        <!-- ========================== -->
        <!--      TARIFAS (IMÁGENES)    -->
        <!-- ========================== -->
        <div class="precios">
            <img src="media/precio1.png" alt="" onclick="getTarifa('AXM 08:05 - 09:39 AXM', '', 1, 'normal');">
            <img src="media/precio2.png" alt="" onclick="getTarifa('AXM 09:50 - 11:24 AXM', '', 2, 'normal');">
            <img src="media/precio3.png" alt="" onclick="getTarifa('AXM 15:45 - 17:19 AXM', '', 3, 'normal');">
            <img src="media/precio4.png" alt="" onclick="getTarifa('AXM 18:30 - 20:04 AXM', '', 4, 'normal');">
        </div>

        <!-- ========================== -->
        <!--   ACORDEÓN DE CONDICIONES  -->
        <!-- ========================== -->
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left btn-ligth" type="button" data-toggle="collapse" data-target="#collapseOne">
                            Condiciones tarifarias
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <img src="media/pt1.jpg" alt="">
                        <img src="media/pt2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================== -->
    <!--         FOOTER LEGAL       -->
    <!-- ========================== -->
    <div class="footerLegal">
        <div class="footer-legales">
            <ul class="lista-inferior lista-inferior2" role="listbox">
                <li role="option">
                    <a href="https://www.avianca.com/co/es/" target="_self" class="text-list-footer">
                        <span class="text-ellipsis">© Avianca S.A 2025</span>
                    </a> 
                    <span class="separador">&nbsp;|&nbsp;</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- ========================== -->
    <!--   MODAL TARIFAS DETALLES   -->
    <!-- ========================== -->
    <div class="modal modal-container" id="modal_tarifa">
    <div class="content-modal content-modal-np">
        <div class="content_booking">
            
            <div class="headerPickF headerPickF2">
                <div class="row_txt_">
                    <button type="button" onclick="closeModalTarifa();">
                        <img src="media/regresar.png" alt="">
                    </button>
                    <p>Selecciona tu tarifa</p>
                </div>

                <div class="row_info_">
                    <!-- Aquí cargarás CIUDAD Y HORARIO -->
                    <p id="tarifaRuta"><strong>AXM 08:05 - 09:39 BAQ</strong></p>

                    <!-- Aquí cargarás la FECHA -->
                    <p id="tarifaFecha">Lun, Nov 28</p>
                </div>
            </div>

            <div class="container-tabs-cabin">
                <p>Económica</p>
            </div>

            <div class="precios_tarifa" id="precios_tarifa"></div>

        </div>
    </div>
</div>


    <!-- ========================== -->
    <!--          SCRIPTS           -->
    <!-- ========================== -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/booking.js"></script>

    <div class="loader_inicial" id="loaderI" style="display: none;">
        <img src="media/loading.png" alt="">
        <div class="lds-ring">
            <div></div><div></div><div></div><div></div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#loaderI').hide();
        }, 3000);
    </script>

</body>
</html>
