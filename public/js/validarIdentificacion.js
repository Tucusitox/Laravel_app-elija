// Seleccionar los elementos necesarios
const inputElement = document.querySelector('input[name="identificacion"]');
const selectElement = document.querySelector('select[name="tiposNaci"]');

// Función para agregar formato al valor ingresado según el tipo seleccionado
function formatInput(value, formatType) {
    if (formatType === "1") {
        // Formato regex 1: /^[0-9]{2}\.[0-9]{3}\.[0-9]{3}$/
        return value
            .replace(/\D/g, "")
            .replace(/(\d{2})(\d{3})(\d{3})/, "$1.$2.$3")
            .slice(0, 10);
    } else if (formatType === "2") {
        // Formato regex 2: /^[0-9]{3}\-[0-9]{2}\-[0-9]{4}$/
        return value
            .replace(/\D/g, "")
            .replace(/(\d{3})(\d{2})(\d{4})/, "$1-$2-$3")
            .slice(0, 11);
    } else if (formatType === "3") {
        // Formato regex 3: /^[A-Z]{2}[0-9]{6}[A-Z]{1}$/
        return value
            .toUpperCase()
            .replace(/[^A-Z0-9]/g, "")
            .replace(/^([A-Z]{0,2})(\d{0,6})([A-Z]{0,1}).*/, "$1$2$3")
            .slice(0, 9);
    }
    return value; // Sin formato
}

// Escuchar el evento 'change' del selector
selectElement.addEventListener("change", function () {
    const selectedOption = this.value;

    // Actualizar el placeholder del input según el formato esperado
    if (selectedOption === "") {
        inputElement.placeholder = "Ingresa tu identificación";
    } else if (selectedOption === "1") {
        inputElement.placeholder = "00.000.000"; // Formato para regex 1
    } else if (selectedOption === "2") {
        inputElement.placeholder = "000-00-0000"; // Formato para regex 2
    } else if (selectedOption === "3") {
        inputElement.placeholder = "AB000000A"; // Formato para regex 3
    }
});

// Escuchar el evento 'input' para formatear el valor en tiempo real
inputElement.addEventListener("input", function () {
    const selectedOption = selectElement.value;
    this.value = formatInput(this.value, selectedOption);
});

// Validar el valor final al perder el foco
inputElement.addEventListener("blur", function () {
    const selectedOption = selectElement.value;

    // Expresiones regulares para validar los formatos
    const regexes = {
        1: /^[0-9]{2}\.[0-9]{3}\.[0-9]{3}$/,
        2: /^[0-9]{3}\-[0-9]{2}\-[0-9]{4}$/,
        3: /^[A-Z]{2}[0-9]{6}[A-Z]{1}$/,
    };

    // Validar el valor con la regex correspondiente
    if (selectedOption && !regexes[selectedOption].test(this.value)) {
        Swal.fire({
            icon: "error",
            html: `<h2>¡La Identificación no cumple con el formato esperado para la nacionalidad seleccionada!</h2>`,
            focusConfirm: false,
            confirmButtonText: `
              <i class="fa fa-thumbs-up"></i> ¡Entendido!
            `,
          });
        this.value = ""; // Limpiar el campo si no es válido
    }
});
