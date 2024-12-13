document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-equivalencias-contaminantes-control').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-equivalencias-contaminantes-control'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalencias-contaminantes-control.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            cargarEquivalenciasContaminantesControl();
                            document.getElementById('formulario-equivalencias-contaminantes-control').reset();
                            verificarIndicadores(); 
                        } else {
                            alert('Error: ' + response.error);
                        }
                    } catch (e) {
                        console.error('Error parsing response:', e);
                        alert('Error en la respuesta del servidor.');
                    }
                } else {
                    console.error('Error en la solicitud: ' + xhr.status);
                    alert('Error en la solicitud al servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarEquivalenciasContaminantesControl() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalencias-contaminantes-control.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var equivalencias = JSON.parse(xhr.responseText);

                        var tablaBody = document.getElementById('tabla-equivalencias-contaminantes-control-body');
                        tablaBody.innerHTML = '';
                        equivalencias.forEach(function(equivalencia) {
                            var row = document.createElement('tr');
                            row.innerHTML = 
                                '<td>' + equivalencia.CVEIDEN + '</td>' +
                                '<td>' + equivalencia.CVEQPOCON + '</td>' +
                                '<td>' + equivalencia.TIPO_DE_EQ_CONTROL + '</td>' +
                                '<td>' + equivalencia.EFICIENCIA + '</td>' +
                                '<td>' + equivalencia.METODO_DE_ESTIMACION + '</td>';
                            tablaBody.appendChild(row);
                        });
                    } catch (e) {
                        console.error('Error al cargar equivalencias de contaminantes de control:', e);
                        alert('Error en la respuesta del servidor.');
                    }
                } else {
                    console.error('Error en la solicitud: ' + xhr.status);
                    alert('Error en la solicitud al servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarEquivalenciasContaminantesControl();
});
