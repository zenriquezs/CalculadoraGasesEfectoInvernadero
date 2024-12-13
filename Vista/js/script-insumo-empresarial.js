document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-insumo-empresarial').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-insumo-empresarial'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-insumo-empresarial.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarInsumosEmpresariales();
                        document.getElementById('formulario-insumo-empresarial').reset();
                        verificarIndicadores();
                    } else {
                        alert('Error al agregar insumo empresarial.');
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarInsumosEmpresariales() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-insumo-empresarial.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var insumosEmpresariales = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-insumo-empresarial-body');
                    tablaBody.innerHTML = '';
                    insumosEmpresariales.forEach(function(insumo) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + insumo.CVEIDEN + '</td>' +
                            '<td>' + insumo.NEC + '</td>' +
                            '<td>' + insumo.NAP + '</td>' +
                            '<td>' + insumo.NCH + '</td>' +
                            '<td>' + insumo.NECONT + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarInsumosEmpresariales();
});
