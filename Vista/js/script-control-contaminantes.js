document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-control-contaminantes').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-control-contaminantes'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-control-contaminantes.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            cargarControlContaminantes();
                            document.getElementById('formulario-control-contaminantes').reset();
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

    function cargarControlContaminantes() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-control-contaminantes.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var controlContaminantes = JSON.parse(xhr.responseText);

                        var tablaBody = document.getElementById('tabla-control-contaminantes-body');
                        tablaBody.innerHTML = '';
                        controlContaminantes.forEach(function(control) {
                            var row = document.createElement('tr');
                            row.innerHTML = 
                                '<td>' + control.CVEIDEN + '</td>' +
                                '<td>' + control.CONTAM_CONTROL_1 + '</td>' +
                                '<td>' + control.CONTAM_CONTROL_2 + '</td>' +
                                '<td>' + control.CONTAM_CONTROL_3 + '</td>';
                            tablaBody.appendChild(row);
                        });
                    } catch (e) {
                        console.error('Error al cargar control de contaminantes:', e);
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

    cargarControlContaminantes();
});
