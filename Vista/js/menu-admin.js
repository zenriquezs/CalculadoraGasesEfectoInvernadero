$(document).ready(function () {
  $.ajax({
      url: "obtener_usuarios.php",
      method: "GET",
      dataType: "json",
      success: function (data) {
          let usuarios = "";
          data.forEach(function (usuario) {
              usuarios += ` 
                  <tr id="fila-${usuario.CVEIDEN}">
                      <td>${usuario.CVEIDEN}</td>
                      <td>
                          <a href="ver_tablas.php?CVEIDEN=${usuario.CVEIDEN}"><button>Ver Información</button></a>
                          <a href="generar_pdf.php?CVEIDEN=${usuario.CVEIDEN}" target="_blank"><button>Descargar PDF</button></a>
                          <button onclick="eliminarUsuario('${usuario.CVEIDEN}')">Eliminar Usuario</button>
                      </td>
                  </tr>
              `;
          });
          $("#usuarios-table").html(usuarios);
      },
      error: function (error) {
          console.log("Error al obtener los usuarios:", error);
      },
  });
});

function eliminarUsuario(CVEIDEN) {
  if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
      $.ajax({
          url: "eliminarUsuario.php",
          method: "POST",
          data: { CVEIDEN: CVEIDEN },
          success: function (response) {
              alert(response);
              $("#fila-" + CVEIDEN).remove();
          },
          error: function (error) {
              alert("Error al eliminar el usuario.");
              console.log(error);
          }
      });
  }
}
