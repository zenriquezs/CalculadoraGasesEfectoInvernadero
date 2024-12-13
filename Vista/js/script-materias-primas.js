document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-materia').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-materias-primas'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-materias-primas.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            cargarMateriasPrimas();
                            document.getElementById('formulario-materias-primas').reset();
                            verificarIndicadores();
                        } else {
                            alert('Error al agregar materia prima. ' + (response.error || ''));
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                        console.log('Respuesta del servidor:', xhr.responseText);
                        alert('Error al procesar la respuesta del servidor.');
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status, xhr.statusText);
                }
            }
        };
        xhr.send(formData);
    });

    function cargarMateriasPrimas() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-materias-primas.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var materiasPrimas = JSON.parse(xhr.responseText);
                    var tablaBody = document.getElementById('tabla-body');
                    tablaBody.innerHTML = '';
                    materiasPrimas.forEach(function(materiaPrima) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + materiaPrima.CVEIDEN + '</td>' +
                            '<td>' + materiaPrima.MATERIAPRIMA + '</td>' +
                            '<td>' + materiaPrima.CONSUMO + '</td>' +
                            '<td>' + materiaPrima.UNIDAD + '</td>' ;                            
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al parsear la respuesta JSON:', e);
                    console.log('Respuesta del servidor:', xhr.responseText);
                    alert('Error en la respuesta del servidor.');
                }
            } else if (xhr.readyState == 4) {
                console.error('Error en la solicitud:', xhr.status, xhr.statusText);
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarMateriasPrimas();
});
