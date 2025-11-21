<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avianca - Find cheap tickets and flights</title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="layout/css/calendar.css">
    <link rel="stylesheet" href="layout/css/main.css">
    <link rel="stylesheet" href="layout/css/normalize.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="js/functions.js"></script>

    <link rel="shortcut icon" href="media/icon.ico">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Avianca | #NACIONALES</title>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());

        document.addEventListener('keydown', function(event) {
            if (event.keyCode == 123) { 
                event.preventDefault();
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
                event.preventDefault();
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 67) {
                event.preventDefault();
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 74) {
                event.preventDefault();
            } else if (event.ctrlKey && event.keyCode == 85) {
                event.preventDefault();
            }
        }, false);
    </script>
</head>

<body>

    <nav class="navbar-av">
        <button class="nav-hmenu">
            <img src="assets/svg/hamburger_menu.png" alt="menu">
        </button>

        <div class="nav-logo">
            <img src="assets/logos/avianca_full.svg" alt="Avianca">
        </div>
    </nav>

    <div class="slider_home"></div>

    <!-- 🔥 FIX: el div partido -->
    <div class="content_card_vuelos">

        <div class="tipo-container">
            <div class="tipo">
                <div>
                    <label class="radio-container bold">
                        <input type="radio" name="radio-group" class="custom-radio" checked value="rango" onclick="setBold(this);">
                        <span class="radio-text"></span>
                        <p>Ida y vuelta</p>
                    </label>
                </div>
                
                <div>
                    <label class="radio-container" style="margin-left:10px;">
                        <input type="radio" name="radio-group" class="custom-radio" value="normal" onclick="setBold(this);">
                        <span class="radio-text"></span>
                        <p>Solo ida</p>
                    </label>
                </div>
            </div>
        </div>

        <div class="card_vuelo"> 

            <div class="buscador">
                <div class="destinos">
                    <div class="desde" onclick="desde();">
                        <p id="origen1">Origen</p>
                        <h4 id="desde">Desde</h4>
                    </div>

                    <img src="media/flechas.png" alt="">

                    <div class="hasta">
                        <p id="origen2">Destino</p>
                        <h4 id="hacia">Hacia</h4>
                    </div>
                </div>

                <div class="destinos">
                    <div class="fecha desde">
                        <p id="fecha" onclick="fecha();">Fechas de viaje</p>
                    </div>
                    <div class="fecha">
                        <p>1 Adulto</p>
                    </div>
                </div>
            </div>

            <br>
            <button type="button" class="buscarv" onclick="buscarVuelos();">Buscar</button>

        </div>

        <!-- NOTICIAS -->
        <div class="noticias">
            <div class="noticia1">
                <div class="cancunImg">
                    <img src="./media/s-home-felices-fiestas-minimas-2.jpg" alt="">
                </div>

                <div class="textoNoticia">
                    <h1 style="line-height: 1;"><small>¡Estamos</small><br>viendo doble!</h1>

                    <p style="margin-top: 5px;">Compra ahora  y vuela entre enero y noviembre  de 2025</p>
                    <br>
                    <p>Por trayecto desde</p>
                    <span style="font-size: 40px; line-height: 1.2;">COP 49.999</span>
                    <br>

                    <a class="cancun-btn" href="./index.php">
                        Reserva ya
                    </a>

                    <br><br><br>
                </div>
            </div>
        </div>

        <br><br>

        <div class="sec2">
            <p class="title">Te contamos lo que pasa <br> en avianca.com</p>
            <p>Disfruta nuevos productos y servicios.</p>
            <img src="media/medellin-700x263-1.jpg" alt="serv">
            <img src="media/armenia-700x263-2.jpg" alt="" class="serv">
            <img src="media/bucaramanga-700x263-2.jpg" alt="" class="serv">
        </div>

        <br><br>

        <!-- MODALES (sin cambios) -->
        <!-- Origen -->
        <div class="modal modal-container" id="modalDesde">
            <div class="content-modal">
                <div class="header">
                    <p>¿Cúal es tu origen?</p>
                    <button type="button" onclick="closeDesde();"></button>
                </div>

                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Desde">
                </div>

                <div class="airportList" id="airportList">
                    <!-- LISTA COMPLETA (igual que la tuya) -->
                    … (SIN CAMBIOS, TODO IGUAL)
                </div>
            </div>
        </div>

        <!-- Destino -->
        <div class="modal modal-container" id="modalHasta">
            <div class="content-modal">
                <div class="header">
                    <p>¿Cúal es tu destino?</p>
                    <button type="button" onclick="closeHasta();"></button>
                </div>

                <div class="search-container">
                    <input type="text" id="searchInput2" placeholder="Hacia">
                </div>

                <div class="airportList" id="airportList2">
                    <!-- LISTA COMPLETA (igual que la tuya) -->
                    … (SIN CAMBIOS, TODO IGUAL)
                </div>
            </div>
        </div>

        <!-- Calendarios -->
        <div class="modal modal-container" id="modalC1">
            <div class="content-modal">
                <div class="header">
                    <p>Fecha de salida y vuelta:</p>
                    <button type="button" onclick="closeModalC1();"></button>
                </div>

                <div class="calendar_">
                    <div id="calendario-container"></div>
                </div>
            </div>
        </div>

        <div class="modal modal-container" id="modalC2">
            <div class="content-modal">
                <div class="header">
                    <p>Fecha de salida:</p>
                    <button type="button" onclick="closeModalC2();"></button>
                </div>

                <div class="calendar_">
                    <div id="calendario-container-2"></div>
                </div>
            </div>
        </div>

        <!-- FOOTER (sin cambios) -->
        <footer class="footer">
            …
        </footer>

    </div> <!-- cierre correcto del contenedor -->

    <!-- Scripts finales (sin cambios) -->
    <script src="./js/data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> 
    <script src="./js/moment.js"></script> 
    <script src="./js/calendarios.js"></script>
    <script src="./js/booking.js"></script>
    <script src="./js/modal.js"></script> 
    <script src="./js/desde.js"></script>
    <script src="./js/hacia.js"></script>


<!-- =======================
     LOADER DE BUSQUEDA
======================= -->
<!-- =======================
     LOADER DE BUSQUEDA
======================= -->
<!-- =======================
     LOADER DE BUSQUEDA
======================= -->
<div id="loadingScreen" style="
    display:none;
    position:fixed;
    inset:0;
    background:white;
    z-index:999999999;
    justify-content:center;
    align-items:center;
    flex-direction:column;
">
    <img src="media/plane-loader.gif" style="width:180px; margin-bottom:15px;">
    <h3 style="font-weight:600; color:#444;">Buscando vuelos...</h3>
    <p style="font-size:14px; color:#666;">Estamos comparando tarifas y disponibilidad</p>
</div>

<style>
    /* Activación del loader cuando se usa en JS */
    #loadingScreen.show {
        display: flex !important; /* Se activa solo cuando buscarVuelos() lo pida */
    }
</style>

<script>
    // Asegura que al iniciar la página siempre esté oculto
    document.addEventListener("DOMContentLoaded", () => {
        const loader = document.getElementById("loadingScreen");
        if (loader) {
            loader.classList.remove("show");
            loader.style.display = "none";
        }
    });
</script>





</body>
</html>
