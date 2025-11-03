
  // ================== Navbar Show/Hide on Scroll + Transparency ==================
  const header = document.getElementById("main-header") || document.querySelector("header");
  const hamburger = document.getElementById("hamburger") || document.querySelector(".hamburger");
  const mobileNav = document.getElementById("mobile-nav") || document.querySelector(".nav-links");
  let lastScrollTop = 0;

  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Navbar show/hide
    if (scrollTop > lastScrollTop && scrollTop > 100) {
      header.classList.remove("show");
      header.classList.add("hide");
    } else {
      header.classList.remove("hide");
      header.classList.add("show");
    }

    // Opacity change on scroll
    if (scrollTop > 50) {
      header.classList.add("scrolled");
      header.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.1)";
    } else {
      header.classList.remove("scrolled");
      header.style.boxShadow = "0 2px 8px rgba(0, 0, 0, 0.05)";
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });

  // ================== Hamburger Animation ==================
  hamburger.addEventListener("click", (e) => {
    e.stopPropagation();
    hamburger.classList.toggle("active");
    mobileNav.classList.toggle("active");

    // Animate hamburger bars (if using span bars)
    const spans = hamburger.querySelectorAll("span");
    if (spans.length === 3) {
      spans[0].style.transform = mobileNav.classList.contains("active") ? "rotate(45deg) translate(8px, 8px)" : "none";
      spans[1].style.opacity = mobileNav.classList.contains("active") ? "0" : "1";
      spans[2].style.transform = mobileNav.classList.contains("active") ? "rotate(-45deg) translate(7px, -7px)" : "none";
    }
  });

  // Close menu when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest("header")) {
      hamburger.classList.remove("active");
      mobileNav.classList.remove("active");
      const spans = hamburger.querySelectorAll("span");
      spans.forEach(span => {
        span.style.transform = "none";
        span.style.opacity = "1";
      });
    }
  });

  // Close menu on link click
  document.querySelectorAll(".mobile-nav a, .nav-links a").forEach((link) => {
    link.addEventListener("click", () => {
      hamburger.classList.remove("active");
      mobileNav.classList.remove("active");
      const spans = hamburger.querySelectorAll("span");
      spans.forEach(span => {
        span.style.transform = "none";
        span.style.opacity = "1";
      });
    });
  });

  // ================== Smooth Scrolling ==================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      }
    });
  });

  // ================== Button Action Logging ==================
  document.querySelectorAll(".btn-primary, .btn-secondary").forEach(button => {
    button.addEventListener("click", function () {
      console.log("Button clicked:", this.textContent);
    });
  });

  // ================== Text Flip Animation ==================
  class TextFlip {
    constructor(options = {}) {
      this.textElement = document.getElementById("flipText");
      this.words = options.words || ["Sleepers", "Coders", "Strongest", "Initiators"];
      this.duration = options.duration || 3000;
      this.currentIndex = 0;
      this.init();
    }

    init() {
      this.setNextWord();
    }

    setNextWord() {
      const exitClass = "exit";
      this.textElement.classList.add(exitClass);
      setTimeout(() => {
        this.currentIndex = (this.currentIndex + 1) % this.words.length;
        this.textElement.textContent = this.words[this.currentIndex];
        this.textElement.classList.remove(exitClass);
        setTimeout(() => this.setNextWord(), this.duration);
      }, 500);
    }
  }

  const textFlip = new TextFlip({
    words: ["Sleepers", "Coders", "Strongest", "Initiators"],
    duration: 3000
  });

  // ================== Typing Text Animation ==================
  const text = "Welcome To Vanguard 24 Website Profile";
  const typingText = document.getElementById("typing-text");
  let index = 0;
  function typeEffect() {
    if (index < text.length) {
      typingText.textContent += text.charAt(index);
      index++;
      setTimeout(typeEffect, 80);
    }
  }
  window.addEventListener("load", typeEffect);

  // ================== Floating Elements Follow Mouse ==================
  document.addEventListener("mousemove", (e) => {
    const floatingElements = document.querySelectorAll(".floating-element");
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;

    floatingElements.forEach((element, index) => {
      const move = 20 * (index + 1);
      element.style.transform = `translate(${x * move}px, ${y * move}px)`;
    });
  });

  // ================== Gallery Modal ==================
  const items = document.querySelectorAll(".gallery-item");
  const modal = document.getElementById("modal");
  const modalImg = document.getElementById("modal-img");
  const modalTitle = document.getElementById("modal-title");
  const modalDesc = document.getElementById("modal-desc");
  const closeBtn = document.getElementById("close");

  items.forEach(item => {
    item.addEventListener("click", () => {
      modalImg.src = item.dataset.img;
      modalTitle.textContent = item.dataset.title;
      modalDesc.textContent = item.dataset.desc;
      modal.classList.add("show");
      document.body.style.overflow = "hidden";
    });
  });

  closeBtn.addEventListener("click", () => {
    modal.classList.remove("show");
    document.body.style.overflow = "auto";
  });

  modal.addEventListener("click", e => {
    if (e.target === modal) {
      modal.classList.remove("show");
      document.body.style.overflow = "auto";
    }
  });

  // ================== Testimonials Auto Scroll ==================
  const testimonials = [
    {
      quote: "It was the best of times, it was the worst of times...",
      name: "Charles Dickens",
      title: "A Tale of Two Cities"
    },
    {
      quote: "To be, or not to be, that is the question...",
      name: "William Shakespeare",
      title: "Hamlet"
    },
    {
      quote: "All that we see or seem is but a dream within a dream.",
      name: "Edgar Allan Poe",
      title: "A Dream Within a Dream"
    },
    {
      quote: "It is a truth universally acknowledged...",
      name: "Jane Austen",
      title: "Pride and Prejudice"
    },
    {
      quote: "Call me Ishmael...",
      name: "Herman Melville",
      title: "Moby-Dick"
    },
  ];

  function createScroller(listId, direction, speed) {
    const scroller = document.querySelector(`#${listId}`).parentElement.parentElement;
    const scrollerInner = document.getElementById(listId);

    testimonials.forEach(item => {
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

    const cards = Array.from(scrollerInner.children);
    cards.forEach(card => scrollerInner.appendChild(card.cloneNode(true)));

    scroller.style.setProperty("--animation-direction", direction === "left" ? "forwards" : "reverse");

    const duration = speed === "fast" ? "20s" : speed === "normal" ? "40s" : "80s";
    scroller.style.setProperty("--animation-duration", duration);

    scrollerInner.classList.add("animate-scroll");
  }

  createScroller("card-list-1", "right", "slow");
  createScroller("card-list-2", "left", "slow");

  // ================== Modal Notes ==================
  const openNoteModalBtn = document.getElementById("openBtn");
  const modalOverlay = document.getElementById("modalOverlay");
  const noteCloseBtn = document.getElementById("closeBtn");
  const noteCancelBtn = document.getElementById("cancelBtn");
  const noteSubmitBtn = document.getElementById("submitBtn");
  const noteForm = document.getElementById("noteForm");

  openNoteModalBtn?.addEventListener("click", () => {
    modalOverlay.classList.add("active");
    document.body.style.overflow = "hidden";
  });

  function closeNoteModal() {
    modalOverlay.classList.remove("active");
    document.body.style.overflow = "auto";
    noteForm.reset();
  }

  noteCloseBtn?.addEventListener("click", closeNoteModal);
  noteCancelBtn?.addEventListener("click", closeNoteModal);
  modalOverlay?.addEventListener("click", e => {
    if (e.target === modalOverlay) closeNoteModal();
  });

  noteSubmitBtn?.addEventListener("click", e => {
    e.preventDefault();
    alert("💡 Form belum aktif — ini hanya tampilan saja.");
  });

  document.addEventListener("keydown", e => {
    if (e.key === "Escape" && modalOverlay?.classList.contains("active")) closeNoteModal();
  });
