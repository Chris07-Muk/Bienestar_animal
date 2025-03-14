
document.addEventListener("DOMContentLoaded", function () {
    // Selecciona todos los divs que contienen mapas
    const mapContainers = document.querySelectorAll(".map-container");

    mapContainers.forEach((container) => {
       const lat = parseFloat(container.dataset.lat);
       const lng = parseFloat(container.dataset.lng);

       if (!isNaN(lat) && !isNaN(lng)) {
          // Inicializa el mapa
          const map = L.map(container.id).setView([lat, lng], 13);

          // Añade el tile layer
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          // Añade un marcador en las coordenadas dadas
          L.marker([lat, lng]).addTo(map)
             .bindPopup('Ubicación aproximada.')
             .openPopup();
       }
    });
 });

