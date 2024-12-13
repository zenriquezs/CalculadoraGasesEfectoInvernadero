document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-suma-particulas').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-suma-particulas'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-suma-particulas.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarSumaParticulas();
                        document.getElementById('formulario-suma-particulas').reset();
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

    function cargarSumaParticulas() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-suma-particulas.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var sumaParticulas = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-suma-particulas-body');
                    tablaBody.innerHTML = '';
                    sumaParticulas.forEach(function(sumaParticula) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + sumaParticula.CVEIDEN + '</td>' +
                            '<td>' + sumaParticula.CO2_SUMA_SC + '</td>' +
                            '<td>' + sumaParticula.CH4_SUMA_SC + '</td>' +
                            '<td>' + sumaParticula.N2O_SUMA_SC + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar suma de partículas:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarSumaParticulas();
});
