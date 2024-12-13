document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-compuestos-chimenea').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-compuestos-chimenea'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-compuestos-chimenea.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarCompuestosChimenea();
                        document.getElementById('formulario-compuestos-chimenea').reset();
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

    function cargarCompuestosChimenea() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-compuestos-chimenea.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var compuestosChimenea = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-compuestos-chimenea-body');
                    tablaBody.innerHTML = '';
                    compuestosChimenea.forEach(function(compuesto) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + compuesto.CVEIDEN + '</td>' +
                            '<td>' + compuesto.CVECH + '</td>' +
                            '<td>' + compuesto.CO2 + '</td>' +
                            '<td>' + compuesto.TIP_CO2 + '</td>' +
                            '<td>' + compuesto.CH4 + '</td>' +
                            '<td>' + compuesto.TIP_CH4 + '</td>' +
                            '<td>' + compuesto.N2O + '</td>' +
                            '<td>' + compuesto.TIP_N2O + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar compuestos de chimenea:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarCompuestosChimenea();
});
