<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Keasikan Informatika 24</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS (Animate on Scroll) -->
    <style>
        /* Base font size control. Change --base-font-size to scale the whole UI. */
        :root { --base-font-size: 18px; }
        html { font-size: var(--base-font-size); }
        /* Slightly adjust body and paragraph sizes for better readability */
        body { font-size: 1rem; line-height: 1.6; }
        p { font-size: 0.95rem; }
        footer p { font-size: 0.7rem; }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <!-- GLightbox for lightbox previews -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <style>
        /* Simple CSS masonry using columns so we avoid extra JS/layout libs */
        #galleryGrid { column-gap: 1rem; }
        @media (min-width: 640px) { #galleryGrid { column-count: 2; } }
        @media (min-width: 768px) { #galleryGrid { column-count: 3; } }
        @media (min-width: 1024px) { #galleryGrid { column-count: 4; } }
        #galleryGrid .masonry-item { display: inline-block; width: 100%; margin: 0 0 1rem; break-inside: avoid; }
    </style>

</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Hero landing with navbar (desktop-first) --}}
    @php
        $hero = $photos->first() ?? null;
        $heroUrl = $hero?->image ?? '/storage/galleries/01K8TTK1GY8YNJCBHM8AKSPS6H.jpg';
    @endphp

    <nav class="fixed inset-x-0 top-0 z-40" style="background: rgba(255,255,255,0.06); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border-bottom: 1px solid rgba(255,255,255,0.08);">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-12">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-lg">VANGUARD24</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="text-white hover:underline text-sm">Home</a>
                    <a href="#gallery" class="text-white hover:underline text-sm">Galeri</a>
                    <a href="#" class="text-white hover:underline text-sm">About</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @php
            // prefer heroPhotos if provided by controller, otherwise use first gallery images
            $sourceForHero = isset($heroPhotos) && count($heroPhotos) ? collect($heroPhotos) : collect($photos);
            $photoUrls = $sourceForHero->pluck('image')->values()->all();
        @endphp

    <section id="hero" class="min-h-screen relative overflow-hidden flex items-center justify-center">
            <!-- two layers for crossfade -->
            <div id="hero-layer-a" class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100"></div>
            <div id="hero-layer-b" class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"></div>

            <!-- gradient overlay to darken images for readable text -->
            <div class="absolute inset-0" style="background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35));"></div>

            <div class="relative z-10 max-w-4xl mx-auto text-center px-6">
                <h1 class="text-white text-4xl md:text-6xl font-extrabold drop-shadow-lg">Hero Test</h1>
                <p class="mt-4 text-white text-lg md:text-xl opacity-90">Test</p>
                <div class="mt-8">
                    <a href="#gallery" class="inline-block bg-white text-gray-800 px-6 py-3 rounded-full font-semibold shadow hover:shadow-lg">Lihat Galeri</a>
                </div>
            </div>
        </section>
    </main>

    {{-- Activities section (replaces "Our Concept") --}}
    @php
        // Exclude hero images from activities so hero images don't appear twice
        $activityPhotos = collect($photos)->reject(function ($p) {
            if (is_array($p)) {
                return ($p['is_hero'] ?? false);
            }
            if (is_object($p)) {
                return ($p->is_hero ?? false);
            }
            return false;
        })->values()->all();
    @endphp

    <section id="activities" class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-semibold">Our Activities</h2>
                <p class="mt-2 text-sm text-gray-500">Kumpulan moment kegiatan kami.</p>
            </div>

            <style>
                /* Masonry-style columns so images keep natural aspect ratio */
                #activitiesGrid { column-gap: 1rem; }
                @media (min-width: 768px) { #activitiesGrid { column-count: 3; } }
                @media (max-width: 767px) { #activitiesGrid { column-count: 1; } }
                #activitiesGrid .activity-item { display: inline-block; width: 100%; margin: 0 0 1rem; break-inside: avoid; }
                #activitiesGrid .activity-item img { width: 100%; height: auto; display: block; }
            </style>

            <div id="activitiesGrid">
                @foreach(array_slice($activityPhotos, 0, 12) as $i => $foto)
                    @php $url = is_array($foto) ? ($foto['image'] ?? '/storage/galleries/01K8TTK1GY8YNJCBHM8AKSPS6H.jpg') : ($foto->image ?? '/storage/galleries/01K8TTK1GY8YNJCBHM8AKSPS6H.jpg'); @endphp
                    <div class="activity-item rounded overflow-hidden shadow-md">
                        <a href="{{ $url }}" class="glightbox block">
                            <img src="{{ $url }}" alt="Activity {{ $i+1 }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-white shadow text-black p-3 mt-2 text-center">
        <p>&copy;  2025 Ridd. Built with ☕.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({ once: true, duration: 600 });
            const lightbox = GLightbox({ selector: '.glightbox' });
        });
    </script>

    <script>
        // Hero slideshow using gallery images (crossfade between two layers)
        document.addEventListener('DOMContentLoaded', function () {
            const photos = @json($photoUrls ?? []);
            if (!photos || photos.length === 0) return;

            const layerA = document.getElementById('hero-layer-a');
            const layerB = document.getElementById('hero-layer-b');
            const hero = document.getElementById('hero');

            let current = 0;
            let activeA = true;

            // initialize
            layerA.style.backgroundImage = `url('${photos[0]}')`;
            if (photos.length > 1) {
                layerB.style.backgroundImage = `url('${photos[1]}')`;
            } else {
                layerB.style.backgroundImage = `url('${photos[0]}')`;
            }

            let timer = null;
            function startSlideshow() {
                if (timer) return;
                timer = setInterval(() => {
                    const next = (current + 1) % photos.length;
                    const nextUrl = photos[next];

                    const currentLayer = activeA ? layerA : layerB;
                    const nextLayer = activeA ? layerB : layerA;

                    // prepare next layer
                    nextLayer.style.backgroundImage = `url('${nextUrl}')`;
                    nextLayer.classList.remove('opacity-0');
                    nextLayer.classList.add('opacity-100');

                    // fade out current
                    currentLayer.classList.remove('opacity-100');
                    currentLayer.classList.add('opacity-0');

                    // switch
                    activeA = !activeA;
                    current = next;
                }, 5000);
            }

            function stopSlideshow() {
                if (timer) { clearInterval(timer); timer = null; }
            }

            // start automatically on desktop; pause on hover
            startSlideshow();
            hero.addEventListener('mouseenter', stopSlideshow);
            hero.addEventListener('mouseleave', startSlideshow);
        });
    </script>

    </body>
</html>