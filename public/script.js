  // Mobile menu toggle
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const navButtons = document.querySelector('.nav-buttons');

        // ===================== Toast Notification Function =====================
        function showToast(message, type = 'success', title = null) {
          const container = document.getElementById('toastContainer');
          
          const toast = document.createElement('div');
          toast.className = `toast ${type}`;
          
          const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠'
          };
          
          const titles = {
            success: title || 'Success!',
            error: title || 'Error!',
            warning: title || 'Warning!'
          };
          
          toast.innerHTML = `
            <div class="toast-icon">${icons[type]}</div>
            <div class="toast-content">
              <div class="toast-title">${titles[type]}</div>
              <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="this.parentElement.remove()">×</button>
          `;
          
          container.appendChild(toast);
          
          // Auto remove after 3 seconds
          setTimeout(() => {
            if (toast.parentElement) {
              toast.remove();
            }
          }, 3000);
        }

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

// Fungsi untuk fetch notes dari database
async function fetchNotes() {
  try {
    const response = await fetch('/messages');
    const messages = await response.json();
    
    // Jika ada messages dari database, gunakan itu. Kalau tidak, pakai default
    if (messages && messages.length > 0) {
      return messages.map(message => ({
        quote: message.message,
        name: message.name,
        title: '' // tidak ada subtitle
      }));
    }
    return testimonials; // fallback ke data default
  } catch (error) {
    console.error('Error fetching notes:', error);
    return testimonials; // fallback ke data default
  }
}

// Fungsi umum untuk buat scroller
async function createScroller(listId, direction, speed) {
  const scrollerInner = document.getElementById(listId);
  const scroller = scrollerInner.parentElement.parentElement;

  // Clear previous content
  scrollerInner.innerHTML = '';

  // Fetch notes dari database
  const notesData = await fetchNotes();

  // Buat kartu (hanya sekali, tidak perlu duplikasi manual)
  notesData.forEach((item) => {
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

  // Gandakan untuk efek infinite (hanya sekali)
  const cards = Array.from(scrollerInner.children);
  cards.forEach((card) => {
    const clone = card.cloneNode(true);
    scrollerInner.appendChild(clone);
  });

  // Set data-direction di scroller parent
  scroller.setAttribute('data-direction', direction);

  // Set kecepatan
  if (speed === "fast") {
    scroller.style.setProperty("--animation-duration", "20s");
  } else if (speed === "normal") {
    scroller.style.setProperty("--animation-duration", "40s");
  } else {
    scroller.style.setProperty("--animation-duration", "80s");
  }
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
noteSubmitBtn.addEventListener('click', async (e) => {
  e.preventDefault();
  
  const name = document.getElementById('noteName').value;
  const message = document.getElementById('noteText').value;
  
  if (!name || !message) {
    showToast('Please fill in both name and note fields!', 'warning', 'Missing Information');
    return;
  }
  
  // Disable button saat submit
  noteSubmitBtn.disabled = true;
  noteSubmitBtn.textContent = 'Sending...';
  
  try {
    const response = await fetch('/message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
      },
      body: JSON.stringify({
        name: name,
        message: message
      })
    });
    
    const data = await response.json();
    
    if (data.success) {
      showToast('Your note has been successfully added! ✨', 'success', 'Note Saved!');
      closeNoteModal();
      
      // Reload scrollers dengan delay kecil untuk refresh
      setTimeout(async () => {
        await createScroller("card-list-1", "right", "slow");
        await createScroller("card-list-2", "left", "slow");
      }, 100);
    } else {
      showToast('Failed to save your note. Please try again.', 'error', 'Save Failed');
    }
  } catch (error) {
    console.error('Error:', error);
    showToast('An error occurred while saving. Please check your connection.', 'error', 'Connection Error');
  } finally {
    // Re-enable button
    noteSubmitBtn.disabled = false;
    noteSubmitBtn.textContent = 'Save Note';
  }
});

// Tutup dengan tombol Escape
document.addEventListener('keydown', e => {
  if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
    closeNoteModal();
  }
});

