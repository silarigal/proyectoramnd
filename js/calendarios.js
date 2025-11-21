document.addEventListener("DOMContentLoaded", function () {

    // Utiliza una media query más estándar y robusta para detectar móvil
    // O usa la detección de ancho que ya tienes
    const isMobile = window.innerWidth <= 480; 

    /* ============================
        CALENDARIO – IDA Y VUELTA (RANGO)
        ============================ */
    // La instancia del calendario para IDA Y VUELTA debe ir en #modalC1
    // (que contiene a #calendario-container)

    const configBase = {
        dateFormat: "Y-m-d",
        minDate: "today",
        locale: "es",
        disableMobile: true, // Esto es correcto
        inline: true,        // 🔥 CLAVE: Obliga a que se dibuje dentro del DIV
        onChange: function (selectedDates, dateStr) {
             if (selectedDates.length === 2) {
                 const [f1, f2] = dateStr.split(" a ");
                 const rango = `${moment(f1).format("D MMM")} a ${moment(f2).format("D MMM")}`;
                 insertData("Fecha: (" + rango + ")");
                 // Aquí puedes añadir la lógica para cerrar el modal después de la selección
                 // closeModalC1(); 
             }
        }
    };
    
    // --- LÓGICA DE RANGO (Ida y vuelta) ---
    flatpickr("#calendario-container", {
        ...configBase,
        mode: "range",
        showMonths: isMobile ? 1 : 2 // 1 mes en móvil, 2 en escritorio
    });


    /* ============================
        CALENDARIO – SOLO IDA
        ============================ */
    // La instancia para SOLO IDA debe ir en #modalC2
    // (que contiene a #calendario-container-2)

    flatpickr("#calendario-container-2", {
        ...configBase,
        mode: "single",
        showMonths: isMobile ? 1 : 2, // 1 mes en móvil, 2 en escritorio
        onChange: function (selectedDates, dateStr) {
             const fechaFormateada = moment(dateStr).format("DD MMM");
             insertData("Fecha: (" + fechaFormateada + ")");
             // Aquí puedes añadir la lógica para cerrar el modal
             // closeModalC2();
        }
    });

});