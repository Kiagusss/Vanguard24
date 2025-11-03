<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamLine - Workflow Automation Made Simple</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script
        src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js"
        type="module"></script>
</head>

<body>
   <header id="main-header" class="apple-navbar">
  <nav>
    <a href="#" class="logo-container">
      <img src="{{ asset('images/Vanguard-Logo2.jpg') }}" alt="Vanguard" class="logo-img" />
      <span class="logo">Vanguard</span>
    </a>

    <ul class="nav-links">
      <li><a href="#features">About</a></li>
      <li><a href="#testimonials">Leaders</a></li>
      <li><a href="#pricing">Gallery</a></li>
      <li><a href="#quotes">Notes</a></li>
    </ul>

    <button class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </nav>

  <div class="mobile-nav" id="mobile-nav">
    <ul>
      <li><a href="#features">About</a></li>
      <li><a href="#testimonials">Leaders</a></li>
      <li><a href="#pricing">Gallery</a></li>
      <li><a href="#quotes">Notes</a></li>
    </ul>
  </div>
</header>
    <!-- Hero Section -->
    <section class="hero">
        <h1 id="typing-text"></h1>
        <p class="animate__animated animate__fadeInUp">
            We Code, We Create, We Connect — Informatics 2024 <br>
            Sultan Ageng Tirtayasa University.
        </p>
        <div class="demo-container animate__animated animate__fadeInUp">
            <div class="text-flip-wrapper animate__animated animate__fadeInUp">
                <span class="static-text animate__animated animate__fadeInUp">We Are </span>
                <span class="flip-box">
                    <span class="flip-text" id="flipText">Vanguard 24</span>
                </span>
            </div>
        </div>
        <div style="height: 100px"></div>
        <div class="hero-buttons animate__animated animate__fadeInUp">
            <dotlottie-wc
                src="https://lottie.host/691b7ca9-ff48-4198-a0fc-9c847a62fe44/B6qhw0lnbE.lottie"
                style="width: 50px; height: 50px;"
                autoplay
                loop>
            </dotlottie-wc>
            <p style="font-size: 15px">Scroll To View More</p>
        </div>
    </section>


    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-container">
            <h2 class="section-title">About Vanguard 24</h2>
            <p class="section-subtitle">Every words that meaning about us</p>
            <!-- 🔹 Big Image in the Middle -->
            <div class="features-image-wrapper">
                <img
                    src="{{ $heroImage ? Storage::url($heroImage->file) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d' }}"
                    alt="{{ $heroImage ? $heroImage->title : 'Vanguard 24 Informatics' }}"
                    class="features-image" />
            </div>

            <!-- 🔹 Text About Informatics 24 -->
            <div class="features-description">
                <p>
                    We are <strong>Informatics 2024</strong> — a collective of innovators,
                    dreamers, and creators from Sultan Ageng Tirtayasa University.
                    Together, we learn, code, and build the future through technology and
                    collaboration. Vanguard 24 stands for unity, strength, and the pursuit
                    of excellence — because we believe that every line of code is a story
                    of progress.
                </p>
            </div>
        </div>
    </section>
<section class="testimonials" id="testimonials">
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="accent-line"></div>
            <h2>Message From</h2>
            <h1>Ketua Angkatan</h1>
            <p>
               "Makasih udah saling jaga, saling dorong, dan nggak ninggalin siapa pun di angkatan ini. Makasih juga udah ngasih gue kepercayaan serta amanah buat ke depannya. Tolong tegur kalau gue lalai
atau buat salah. Tapi ingat, mau sesusah apa pun, pasti bakal gue usahain buat kita semua. Ayo kita berjuang dan berbakti untuk keluarga, himpunan, dan masa depan. Mari Mari kita buktikan kalau kita bukan sekadar nama, mari tanamkan arti di setiaplangkah kita semua. Satu langkah, satu tekad, satu suara. Terima kasih telah menjadi bagian dari perjuangan ini. Terima kasih, Informatika Angkatan 2024 (Vanguard 24)."
            </p>
            <div class="leader-name">— Vanguard 24 Leader</div>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="image-wrapper">
                <img src="{{ asset('images/Foto-Ketang.png') }}" alt="Our Leaders">
            </div>

            <!-- Leader Info -->
            <div class="leader-info">
                <div class="leader-name-text">Rizan Abki Chaerullah</div>
                <div class="leader-title">Ketua Angkatan Informatika 2024</div>
            </div>
        </div>
    </div>
