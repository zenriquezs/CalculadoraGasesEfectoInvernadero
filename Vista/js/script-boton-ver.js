$(document).ready(function() {
    $('#ver-informacion').click(function() {
        var cveiden = $('#cveiden').val();
        $.ajax({
            url: '../Controlador/controlador-consultas.php',
            method: 'POST',
            data: { cveiden: cveiden },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#sector').val(response.data.SECTOR);
                    $('#cam').val(response.data.CAM);
                    $('#nombre_empresa').val(response.data.NombreEmpresa);
                    $('#scian').val(response.data.SCIAN);
                    $('#ubicacion').val(response.data.UBICACION);
                    $('#codigo_postal').val(response.data.CODIGOPOSTAL);
                    $('#municipio').val(response.data.MUNICIPIO);
                    $('#entidad_federativa').val(response.data.ENTIDADFEDERATIVA);
                    $('#latitud').val(response.data.LATITUD);
                    $('#longitud').val(response.data.LONGITUD);
                    $('#telefono').val(response.data.TELEFONO); 
                } else {
                    alert('Error al obtener los datos de la empresa.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error en la solicitud AJAX: ' + textStatus, errorThrown);
            }
        });
    });
});
