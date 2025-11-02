<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanguard 24</title>
    <link rel="stylesheet" href="/landing-page/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Hero section with background image -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="slide-up">Selamat Datang <br> di Web Angkatan Infomatika 2024</h1>
            <p class="slide-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="social-links slide-up">
                <a href="#" class="social-icon"><img src="/landing-page/images/ig.png" alt="Instagram"></a>
                <a href="#" class="social-icon"><img src="/landing-page/images/wa.png" alt="WhatsApp"></a>
                <a href="#" class="social-icon"><img src="/landing-page/images/tt.png" alt="TikTok"></a>
            </div>
        </div>
    </section>

    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <a href="#" class="nav-logo">
                <img src="/landing-page/images/logo.png" alt="Vanguard 24 Logo">
            </a>
            <div class="nav-links">
                <a href="#home" class="active">Beranda</a>
                <a href="#about">About us</a>
                @if($prestasi->isNotEmpty())
                <a href="#prestasi">Prestasi</a>
                @endif
                @if($moments->isNotEmpty())
                <a href="#moments">Foto</a>
                @endif
                <a href="#messages">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Section directly below hero with background image bg1.png -->
    <section class="bg-section" id="about">
        <div class="bg-container">
            <!-- Feature row: photo (foto-adit) + placeholder content -->
            <div class="feature-row">
                @if($aboutImages->isNotEmpty())
                <div class="feature-photo slide-left" id="about-photo-container">
                    @foreach($aboutImages as $index => $image)
                    <img src="{{ asset('storage/' . $image->file) }}"
                        alt="{{ $image->title ?? 'About Us' }}"
                        class="about-image @if($index === 0) active @endif"
                        data-index="{{ $index }}"
                        data-description="{{ $image->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}"
                        style="@if($index !== 0) display: none; @endif">
                    @endforeach
                </div>
                @endif
                <div class="feature-placeholder">
                    <div class="feature-content slide-right">
                        <h2>ABOUT US</h2>
                        <div class="divider"></div>
                        @if($aboutImages->isNotEmpty())
                        <p id="about-text">{{ $aboutImages->first()->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}</p>
                        @endif

                        @if($aboutImages->count() > 1)
                        <a href="#" class="btn" id="feature-next">Next</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section directly below bg1 using images/bg2.png -->
    <section class="bg-section-2" id="prestasi">
        <div class="bg-container">
            <!-- Prestasi / Awards row: center poster with side story cards -->
            @if($prestasi->isNotEmpty())
            <div class="awards-row">
                <div class="awards-carousel" id="awards-carousel">
                    @foreach($prestasi as $item)
                    <div class="award-card">
                        <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->title ?? 'Prestasi' }}">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Section with bg1 -->
    <section class="bg-section" id="moments">
        <div class="bg-container">
            <!-- OUR MOMENTS section -->
            <div class="moments-section">
                <h2 class="moments-title slide-up">OUR MOMENTS</h2>
                <div class="moments-grid">
                    @if($moments->isNotEmpty())
                    @foreach($moments as $moment)
                    <div class="moment-card fade-in" onclick="openLightbox(this)">
                        <img src="{{ asset('storage/' . $moment->file) }}" alt="{{ $moment->title ?? 'Moment' }}">
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="moments-footer">
                    <a href="#" class="btn">See More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section with bg2 -->
    <section class="bg-section-2" id="messages">
        <div class="bg-container">
            <div class="messages-section">
                <h2 class="messages-title slide-up">PESAN & KESAN</h2>

                <!-- Messages Display -->
                <div class="messages-display">
                    @forelse($messages as $message)
                    <div class="message fade-in">
                        <div class="message-content">
                            <h3>{{ $message->name }}</h3>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="message fade-in">
                        <div class="message-content">
                            <h3>Belum ada pesan</h3>
                            <p>Jadilah yang pertama mengirim pesan!</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Message Form -->
                <div class="message-form slide-up">
                    <h3>Kirim Pesan</h3>
                    <form id="messageForm">
                        <input type="text" name="name" placeholder="Nama" required>
                        <textarea name="message" placeholder="Pesan" required></textarea>
                        <button type="submit" class="btn">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">
                <span class="X"></span>
                <span class="Y"></span>
                <div class="close-text">Close</div>
            </button>
            <img id="lightbox-img" src="" alt="">
        </div>
    </div>

    <script src="/landing-page/js/main.js"></script>
    <script src="/landing-page/js/messages.js"></script>
</body>

</html>