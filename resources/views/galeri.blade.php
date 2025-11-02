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
    <!-- Header -->
    <header>
        <nav>
            <div style="display: flex; flex-direction: row; align-items: center;">
                <img src="{{asset('images/Vanguard-Logo2.jpg')}}" alt="as" width="50px" height="50px">
                    <a href="#" class="logo">Vanguard</a>

            </div>

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
    <div class="gallery-item" data-title="Forest Path" data-desc="Aerial view of a road cutting through dense forest." data-img="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="gallery-item" data-title="Portrait" data-desc="Portrait image example that fits perfectly without black borders." data-img="https://images.unsplash.com/photo-1589571894960-20bbe2828d0a?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1589571894960-20bbe2828d0a?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="gallery-item" data-title="Cottage House" data-desc="A cozy house surrounded by flowers and nature’s calm atmosphere." data-img="https://images.unsplash.com/photo-1588880331179-bc9b93a8cb5e?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1588880331179-bc9b93a8cb5e?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="gallery-item" data-title="Mountain Lake" data-desc="Serene mountain lake with reflections of peaks and sky." data-img="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="gallery-item" data-title="Foggy Trees" data-desc="A calm morning view with foggy pine trees in the distance." data-img="https://images.unsplash.com/photo-1500534623283-312aade485b7?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="gallery-item" data-title="Sunset Horizon" data-desc="A warm sunset glow illuminating the distant horizon." data-img="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop">
      <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>
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

    <script>
        // Mobile menu toggle
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const navButtons = document.querySelector('.nav-buttons');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            navButtons.classList.toggle('active');

            // Animate hamburger
            const spans = hamburger.querySelectorAll('span');
            spans[0].style.transform = navLinks.classList.contains('active') ? 'rotate(45deg) translate(8px, 8px)' : 'none';
            spans[1].style.opacity = navLinks.classList.contains('active') ? '0' : '1';
            spans[2].style.transform = navLinks.classList.contains('active') ? 'rotate(-45deg) translate(7px, -7px)' : 'none';
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                navButtons.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        let lastScrollTop = 0;
        const header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 50) {
                header.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.05)';
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        // Button click handlers
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(button => {
            button.addEventListener('click', function() {
                console.log('Button clicked:', this.textContent);
                // Add your action here
            });
        });

        class TextFlip {
            constructor(options = {}) {
                this.textElement = document.getElementById("flipText")
                this.words = options.words || ["Sleepers", "Coders", "Strongest", "Innitiators"]
                this.duration = options.duration || 3000
                this.currentIndex = 0
                this.init()
            }

            init() {
                this.setNextWord()
            }

            setNextWord() {
                const exitClass = "exit"

                // Add exit animation
                this.textElement.classList.add(exitClass)

                // Wait for exit animation to finish
                setTimeout(() => {
                    // Update text
                    this.currentIndex = (this.currentIndex + 1) % this.words.length
                    this.textElement.textContent = this.words[this.currentIndex]

                    // Remove exit class to trigger entry animation
                    this.textElement.classList.remove(exitClass)

                    // Schedule next word change
                    setTimeout(() => this.setNextWord(), this.duration)
                }, 500) // Duration of exit animation
            }

            setWords(newWords) {
                this.words = newWords
            }

            setDuration(newDuration) {
                this.duration = newDuration
            }
        }

        // Initialize the text flip animation
        const textFlip = new TextFlip({
            words: ["Sleepers", "Coders", "Strongest", "Innitiators"],
            duration: 3000,
        })

        // Optional: Dark mode toggle for demonstration
        document.addEventListener("keydown", (e) => {
            if (e.key === "d" || e.key === "D") {
                document.body.classList.toggle("dark-mode")
            }
        })
        // Typing Text Animation
        const text = "Welcome To Vanguard 24 Website Profile";
        const typingText = document.getElementById("typing-text");
        let index = 0;

        function typeEffect() {
            if (index < text.length) {
                typingText.textContent += text.charAt(index);
                index++;
                setTimeout(typeEffect, 80); // kecepatan ketik (100ms)
            }
        }

        window.addEventListener("load", typeEffect);
   
    // Floating element follow mouse
    document.addEventListener('mousemove', (e) => {
        const floatingElements = document.querySelectorAll('.floating-element');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        floatingElements.forEach((element, index) => {
            const move = 20 * (index + 1);
            element.style.transform = `translate(${x * move}px, ${y * move}px)`;
        });
    });

    const items = document.querySelectorAll('.gallery-item');
  const modal = document.getElementById('modal');
  const modalImg = document.getElementById('modal-img');
  const modalTitle = document.getElementById('modal-title');
  const modalDesc = document.getElementById('modal-desc');
  const closeBtn = document.getElementById('close');

  items.forEach(item => {
    item.addEventListener('click', () => {
      modalImg.src = item.dataset.img;
      modalTitle.textContent = item.dataset.title;
      modalDesc.textContent = item.dataset.desc;
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
    });
  });

  closeBtn.addEventListener('click', () => {
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
  });

  modal.addEventListener('click', e => {
    if (e.target === modal) {
      modal.classList.remove('show');
      document.body.style.overflow = 'auto';
    }
  });

  const testimonials = [
  {
    quote:
      "It was the best of times, it was the worst of times, it was the age of wisdom, it was the age of foolishness...",
    name: "Charles Dickens",
    title: "A Tale of Two Cities",
  },
  {
    quote:
      "To be, or not to be, that is the question...",
    name: "William Shakespeare",
    title: "Hamlet",
  },
  {
    quote: "All that we see or seem is but a dream within a dream.",
    name: "Edgar Allan Poe",
    title: "A Dream Within a Dream",
  },
  {
    quote:
      "It is a truth universally acknowledged, that a single man in possession of a good fortune...",
    name: "Jane Austen",
    title: "Pride and Prejudice",
  },
  {
    quote:
      "Call me Ishmael. Some years ago—never mind how long precisely....",
    name: "Herman Melville",
    title: "Moby-Dick",
  },
];

