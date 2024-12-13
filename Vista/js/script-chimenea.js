document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-chimenea').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-chimenea'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-chimenea.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarChimeneas();
                        document.getElementById('formulario-chimenea').reset();
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

    function cargarChimeneas() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-chimenea.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var chimeneas = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-chimenea-body');
                    tablaBody.innerHTML = '';
                    chimeneas.forEach(function(chimenea) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + chimenea.CVEIDEN + '</td>' +
                            '<td>' + chimenea.CVECH + '</td>' +
                            '<td>' + chimenea.ALTURA + '</td>' +
                            '<td>' + chimenea.DIAMETRO + '</td>' +
                            '<td>' + chimenea.VELOCIDAD + '</td>' +
                            '<td>' + chimenea.TEMPERATURA + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar chimeneas:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarChimeneas();
});
