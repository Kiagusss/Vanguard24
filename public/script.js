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