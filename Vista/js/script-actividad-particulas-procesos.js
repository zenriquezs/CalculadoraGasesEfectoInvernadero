document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-actividad-particulas-procesos').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-actividad-particulas-procesos'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-actividad-particulas-procesos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarActividadParticulasProcesos();
                        document.getElementById('formulario-actividad-particulas-procesos').reset();
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

    function cargarActividadParticulasProcesos() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-actividad-particulas-procesos.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var actividadesParticulasProcesos = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-actividad-particulas-procesos-body');
                    tablaBody.innerHTML = '';
                    actividadesParticulasProcesos.forEach(function(actividad) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + actividad.CVEIDEN + '</td>' +
                            '<td>' + actividad.CO2_PROC_SC + '</td>' +
                            '<td>' + actividad.TIP_CO2 + '</td>' +
                            '<td>' + actividad.CH4_PROC_SC + '</td>' +
                            '<td>' + actividad.TIP_CH4 + '</td>' +
                            '<td>' + actividad.N2O_PROC_SC + '</td>' +
                            '<td>' + actividad.TIP_N2O + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar actividad de partículas de procesos:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarActividadParticulasProcesos();
});
