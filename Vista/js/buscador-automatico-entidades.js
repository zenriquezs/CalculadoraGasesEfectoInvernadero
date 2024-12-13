
document.getElementById('codigo_postal').addEventListener('change', function() {

    let codigo_postal = this.value;
    let token = "244d879a-0c52-410f-9931-5d015e72a37f";
    let API_URL = `https://api.copomex.com/query/info_cp/${codigo_postal}?token=${token}`;
console.log(API_URL);
    fetch(API_URL)
        .then(response => response.json())
        .then(data => {

            document.getElementById('municipio').value = data[0].response.municipio;
            document.getElementById('entidad_federativa').value = data[0].response.estado;

        })
        .catch(error => console.error('Error al obtener datos de la API de copomex:', error));
});
