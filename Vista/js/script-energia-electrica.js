document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-energia-electrica').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-energia-electrica'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-energia-electrica.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarEnergiaElectrica();
                        document.getElementById('formulario-energia-electrica').reset();
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

    function cargarEnergiaElectrica() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-energia-electrica.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var energiaElectrica = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-energia-electrica-body');
                    tablaBody.innerHTML = '';
                    energiaElectrica.forEach(function(item) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + item.CVEIDEN + '</td>' +
                            '<td>' + item.CVECH + '</td>' +
                            '<td>' + item.HR_ANO + '</td>' +
                            '<td>' + item.TIPO_DE_EMISION + '</td>' +
                            '<td>' + item.CAPACIDAD + '</td>' +
                            '<td>' + item.UNIDAD + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar energía eléctrica:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarEnergiaElectrica();
});
