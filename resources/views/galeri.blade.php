<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
   <div class="toast-container" id="toastContainer"></div>

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
                <li><a href="#contact">Notes</a></li>
            </ul>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
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
           <div class="container_mouse">
    <span class="mouse-btn">
        <span class="mouse-scroll"></span>
    </span>
    <span style="font-size: 15px">Scroll Down</span>
</div>
          
        </div>
    </section>


  <!-- ================== ABOUT SECTION ================== -->
  <section class="features" id="features">
    <div class="features-container">
      <h2 class="section-title">About Vanguard 24</h2>
      <p class="section-subtitle">Every word that defines us</p>

      @if($aboutPhotos->isNotEmpty())
      <!-- Jika ada lebih dari satu foto, tampilkan slider -->
      <div class="features-image-wrapper">
        @foreach($aboutPhotos as $index => $photo)
        <img 
          src="{{ Storage::url($photo->file) }}" 
          alt="{{ $photo->title ?? 'About Vanguard 24' }}" 
          class="features-image @if($index === 0) active @endif"
          data-index="{{ $index }}"
          data-description="{{ $photo->description ?? '' }}"
          style="@if($index !== 0) display:none; @endif">
        @endforeach
      </div>

      <div class="features-description">
        <p id="about-text">
          {{ $aboutPhotos->first()->description ?? 'Informatics 24, known as Vanguard 24, is a vibrant and dynamic community of students at Sultan Ageng Tirtayasa University...' }}
        </p>

        @if($aboutPhotos->count() > 1)
        <a href="#" class="btn" id="about-next-btn">Next</a>
        @endif
      </div>
      @else
      <!-- Jika tidak ada foto dengan category about -->
      <div class="features-image-wrapper">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Default About Image" class="features-image" />
      </div>
      <div class="features-description">
        <p>
          Informatics 24, known as Vanguard 24, is a vibrant and dynamic community of students at Sultan Ageng Tirtayasa University. Our name, Vanguard, reflects our commitment to being at the forefront of innovation, technology, and academic excellence...
        </p>
      </div>
      @endif
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

  <!-- ===================== Prestasi Section ===================== -->
  @php
  $prestasiItems = $galleries->where('category', 'prestasi');
  @endphp

  @if($prestasiItems->count() > 0)
  <section class="prestasi-section" id="prestasi">
    <h2 class="section-title">Our Achievements</h2>
    <p class="section-subtitle">Proud moments of our journey together</p>

    <div class="awards-row">
      <div class="awards-carousel" id="awards-carousel">
        @foreach($prestasiItems as $prestasi)
        <div class="award-card">
          <img src="{{ Storage::url($prestasi->file) }}" alt="{{ $prestasi->title ?? 'Prestasi' }}">
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif


  <!-- 🔹 Gallery Section (Pinterest-style Masonry) -->
  <section class="gallery-section" id="pricing">
    <h2 class="section-title">Informatics 24 Gallery</h2>
    <p class="section-subtitle">Every picture tells a story of our journey</p>

    <div class="gallery">
      @foreach ($galleries->whereNotIn('category', ['prestasi', 'about']) as $gallery)
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
              <label for="noteName">Name</label>
              <input type="text" id="noteName" name="noteName" placeholder="Enter your name" required>
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





  <footer>
  <div class="footer-container">
    <!-- Brand Section -->
    <div class="footer-brand">
      <div class="footer-logo">
      <img src="{{ asset('images/Vanguard-Logo2.jpg') }}" alt="Vanguard" class="logo-img" />
      
      </div>
      <div class="brand-info">
        <h3>Vanguard Website Profile</h3>
        <p>© 2025 Vanguard. All rights reserved.</p>
      </div>
    </div>

    <!-- Social Media Section -->
    <div class="footer-social">
      <span class="social-label">Follow us:</span>
      <div class="social-icons">
        <a href="#" class="social-icon" data-platform="facebook" title="Facebook">
          f
        </a>
        <a href="#" class="social-icon" data-platform="twitter" title="Twitter">
          𝕏
        </a>
        <a href="#" class="social-icon" data-platform="instagram" title="Instagram">
          📷
        </a>
        <a href="#" class="social-icon" data-platform="linkedin" title="LinkedIn">
          in
        </a>
      </div>
    </div>
  </div>
</footer>

  <script src="{{asset('script.js')}}"></script>


</body>

</html>