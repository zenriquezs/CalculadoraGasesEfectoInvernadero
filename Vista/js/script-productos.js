document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-agregar-producto').addEventListener('click', function(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById('formulario-productos'));

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-productos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        cargarProductos();
                        document.getElementById('formulario-productos').reset();
                        verificarIndicadores();  
                    } else {
                        alert('Error al agregar producto.');
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error en la respuesta del servidor.');
                }
            }
        };
        xhr.send(formData);
    });

    function cargarProductos() { 
        var cveiden = document.getElementById('cveiden').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controlador/controlador-productos.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var productos = JSON.parse(xhr.responseText);

                    var tablaBody = document.getElementById('tabla-productos-body');
                    tablaBody.innerHTML = '';
                    productos.forEach(function(producto) {
                        var row = document.createElement('tr');
                        row.innerHTML = 
                            '<td>' + producto.CVEIDEN + '</td>' +
                            '<td>' + producto.PRODUCTO + '</td>' +
                            '<td>' + producto.CANTIDAD + '</td>' +
                            '<td>' + producto.UNIDAD + '</td>' ;
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

    cargarProductos();
});
