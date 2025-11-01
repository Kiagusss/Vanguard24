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
                <img src="{{asset('images/Vanguard-Logo.jpg')}}" alt="as" width="50px" height="50px">
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

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">

    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="pricing-container">
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Choose the perfect plan for your team. Always flexible, always fair.</p>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-name">Starter</div>
                    <p class="pricing-description">Perfect for individuals and small teams</p>
                    <div class="pricing-price">$29</div>
                    <div class="pricing-period">per month, billed annually</div>
                    <ul class="pricing-features">
                        <li>Up to 5 workflows</li>
                        <li>100 tasks per month</li>
                        <li>Basic integrations</li>
                        <li>Email support</li>
                    </ul>
                    <button class="btn-primary">Get Started</button>
                </div>
                <div class="pricing-card featured">
                    <div class="pricing-badge">Most Popular</div>
                    <div class="pricing-name">Professional</div>
                    <p class="pricing-description">For growing teams and businesses</p>
                    <div class="pricing-price">$99</div>
                    <div class="pricing-period">per month, billed annually</div>
                    <ul class="pricing-features">
                        <li>Unlimited workflows</li>
                        <li>10,000 tasks per month</li>
                        <li>500+ integrations</li>
                        <li>Priority support</li>
                        <li>Advanced analytics</li>
                    </ul>
                    <button class="btn-primary">Get Started</button>
                </div>
                <div class="pricing-card">
                    <div class="pricing-name">Enterprise</div>
                    <p class="pricing-description">For large organizations</p>
                    <div class="pricing-price">Custom</div>
                    <div class="pricing-period">contact sales for pricing</div>
                    <ul class="pricing-features">
                        <li>Everything in Professional</li>
                        <li>Unlimited tasks</li>
                        <li>Custom integrations</li>
                        <li>Dedicated support</li>
                        <li>SLA guarantee</li>
                    </ul>
                    <button class="btn-primary">Contact Sales</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="final-cta" id="contact">
        <div class="final-cta-container">
            <h2>Ready to Transform Your Workflow?</h2>
            <p>Join thousands of teams already using StreamLine to automate their work and boost productivity.</p>
            <button class="btn-primary">Start Your Free Trial Today</button>
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
    </script>
</body>

</html>