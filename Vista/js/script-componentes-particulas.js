document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-componente-particulas').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-componentes-particulas'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-componentes-particulas.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('Componentes de partículas guardados exitosamente.');
                            document.getElementById('formulario-componentes-particulas').reset();
                            cargarComponentesParticulas();
                            verificarIndicadores();
                        } else {
                            alert('Error al guardar componentes de partículas. ' + (response.error || ''));
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                        alert('Error en la respuesta del servidor.');
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status, xhr.statusText);
                }
            }
        };
        xhr.send(formData);
    });

    function cargarComponentesParticulas() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-componentes-particulas.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var componentes = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-componentes-particulas-body');
                    tablaBody.innerHTML = '';
                    componentes.forEach(function(componente) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + componente.CVEIDEN + '</td>' +
                            '<td>' + componente.CO2_PROC_SC + '</td>' +
                            '<td>' + componente.CH4_PROC_SC + '</td>' +
                            '<td>' + componente.N2O_PROC_SC + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar componentes de partículas:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarComponentesParticulas();
});
