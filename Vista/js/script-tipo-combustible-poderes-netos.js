document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-tipo-combustible-poderes-netos').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-tipo-combustible-poderes-netos'));
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-tipo-combustible-poderes-netos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarTipoCombustiblePoderesNetos();
                        document.getElementById('formulario-tipo-combustible-poderes-netos').reset();
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

    function cargarTipoCombustiblePoderesNetos() {
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-tipo-combustible-poderes-netos.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var tipoCombustiblePoderesNetos = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-tipo-combustible-poderes-netos-body');
                    tablaBody.innerHTML = '';
                    tipoCombustiblePoderesNetos.forEach(function(tipo) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + tipo.CVEIDEN + '</td>' +
                            '<td>' + tipo.TIPO_DE_COMBUSTIBLE + '</td>' +
                            '<td>' + tipo.PODER_CALORIFICO_NETO + '</td>' +
                            '<td>' + tipo.UNIDAD_DE_MEDIDA_KJ_M3 + '</td>' +
                            '<td>' + tipo.UNIDAD_DE_MEDIDA_MJ_T + '</td>' +
                            '<td>' + tipo.CANTIDAD_DE_CONSUMO + '</td>' +
                            '<td>' + tipo.FACTOR_DE_CONVERSION_A_BEP + '</td>' +
                            '<td>' + tipo.EQUIVALENCIA_DE_UNIDADES_BEP_M3 + '</td>' +
                            '<td>' + tipo.EQUIVALENCIA_DE_UNIDADES_BEP_T + '</td>' +
                            '<td>' + tipo.CO2_T_MJ + '</td>' +
                            '<td>' + tipo.CH4_KG_MJ + '</td>' +
                            '<td>' + tipo.N2O_KG_MJ + '</td>';
                        tablaBody.appendChild(row);
                    });
                } catch (e) {
                    console.error('Error al cargar tipo de combustible poderes netos:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send('action=obtener&cveiden=' + cveiden);
    }

    cargarTipoCombustiblePoderesNetos();
});
