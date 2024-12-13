document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-produccion-energia-electrica').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-produccion-energia-electrica'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-energia-electrica.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarProduccionEnergiaElectrica();
                        document.getElementById('formulario-produccion-energia-electrica').reset();
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

    function cargarProduccionEnergiaElectrica() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-produccion-energia-electrica.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var produccionEnergiaElectrica = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-produccion-energia-electrica-body');
                    tablaBody.innerHTML = '';
                    produccionEnergiaElectrica.forEach(function(produccion) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + produccion.CVEIDEN + '</td>' +
                            '<td>' + produccion.CAPACIDAD_INSTALADA + '</td>' +
                            '<td>' + produccion.TIPO_DE_PLANTA + '</td>' +
                            '<td>' + produccion.GENERACION_ANUAL_MWH + '</td>' +
                            '<td>' + produccion.CONSUMO_COMBUSTIBLE + '</td>' +
                            '<td>' + produccion.TIPO + '</td>' +
                            '<td>' + produccion.CANTIDAD + '</td>' +
                            '<td>' + produccion.UNIDAD + '</td>' +
                            '<td>' + produccion.CO2 + '</td>' +
                            '<td>' + produccion.CH4 + '</td>' +
                            '<td>' + produccion.N2O + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar producción de energía eléctrica:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarProduccionEnergiaElectrica();
});
