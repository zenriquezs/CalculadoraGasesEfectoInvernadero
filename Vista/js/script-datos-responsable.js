document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-datos-responsable').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-datos-responsable-empresa'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-datos-responsable.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarDatosResponsables();
                        document.getElementById('formulario-datos-responsable-empresa').reset();
                        verificarIndicadores();
                    } else {
                        alert('Error: ' + response.error);
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarDatosResponsables() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-datos-responsable.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var datosResponsables = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-datos-responsable-body');
                    tablaBody.innerHTML = '';
                    datosResponsables.forEach(function(datoResponsable) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + datoResponsable.CVEIDEN + '</td>' +
                            '<td>' + datoResponsable.RESPONSABLE_TECNICO + '</td>' +
                            '<td>' + datoResponsable.ELABORADO + '</td>' +
                            '<td>' + datoResponsable.OBSERVACIONES + '</td>' +
                            '<td>' + datoResponsable.ZONA + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar datos de responsables:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarDatosResponsables();
});
