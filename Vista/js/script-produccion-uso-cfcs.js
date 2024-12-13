document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-produccion-uso-cfcs').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-produccion-uso-cfcs'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-uso-cfcs.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarProduccionUsoCFCs();
                        document.getElementById('formulario-produccion-uso-cfcs').reset();
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

    function cargarProduccionUsoCFCs() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-uso-cfcs.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var produccionUsoCFCs = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-produccion-uso-cfcs-body');
                    tablaBody.innerHTML = '';
                    produccionUsoCFCs.forEach(function(produccion) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + produccion.CVEIDEN + '</td>' +
                            '<td>' + produccion.CVECH + '</td>' +
                            '<td>' + produccion.EQUIVALENTES_DE_ELECTRICIDAD + '</td>' +
                            '<td>' + produccion.HR_ANO + '</td>' +
                            '<td>' + produccion.TIPO_DE_EMISION + '</td>' +
                            '<td>' + produccion.CAPACIDAD + '</td>' +
                            '<td>' + produccion.UNIDAD + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar producción uso CFCS:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarProduccionUsoCFCs();
});
