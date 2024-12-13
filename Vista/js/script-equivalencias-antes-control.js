document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-actividad-suministro').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-actividad-suministro'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-actividad-suministro.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarActividadesSuministro();
                        document.getElementById('formulario-actividad-suministro').reset();
                        verificarIndicadores(); 
                    } else {
                        alert('Error: '+ response.error);
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarActividadesSuministro() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-actividad-suministro.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var actividades = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-actividad-suministro-body');
                    tablaBody.innerHTML = '';
                    actividades.forEach(function(actividad) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + actividad.CVEIDEN + '</td>' +
                            '<td>' + actividad.ACTIVIDAD + '</td>' +
                            '<td>' + actividad.EQUIPO_DE_COMBUSTION + '</td>' +
                            '<td>' + actividad.SITUACION + '</td>' +
                            '<td>' + actividad.MD + '</td>' +
                            '<td>' + actividad.CT + '</td>' +
                            '<td>' + actividad.CI + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar actividades de suministro:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarActividadesSuministro();
});
