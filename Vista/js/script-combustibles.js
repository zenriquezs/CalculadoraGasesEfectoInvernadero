document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-combustible').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-combustibles'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-combustibles.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarCombustibles();
                        document.getElementById('formulario-combustibles').reset();
                        verificarIndicadores(); 
                    } else {
                        alert('Error al agregar combustible. ' + (response.error || ''));
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status, xhr.statusText);
                }
            }
        };
        xhr.send(formData);
    });

    function cargarCombustibles() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-combustibles.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var combustibles = JSON.parse(xhr.responseText);
                    var tablaBody = document.getElementById('tabla-combustibles-body');
                    tablaBody.innerHTML = '';
                    combustibles.forEach(function(combustible) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + combustible.CVEIDEN + '</td>' +
                            '<td>' + combustible.Combustible + '</td>' +
                            '<td>' + combustible.Consumo + '</td>' +
                            '<td>' + combustible.Unidad + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar combustibles:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarCombustibles();
});
