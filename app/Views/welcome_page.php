<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS Wisata Sukabumi</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>">
    <link rel="icon" type="image/png" href="logo/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans">
    <?php include(APPPATH . 'Views/templates/navbar.php'); ?>

    <section id="explore" class="explore py-40 relative h-screen bg-cover bg-center text-center" style="background-image: url('https://jalanjalanyuk.co.id/wp-content/uploads/2024/01/3.-Rekomendasi-5-Tempat-Wisata-Sukabumi-Dekat-Stasiun-Sukabumi-2-1.jpg');">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="explore-content top-20 relative z-10 flex flex-col items-center justify-center h-full text-white">
            <h1 class="text-4xl md:text-7xl font-black tracking-tight leading-tight mb-4">WELCOME TO GIS <br>WISATA SUKABUMI</h1>
            <p class="text-lg mb-8">Tugas Project UAS SIG Ari Perdian(20220040072)</p>
            <a href="<?= site_url('explore_place'); ?>" class="btn bg-yellow-500 text-white py-3 px-6 text-xl rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out">Explore Now</a>
        </div>
    </section>

    <section id="about-sukabumi" class="about-sukabumi py-40 bg-gray-100">
        <div class="about-sukabumi-content max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Tentang Sukabumi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="description">
                    <p class="text-lg leading-relaxed text-gray-700">
                    Sukabumi adalah sebuah kota yang terletak di Provinsi Jawa Barat, Indonesia. Kota ini dikelilingi oleh pegunungan dan hutan, sehingga memiliki pemandangan alam yang indah dan udara yang sejuk. Sukabumi juga dikenal dengan potensi wisata alamnya, seperti air terjun, danau, serta trekking gunung. Selain itu, Sukabumi memiliki kebudayaan lokal yang kental dan menjadi pusat perdagangan serta industri di wilayah selatan Jawa Barat. Sebagai kota yang terus berkembang, Sukabumi juga memiliki berbagai fasilitas pendidikan, kesehatan, dan infrastruktur yang mendukung kehidupan masyarakatnya.
                    </p>
                </div>
                <div class="image">
                    <img class="rounded-lg shadow-lg" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiBZHeIXqx9OOTcQ3xfSPbk5wTr1YWD_bZaDyN1eS4NO9KFHETLsjrpMcAsSTgSuv-I259cS3neOThgEz8OH-G8tG_2lIQ4sATk_WIFjyY5WhjddTkZDi2AL9WSswQQCbOVftCAfC07gDSXMWSzQAf2fymYC-XUD8O55OL-zvTI9Nw1jFC8yvCqu8iQHWdG/s1600/WhatsApp%20Image%202024-02-02%20at%2010.43.49.jpeg" alt="sukabumi">
                </div>
            </div>
        </div>
    </section>

    <section id="tourist-places" class="tourist-places py-40 bg-gray-200">
        <div class="tourist-places-cards max-w-6xl mx-auto text-center sm:px-6 lg:px-8 py-100 rounded-lg">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-black">OBJEK WISATA</h2>
            <?php if (empty($places)): ?>
                <div class="no-places">
                    <img src="<?= base_url('images/bg-not-found.png') ?>" alt="No Places" class="mx-auto mb-4">
                    <p class="text-black">No places now.</p>
                </div>
            <?php else: ?>
                <div class="place-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 justify-items-center">
                    <?php foreach ($places as $place) : ?>
                        <div class="place-card relative bg-white bg-opacity-90 rounded-lg overflow-hidden transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <div class="place-card-content absolute inset-0 bg-black bg-opacity-50 text-white p-6 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <h3 class="text-xl font-semibold mb-4"><?= $place['name'] ?></h3>
                                <a href="<?= site_url('place_detail/' . $place['id']) ?>" class="btn bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out">Place Details</a>
                            </div>
                            <img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" class="w-full h-80 object-cover">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pagination mt-8 flex justify-center">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </section>


    <section id="maps" class="maps py-40 bg-gray-100">
        <div class="max-w-3xl mx-auto text-center px-12 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-16">Maps</h2>
            <div id="map" class="map h-80 w-full rounded-lg shadow-md"></div>
        </div>
    </section>

    <?php include(APPPATH . 'Views/templates/footer.php'); ?>

    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>    
    <script src="<?= base_url('js/MapsPrewiewLanding.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // ScrollReveal
        ScrollReveal().reveal('.explore-content, .about-sukabumi-content, .tourist-places-cards, .map, .sdgs-cards', {
            duration: 1000,
            origin: 'bottom',
            distance: '50px',
            delay: 200
        });

        // Leaflet map
        var map = L.map('map').setView([-6.9200, 106.9300], 12); // zoom 12, lebih dekat ke Sukabumi


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Informasi marker
        var places = <?= json_encode($places) ?>;

        places.forEach(function(place) {
            var marker = L.marker([place.latitude, place.longitude]).addTo(map).bindPopup(`<b>${place.name}</b><br>${place.location}<br>${place.description}`);
            
            marker.on('click', function() {
                openPopup(place);
            });
        });
    </script>
</body>
</html>