// ===================== Awards Carousel Functionality =====================
(function initAwardsCarousel() {
  const carousel = document.getElementById('awards-carousel');
  if (!carousel) return;

  const cards = carousel.querySelectorAll('.award-card');
  if (cards.length === 0) return;

  let currentIndex = 0;
  let isDragging = false;
  let startX = 0;
  let scrollLeft = 0;
  let hasDragged = false;

  // Mouse drag functionality
  carousel.addEventListener('mousedown', (e) => {
    isDragging = true;
    hasDragged = false;
    startX = e.pageX - carousel.offsetLeft;
    scrollLeft = carousel.scrollLeft;
    carousel.style.cursor = 'grabbing';
    e.preventDefault();
  });

  document.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - carousel.offsetLeft;
    const walk = (x - startX) * 1.5;
    
    if (Math.abs(walk) > 5) {
      hasDragged = true;
    }
    
    carousel.scrollLeft = scrollLeft - walk;
  });

  document.addEventListener('mouseup', () => {
    if (!isDragging) return;
    
    if (hasDragged) {
      setTimeout(() => {
        updateCenterCard();
        const centeredCard = cards[currentIndex];
        nudgeIntoPerfectCenter(centeredCard, 'smooth');
      }, 50);
    }
    isDragging = false;
    carousel.style.cursor = 'grab';
  });

  carousel.addEventListener('mouseleave', () => {
    if (isDragging && hasDragged) {
      setTimeout(() => {
        updateCenterCard();
        const centeredCard = cards[currentIndex];
        nudgeIntoPerfectCenter(centeredCard, 'smooth');
      }, 50);
      isDragging = false;
      carousel.style.cursor = 'grab';
    }
  });

  // Prevent image drag
  carousel.addEventListener('dragstart', (e) => {
    e.preventDefault();
  });

  // Touch support
  let touchStartX = 0;
  let touchStartY = 0;
  let scrollDirectionLocked = false;

  carousel.addEventListener('touchstart', (e) => {
    touchStartX = e.touches[0].pageX;
    touchStartY = e.touches[0].pageY;
    scrollDirectionLocked = false;
  }, { passive: true });

  carousel.addEventListener('touchmove', (e) => {
    if (scrollDirectionLocked) {
      e.preventDefault();
      return;
    }

    const deltaX = Math.abs(e.touches[0].pageX - touchStartX);
    const deltaY = Math.abs(e.touches[0].pageY - touchStartY);

    if (deltaX > deltaY) {
      scrollDirectionLocked = true;
      e.preventDefault();
    }
  }, { passive: false });

  // Update center card detection
  function updateCenterCard() {
    const carouselRect = carousel.getBoundingClientRect();
    const carouselCenter = carouselRect.left + carouselRect.width / 2;

    let closestCard = null;
    let minDistance = Infinity;

    cards.forEach((card, idx) => {
      const cardRect = card.getBoundingClientRect();
      const cardCenter = cardRect.left + cardRect.width / 2;
      const distance = Math.abs(cardCenter - carouselCenter);

      if (distance < minDistance) {
        minDistance = distance;
        closestCard = card;
        currentIndex = idx;
      }
    });

    cards.forEach(c => c.classList.remove('is-center'));
    if (closestCard) {
      closestCard.classList.add('is-center');
    }
  }

  function nudgeIntoPerfectCenter(card, behavior = 'smooth') {
    if (!card) return;

    requestAnimationFrame(() => {
      const containerRect = carousel.getBoundingClientRect();
      const cardRect = card.getBoundingClientRect();
      const containerCenter = containerRect.left + containerRect.width / 2;
      const cardCenter = cardRect.left + cardRect.width / 2;
      const offset = cardCenter - containerCenter;

      if (Math.abs(offset) > 2) {
        carousel.scrollBy({
          left: offset,
          behavior
        });
      }
    });
  }

  // Scroll event handling
  let carouselScrollTimer;
  carousel.addEventListener('scroll', function() {
    updateCenterCard();
    
    clearTimeout(carouselScrollTimer);
    if (!isDragging) {
      carouselScrollTimer = setTimeout(function() {
        const centeredCard = cards[currentIndex];
        nudgeIntoPerfectCenter(centeredCard, 'smooth');
      }, 150);
    }
  }, { passive: true });

  // Initialize - center first card
  setTimeout(() => {
    updateCenterCard();
    const firstCard = cards[0];
    nudgeIntoPerfectCenter(firstCard, 'auto');
  }, 100);

  // ============ Navigation Function ============
  function scrollToCard(index) {
    if (index < 0 || index >= cards.length) return;
    
    currentIndex = index;
    const targetCard = cards[index];
    nudgeIntoPerfectCenter(targetCard, 'smooth');
    
    setTimeout(() => {
      updateCenterCard();
    }, 300);
  }

  // ============ Click on Card to Center It ============
  cards.forEach((card, index) => {
    card.addEventListener('click', (e) => {
      // Hanya scroll ke center jika card belum centered dan bukan sedang drag
      if (!hasDragged && index !== currentIndex) {
        e.preventDefault();
        scrollToCard(index);
      }
      // Reset hasDragged setelah click
      hasDragged = false;
    });
    
    // Tambahkan cursor pointer
    card.style.cursor = 'pointer';
  });

  // ============ Keyboard Navigation (Arrow Keys) ============
  document.addEventListener('keydown', (e) => {
    // Cek apakah carousel ada di viewport atau sedang di-hover
    const carouselRect = carousel.getBoundingClientRect();
    const isInViewport = carouselRect.top < window.innerHeight && carouselRect.bottom > 0;
    
    if (!isInViewport) return;
    
    if (e.key === 'ArrowLeft') {
      e.preventDefault();
      const newIndex = currentIndex > 0 ? currentIndex - 1 : cards.length - 1;
      scrollToCard(newIndex);
    } else if (e.key === 'ArrowRight') {
      e.preventDefault();
      const newIndex = currentIndex < cards.length - 1 ? currentIndex + 1 : 0;
      scrollToCard(newIndex);
    }
  });
})();
