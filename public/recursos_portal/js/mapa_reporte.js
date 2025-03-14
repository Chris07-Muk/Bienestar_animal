document.addEventListener("DOMContentLoaded", function() {
    // Detectar todos los elementos con clase "map-container"
    var mapContainers = document.querySelectorAll(".map-container");

    mapContainers.forEach(function(container) {
        // Obtener las coordenadas desde los atributos data
        var lat = parseFloat(container.getAttribute("data-lat"));
        var lng = parseFloat(container.getAttribute("data-lng"));

        if (!isNaN(lat) && !isNaN(lng)) {
            // Crear el mapa para cada contenedor
            var map = L.map(container.id).setView([lat, lng], 14);

            // Añadir capa de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Añadir marcador
            L.marker([lat, lng]).addTo(map)
                .bindPopup("Ubicación reportada")
                .openPopup();
        } else {
            console.error(`Coordenadas inválidas para el contenedor con ID ${container.id}`);
        }
    });
});
