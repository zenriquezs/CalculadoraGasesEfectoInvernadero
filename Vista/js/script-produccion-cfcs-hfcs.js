document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-produccion-cfcs-hfcs').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-produccion-cfcs-hfcs'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-cfcs-hfcs.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarProduccionCFCsHFCs();
                        document.getElementById('formulario-produccion-cfcs-hfcs').reset();
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

    function cargarProduccionCFCsHFCs() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-cfcs-hfcs.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var produccionCFCsHFCs = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-produccion-cfcs-hfcs-body');
                    tablaBody.innerHTML = '';
                    produccionCFCsHFCs.forEach(function(item) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + item.CVEIDEN + '</td>' +
                            '<td>' + item.ACTIVIDAD + '</td>' +
                            '<td>' + item.NOMBRE_DE_SUSTANCIA + '</td>' +
                            '<td>' + item.MASA_SUSTANCIA_CONSUMIDA + '</td>' +
                            '<td>' + item.UNIDAD_MEDIDA + '</td>' +
                            '<td>' + item.MASA_SUSTANCIA_ADICIONADA + '</td>' +
                            '<td>' + item.CANTIDAD + '</td>' +
                            '<td>' + item.UNIDAD + '</td>' +
                            '<td>' + item.CO2 + '</td>' +
                            '<td>' + item.CH4 + '</td>' +
                            '<td>' + item.N2O + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar producción CFCs/HFCs:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarProduccionCFCsHFCs();
});