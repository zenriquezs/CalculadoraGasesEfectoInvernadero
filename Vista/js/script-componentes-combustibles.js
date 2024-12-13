document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-componente-combustible').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-componentes-combustibles'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-componentes-combustibles.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarComponentesCombustibles();
                        document.getElementById('formulario-componentes-combustibles').reset();
                        verificarIndicadores();
                    } else {
                        alert('Error al agregar componente de combustible.');
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarComponentesCombustibles() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-componentes-combustibles.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var componentes = JSON.parse(xhr.responseText);
                    var tablaBody = document.getElementById('tabla-componentes-combustibles-body');
                    tablaBody.innerHTML = '';
                    componentes.forEach(function(componente) {
                        var row = document.createElement('tr');
                        row.innerHTML =
                            '<td>' + componente.CVEIDEN + '</td>' +
                            '<td>' + componente.CO2_COMB_SC + '</td>' +
                            '<td>' + componente.CH4_COMB_SC + '</td>' +
                            '<td>' + componente.N2O_COMB_SC + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar componentes de combustibles:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarComponentesCombustibles();
});
