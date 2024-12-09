<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Udayana Maps</title>
    
    {{-- Google Maps API Script --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvcv6V80SyLAWAGWQjzfq1I6-EXDyPl_s"></script>
    
    {{-- Leaflet CSS and JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    {{-- Tailwind CSS for responsive layout --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">Rektorat Universitas Udayana</h1>
        
        <div class="flex flex-col md:flex-row gap-6">
            {{-- Google Maps Container --}}
            <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg overflow-hidden">
                <h2 class="text-xl font-semibold p-4 bg-blue-50">Google Maps</h2>
                <div id="google-map" class="h-96"></div>
            </div>
            
            {{-- Leaflet Maps Container --}}
            <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg overflow-hidden">
                <h2 class="text-xl font-semibold p-4 bg-blue-50">OpenStreetMap</h2>
                <div id="leaflet-map" class="h-96"></div>
            </div>
        </div>
    </div>

    {{-- Map Initialization Scripts --}}
    <script>
        // Google Maps Initialization
        function initGoogleMap() {
            const location = { lat: -8.7984047, lng: 115.1698715 };
            
            const map = new google.maps.Map(document.getElementById('google-map'), {
                center: location,
                zoom: 15
            });
            
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Rektorat Universitas Udayana'
            });
            
            const infoWindow = new google.maps.InfoWindow({
                content: 'Kantor: Rektorat Universitas Udayana'
            });
            
            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });
        }

        // Leaflet Map Initialization
        function initLeafletMap() {
            const map = L.map('leaflet-map').setView([-8.7984047, 115.1698715], 15);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            const marker = L.marker([-8.7984047, 115.1698715]).addTo(map);
            
            marker.bindPopup('Kantor: Rektorat Universitas Udayana').openPopup();
        }

        // Initialize both maps
        window.onload = function() {
            initGoogleMap();
            initLeafletMap();
        };
    </script>
</body>
</html>