</section>


    <!-- 🔹 Gallery Section (Pinterest-style Masonry) -->
<section class="gallery-section" id="pricing">
  <h2 class="section-title">Informatics 24 Gallery</h2>
  <p class="section-subtitle">Every picture tells a story of our journey</p>

  <div class="gallery">
    @foreach ($galleries as $gallery)
      <div class="gallery-item"
           data-title="{{ $gallery->title ?? 'Untitled' }}"
           data-desc="{{ $gallery->subtitle ?? '' }}"
           data-img="{{ Storage::url($gallery->file) }}">
        <img src="{{ Storage::url($gallery->file) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
      </div>
    @endforeach
  </div>

  <!-- Modal -->
  <div class="modal" id="modal">
    <span class="close-btn" id="close">&times;</span>
    <img id="modal-img" src="" alt="">
    <div class="caption">
      <h2 id="modal-title"></h2>
      <p id="modal-desc"></p>
    </div>
  </div>
</section>


<!-- ===================== Infinite Moving Cards Section ===================== -->
<section id="quotes" class="quotes-section">
  <h2 class="section-title">Notes</h2>
  <p class="section-subtitle">Create/Add your quotes, Notes And letter for Vanguard</p>

  <!-- Baris Pertama -->
  <div class="container">
    <div class="scroller" data-direction="right" data-speed="slow">
      <ul class="scroller__inner" id="card-list-1">
        <!-- Cards diisi lewat JS -->
      </ul>
    </div>
  </div>

  <!-- Baris Kedua -->
  <div class="container">
    <div class="scroller" data-direction="left" data-speed="slow">
      <ul class="scroller__inner" id="card-list-2">
        <!-- Cards diisi lewat JS -->
      </ul>
    </div>
  </div>
  <!-- Tombol Add Notes -->
<div class="add-notes-container">
    <button class="open-modal-btn" id="openBtn">Add Notes</button>
</div>

<!-- Modal Notes -->
<div class="modal-overlay" id="modalOverlay">
  <div class="note-modal">
    <!-- Header -->
    <div class="modal-header">
      <div>
        <h2>Add a New Note 📝</h2>
        <p class="modal-subtitle">Write down your thoughts, memories, or messages for Vanguard 24 ✨</p>
      </div>
      <button class="close-btn" id="closeBtn">&times;</button>
    </div>

    <!-- Body -->
    <div class="modal-body">
      <form id="noteForm">
        <div class="form-group">
          <label for="noteTitle">Title</label>
          <input type="text" id="noteTitle" name="noteTitle" placeholder="Enter your note title" required>
        </div>

        <div class="form-group">
          <label for="noteSubtitle">Subtitle</label>
          <input type="text" id="noteSubtitle" name="noteSubtitle" placeholder="Enter subtitle (optional)">
        </div>

        <div class="form-group">
          <label for="noteText">Note</label>
          <textarea id="noteText" name="noteText" placeholder="Write your note here..." required></textarea>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-submit" id="submitBtn">Save Note</button>
      <button type="button" class="btn btn-cancel" id="cancelBtn">Cancel</button>
    </div>
  </div>
</div>


</section>




   
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Roadmap</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 StreamLine. All rights reserved.</p>
                <div class="social-links">
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="LinkedIn">in</a>
                    <a href="#" title="GitHub">⚙</a>
                    <a href="#" title="Facebook">f</a>
                </div>
            </div>
        </div>
    </footer>

  <script src="{{asset('script.js')}}"></script>

    
</body>

</html>