// Fungsi umum untuk buat scroller
function createScroller(listId, direction, speed) {
  const scroller = document.querySelector(`#${listId}`).parentElement.parentElement;
  const scrollerInner = document.getElementById(listId);

  // Buat kartu
  testimonials.forEach((item) => {
    const li = document.createElement("li");
    li.className = "card";
    li.innerHTML = `
      <blockquote>${item.quote}</blockquote>
      <div class="author">
        <div class="name">${item.name}</div>
        <div class="title">${item.title}</div>
      </div>
    `;
    scrollerInner.appendChild(li);
  });

  // Gandakan untuk efek infinite
  const cards = Array.from(scrollerInner.children);
  cards.forEach((card) => {
    const clone = card.cloneNode(true);
    scrollerInner.appendChild(clone);
  });

  // Arah & kecepatan
  if (direction === "left") {
    scroller.style.setProperty("--animation-direction", "forwards");
  } else {
    scroller.style.setProperty("--animation-direction", "reverse");
  }

  if (speed === "fast") {
    scroller.style.setProperty("--animation-duration", "20s");
  } else if (speed === "normal") {
    scroller.style.setProperty("--animation-duration", "40s");
  } else {
    scroller.style.setProperty("--animation-duration", "80s");
  }

  scrollerInner.classList.add("animate-scroll");
}

// Jalankan untuk dua baris
createScroller("card-list-1", "right", "slow");
createScroller("card-list-2", "left", "slow");
// ================== Modal Notes ==================
const openNoteModalBtn = document.getElementById('openBtn');
const modalOverlay = document.getElementById('modalOverlay');
const noteCloseBtn = document.getElementById('closeBtn');
const noteCancelBtn = document.getElementById('cancelBtn');
const noteSubmitBtn = document.getElementById('submitBtn');
const noteForm = document.getElementById('noteForm');

// Buka modal ketika tombol Add Notes ditekan
openNoteModalBtn.addEventListener('click', () => {
  modalOverlay.classList.add('active');
  document.body.style.overflow = 'hidden';
});

// Tutup modal (fungsi reusable)
function closeNoteModal() {
  modalOverlay.classList.remove('active');
  document.body.style.overflow = 'auto';
  noteForm.reset();
}

// Tombol close dan cancel
noteCloseBtn.addEventListener('click', closeNoteModal);
noteCancelBtn.addEventListener('click', closeNoteModal);

// Tutup modal ketika klik di luar konten modal
modalOverlay.addEventListener('click', e => {
  if (e.target === modalOverlay) closeNoteModal();
});

// Nonaktifkan fungsi submit (karena hanya tampilan)
noteSubmitBtn.addEventListener('click', e => {
  e.preventDefault();
  alert("💡 Form belum aktif — ini hanya tampilan saja.");
});

// Tutup dengan tombol Escape
document.addEventListener('keydown', e => {
  if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
    closeNoteModal();
  }
});

</script>

    
</body>

</html>