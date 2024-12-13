document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-combustibles-poderes-netos').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-combustibles-poderes-netos'));

        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-combustibles-poderes-netos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarCombustiblesPoderesNetos();
                        document.getElementById('formulario-combustibles-poderes-netos').reset();
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

    function cargarCombustiblesPoderesNetos() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-combustibles-poderes-netos.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var combustiblesPoderesNetos = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-combustibles-poderes-netos-body');
                    tablaBody.innerHTML = '';
                    combustiblesPoderesNetos.forEach(function(combustible) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + combustible.CVEIDEN + '</td>' +
                            '<td>' + combustible.CVECH + '</td>' +
                            '<td>' + combustible.TIPO_DE_COMBUSTIBLE + '</td>' +
                            '<td>' + combustible.HR_ANO + '</td>' +
                            '<td>' + combustible.TIPO_DE_EMISION + '</td>' +
                            '<td>' + combustible.CAPACIDAD + '</td>' +
                            '<td>' + combustible.UNIDAD + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar combustibles y poderes netos:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarCombustiblesPoderesNetos();
});
