document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-empresa').addEventListener('click', function(event) {
        event.preventDefault();

        var form = document.getElementById('formulario-empresa');
        var formData = new FormData(form);
        formData.append('action', 'guardar');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('Empresa creada exitosamente.');
                            form.reset();
                            verificarIndicadores(); 
                        } else {
                            alert('Error al crear la empresa. ' + (response.error || ''));
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                        alert('Error en la respuesta del servidor.');
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status, xhr.statusText);
                }
            }
        };
        xhr.send(formData);
    });
});
