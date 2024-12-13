document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-registro-actividades-proceso').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-registro-actividades-proceso'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-registro-actividades-proceso.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarRegistroActividadesProceso();
                        document.getElementById('formulario-registro-actividades-proceso').reset();
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

    function cargarRegistroActividadesProceso() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-registro-actividades-proceso.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var actividadesProceso = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-registro-actividades-proceso-body');
                    tablaBody.innerHTML = '';
                    actividadesProceso.forEach(function(actividad) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + actividad.CVEIDEN + '</td>' +
                            '<td>' + actividad.CVEACTP + '</td>' +
                            '<td>' + actividad.TIPACTIV_GRAL + '</td>' +
                            '<td>' + actividad.PROCESO + '</td>' +
                            '<td>' + actividad.UNIDAD_FE + '</td>' +
                            '<td>' + actividad.HR_ANO + '</td>' +
                            '<td>' + actividad.TIPO_DE_EMISION + '</td>' +
                            '<td>' + actividad.EQUIPO_DE_CONTROL + '</td>' +
                            '<td>' + actividad.CHIMENEA + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar registro de actividades del proceso:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarRegistroActividadesProceso();
});
