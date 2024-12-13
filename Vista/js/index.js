document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll(".input");

    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }

    function checkInputs() {
        inputs.forEach(input => {
            if (input.value !== "") {
                let parent = input.parentNode.parentNode;
                parent.classList.add("focus");
            }
        });
    }

    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
    checkInputs();
    document.getElementById('ver-informacion').addEventListener('click', function() {
        document.getElementById('sector').value = "Sector Ejemplo";
        document.getElementById('cam').value = "CAM Ejemplo";
        document.getElementById('nombre_empresa').value = "Nombre Empresa Ejemplo";
        document.getElementById('scian').value = "123456";
        document.getElementById('ubicacion').value = "Ubicación Ejemplo";
        document.getElementById('codigo_postal').value = "12345";
        document.getElementById('municipio').value = "Municipio Ejemplo";
        document.getElementById('entidad_federativa').value = "Jalisco";
        document.getElementById('latitud').value = "20.1234";
        document.getElementById('longitud').value = "-103.5678";
        document.getElementById('telefono').value = "1234567890";
        checkInputs();
    });
});
