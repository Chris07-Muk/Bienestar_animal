document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('mapa').setView([19.3135, -98.2406], 14); // Coordenadas de Tlaxcala

    // Añadir un fondo de mapa usando OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Crear un marcador inicial
    var marker = L.marker([19.3135, -98.2406]).addTo(map)
       .bindPopup("Ubicación de la mascota")
       .openPopup();

    // Hacer que el marcador se mueva y actualizar las coordenadas en el formulario
    map.on('click', function(event) {
       marker.setLatLng(event.latlng);
       document.getElementById('latitude').value = event.latlng.lat.toFixed(6);
       document.getElementById('longitude').value = event.latlng.lng.toFixed(6);
    });

    // Función para buscar una dirección y centrar el mapa en la ubicación
    function buscarDireccion(direccion) {
       fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + direccion)
          .then(response => response.json())
          .then(data => {
             if (data.length > 0) {
                var lat = data[0].lat;
                var lon = data[0].lon;
                map.setView([lat, lon], 14);
                marker.setLatLng([lat, lon]);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
             }
          });
    }

    // Manejar el evento de búsqueda
    document.getElementById("buscarBtn").addEventListener("click", function() {
        var direccion = document.getElementById("direccion").value;
        buscarDireccion(direccion);
    });

    // Manejar el envío del formulario
    /*document.getElementById("reportForm").addEventListener("submit", function(event) {
        event.preventDefault();  // Prevenir el envío real del formulario
        alert("Reporte enviado!");
        // Aquí podrías manejar el envío de los datos del formulario a un servidor
    });*/
});