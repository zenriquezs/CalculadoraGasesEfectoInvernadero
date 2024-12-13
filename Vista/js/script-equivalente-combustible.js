document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-equivalente-combustible').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-equivalente-combustible'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalente-combustible.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarEquivalenteCombustible();
                        document.getElementById('formulario-equivalente-combustible').reset();
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

    function cargarEquivalenteCombustible() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalente-combustible.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var equivalentesCombustible = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-equivalente-combustible-body');
                    tablaBody.innerHTML = '';
                    equivalentesCombustible.forEach(function(equivalente) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + equivalente.CVEIDEN + '</td>' +
                            '<td>' + equivalente.CVEQPOC + '</td>' +
                            '<td>' + equivalente.TIPEQUIA + '</td>' +
                            '<td>' + equivalente.HR_ANO + '</td>' +
                            '<td>' + equivalente.TIPO_DE_EMISION + '</td>' +
                            '<td>' + equivalente.CAPACIDAD + '</td>' +
                            '<td>' + equivalente.UNIDAD_CAPACIDAD + '</td>' +
                            '<td>' + equivalente.TIPOCOMBUST + '</td>' +
                            '<td>' + equivalente.CANTIDAD + '</td>' +
                            '<td>' + equivalente.UNIDAD_CANTIDAD + '</td>' +
                            '<td>' + equivalente.CHIMENEA + '</td>' +
                            '<td>' + equivalente.EQUIPO_DE_CONTROL + '</td>' +
                            '<td>' + equivalente.PORC_S + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar equivalentes de combustible:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarEquivalenteCombustible();
});
