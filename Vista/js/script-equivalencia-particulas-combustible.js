document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-equivalencia-particulas-combustible').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-equivalencia-particulas-combustible'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalencia-particulas-combustible.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarEquivalenciaParticulasCombustible();
                        document.getElementById('formulario-equivalencia-particulas-combustible').reset();
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

    function cargarEquivalenciaParticulasCombustible() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-equivalencia-particulas-combustible.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var equivalenciasParticulasCombustible = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-equivalencia-particulas-combustible-body');
                    tablaBody.innerHTML = '';
                    equivalenciasParticulasCombustible.forEach(function(equivalencia) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + equivalencia.CVEIDEN + '</td>' +
                            '<td>' + equivalencia.CO2_COMB_SC + '</td>' +
                            '<td>' + equivalencia.TIP_CO2 + '</td>' +
                            '<td>' + equivalencia.CH4_COMB_SC + '</td>' +
                            '<td>' + equivalencia.TIP_CH4 + '</td>' +
                            '<td>' + equivalencia.N2O_COMB_SC + '</td>' +
                            '<td>' + equivalencia.TIP_N2O + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar equivalencias de partículas de combustible:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarEquivalenciaParticulasCombustible();
});
