// Hide navbar on scroll down, show on scroll up
(function() {
	const nav = document.querySelector('nav');
	if (!nav) return;

	let lastScroll = 0;
	const hideThreshold = 50; // don't hide for tiny scrolls
	const blurThreshold = 8; // when to add blurred background

	function onScroll() {
		const current = window.scrollY || window.pageYOffset;

		// hide/show nav on scroll direction
		if (current > lastScroll && current > hideThreshold) {
			// scrolling down
			nav.classList.add('nav-hidden');
		} else {
			// scrolling up
			nav.classList.remove('nav-hidden');
		}

		// add/remove blur background depending on being at the very top
		if (current > blurThreshold) {
			nav.classList.add('nav-scrolled');
		} else {
			nav.classList.remove('nav-scrolled');
		}

		lastScroll = Math.max(0, current);
	}

	window.addEventListener('scroll', onScroll, { passive: true });
})();

// Adjust awards center poster height to match the actual image natural height (scaled to viewport)
(function adjustAwardsCenter(){
    const carousel = document.getElementById('awards-carousel');
    if(!carousel) return;

    const cards = carousel.querySelectorAll('.award-card');
    if(cards.length === 0) return;

    const nav = document.querySelector('nav');
    let currentIndex = 0;

    // --- Drag/Swipe functionality ---
    let isDragging = false;
    let startX = 0;
    let scrollLeft = 0;
    let hasDragged = false;

    carousel.addEventListener('mousedown', (e) => {
        isDragging = true;
        hasDragged = false;
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        carousel.style.cursor = 'grabbing';
        e.preventDefault(); // Prevent text selection in Chrome
    });

    // Use document-level listeners for better Chrome compatibility
    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 1.5; // Multiplier untuk sensitivity
        
        // Mark as dragged if moved more than 5px
        if (Math.abs(walk) > 5) {
            hasDragged = true;
        }
        
        carousel.scrollLeft = scrollLeft - walk;
    });

    document.addEventListener('mouseup', () => {
        if (!isDragging) return;
        
        if (hasDragged) {
            // Only snap if actually dragged
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
            // Snap to center when mouse leaves while dragging
            setTimeout(() => {
                updateCenterCard();
                const centeredCard = cards[currentIndex];
                nudgeIntoPerfectCenter(centeredCard, 'smooth');
            }, 50);
            isDragging = false;
            carousel.style.cursor = 'grab';
        }
    });

    // Prevent drag and drop image
    carousel.addEventListener('dragstart', (e) => {
        e.preventDefault();
    });

    carousel.style.cursor = 'grab';
    carousel.style.userSelect = 'none';

    // --- Simple function to detect which card is centered ---
    function updateCenterCard(){
        const carouselRect = carousel.getBoundingClientRect();
        const carouselCenter = carouselRect.left + carouselRect.width / 2;

        let closestCard = null;
        let minDistance = Infinity;

        cards.forEach((card, idx) => {
            const cardRect = card.getBoundingClientRect();
            const cardCenter = cardRect.left + cardRect.width / 2;
            const distance = Math.abs(cardCenter - carouselCenter);

            if(distance < minDistance){
                minDistance = distance;
                closestCard = card;
                currentIndex = idx;
            }
        });

        // Remove is-center from all, add to closest
        cards.forEach(c => c.classList.remove('is-center'));
        if(closestCard){
            closestCard.classList.add('is-center');
        }
    }

    function nudgeIntoPerfectCenter(card, behavior = 'smooth'){
        if(!card) return;

        requestAnimationFrame(() => {
            const containerRect = carousel.getBoundingClientRect();
            const cardRect = card.getBoundingClientRect();
            const containerCenter = containerRect.left + containerRect.width / 2;
            const cardCenter = cardRect.left + cardRect.width / 2;
            const offset = cardCenter - containerCenter;

            if(Math.abs(offset) > 2){
                carousel.scrollBy({
                    left: offset,
                    behavior
                });
            }
        });
    }

    // --- Lock scroll direction on touch devices ---
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

        // If horizontal movement is greater than vertical, lock and prevent vertical scroll
        if (deltaX > deltaY) {
            scrollDirectionLocked = true;
            e.preventDefault();
        }
    }, { passive: false });

    // Hide navbar when scrolling awards carousel
    let carouselScrollTimer;
    carousel.addEventListener('scroll', function(){
        if(nav){
            nav.classList.add('nav-hidden');
        }
        updateCenterCard();
        
        // Only auto-snap if not currently dragging with mouse
        clearTimeout(carouselScrollTimer);
        if (!isDragging) {
            carouselScrollTimer = setTimeout(function(){
                if(nav){
                    nav.classList.remove('nav-hidden');
                }
                const centeredCard = cards[currentIndex];
                nudgeIntoPerfectCenter(centeredCard);
            }, 150);
        }
    }, {passive: true});

    // Update on initially
    updateCenterCard();
    nudgeIntoPerfectCenter(carousel.querySelector('.award-card.is-center'), 'auto');

    // Add keyboard arrow navigation
    function scrollToCard(index) {
        if(index >= 0 && index < cards.length) {
            currentIndex = index;
            cards[index].scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
        }
    }

    // Listen for arrow key presses
    document.addEventListener('keydown', function(e) {
        const carouselRect = carousel.getBoundingClientRect();
        const isInView = carouselRect.top < window.innerHeight && carouselRect.bottom > 0;
        
        if(!isInView) return;

        if(e.key === 'ArrowLeft') {
            e.preventDefault();
            scrollToCard(currentIndex - 1);
        } else if(e.key === 'ArrowRight') {
            e.preventDefault();
            scrollToCard(currentIndex + 1);
        }
    });

    // Click on card to center it
    cards.forEach((card, index) => {
        card.addEventListener('click', function(e) {
            // Only trigger if not actually dragged (just a click)
            if (hasDragged) return;
            
            // If clicking on a card that's not centered, scroll to it
            if (!card.classList.contains('is-center')) {
                e.preventDefault();
                scrollToCard(index);
            }
        });
        
        // Add pointer cursor to non-centered cards
        card.style.cursor = 'pointer';
    });
})();
// OLD Feature rotator DISABLED - now using Filament dynamic carousel
// (function featureRotator(){
// 	... old code disabled ...
// })();

	// Prevent iOS rubber-band / pull-to-refresh overscroll when at top
	(function preventTopOverscroll() {
		let startY = 0;
		let maybePrevent = false;

		function onTouchStart(e) {
			if (e.touches && e.touches.length === 1) {
				startY = e.touches[0].clientY;
				maybePrevent = window.scrollY === 0; // only consider if at top
			}
		}

		function onTouchMove(e) {
			if (!maybePrevent) return;
			const currentY = e.touches[0].clientY;
			const diff = currentY - startY;
			if (diff > 0) {
				// pulling down while at top — prevent the default rubber-band behavior
				e.preventDefault();
			}
		}

		function onTouchEnd() {
			maybePrevent = false;
		}

		window.addEventListener('touchstart', onTouchStart, { passive: true });
		// touchmove must be passive:false to call preventDefault()
		window.addEventListener('touchmove', onTouchMove, { passive: false });
		window.addEventListener('touchend', onTouchEnd, { passive: true });
	})();

	// Lightbox functionality for moment cards
	function openLightbox(element) {
		const img = element.querySelector('img');
		const lightbox = document.getElementById('lightbox');
		const lightboxImg = document.getElementById('lightbox-img');
		
		lightboxImg.src = img.src;
		lightbox.classList.add('active');
		document.body.style.overflow = 'hidden';
	}

	function closeLightbox() {
		const lightbox = document.getElementById('lightbox');
		lightbox.classList.remove('active');
		document.body.style.overflow = 'auto';
	}

	// Close lightbox when clicking outside the image
	document.getElementById('lightbox').addEventListener('click', function(e) {
		if (e.target === this) {
			closeLightbox();
		}
	});

	// Close lightbox with Escape key
	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape') {
			closeLightbox();
		}
	});
	// Lazy loading and scroll animations
(function initLazyLoadAndAnimations() {
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    // Observe all animatable elements
    document.querySelectorAll('.fade-in, .slide-up, .slide-left, .slide-right').forEach(el => {
        observer.observe(el);
    });

    // Lazy load images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('is-loaded');
                observer.unobserve(img);
            }
        });
    }, options);

    document.querySelectorAll('img[data-src]:not(.about-image)').forEach(img => {
        imageObserver.observe(img);
    });
})();

// About Us Image Carousel
(function() {
    const container = document.getElementById('about-photo-container');
    const nextBtn = document.getElementById('feature-next');
    
    console.log('CAROUSEL DEBUG: container =', container);
    console.log('CAROUSEL DEBUG: nextBtn =', nextBtn);
    
    if (!container) return;
    
    const images = container.querySelectorAll('.about-image');
    console.log('CAROUSEL DEBUG: found', images.length, 'images');
    
    if (images.length <= 1) return;
    
    let currentIndex = 0;
    let autoSlideInterval;
    const AUTO_SLIDE_DELAY = 5000; // 5 detik
    
    function showImage(index) {
        console.log('CAROUSEL DEBUG: showImage', index, 'of', images.length);
        
        // Reset all images first
        images.forEach((img, i) => {
            img.classList.remove('active');
            console.log('CAROUSEL DEBUG: removed active from image', i);
        });
        
        // Activate current image
        images[index].classList.add('active');
        console.log('CAROUSEL DEBUG: added active to image', index);
        
        // Update text content
        const aboutText = document.getElementById('about-text');
        if (aboutText && images[index].dataset.description) {
            aboutText.textContent = images[index].dataset.description;
            console.log('CAROUSEL DEBUG: updated text to:', images[index].dataset.description);
        }
        
        // Check final states
        images.forEach((img, i) => {
            console.log('CAROUSEL DEBUG: image', i, 'active =', img.classList.contains('active'), 'opacity =', getComputedStyle(img).opacity);
        });
    }
    
    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }
    
    function startAutoSlide() {
        if (autoSlideInterval) clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(nextImage, AUTO_SLIDE_DELAY);
        console.log('CAROUSEL DEBUG: auto slide started (every', AUTO_SLIDE_DELAY, 'ms)');
    }
    
    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
            console.log('CAROUSEL DEBUG: auto slide stopped');
        }
    }
    
    // Initialize: show first image and start auto slide
    console.log('CAROUSEL DEBUG: initializing...');
    showImage(0);
    startAutoSlide();
    
    // Manual next button (stops auto slide temporarily)
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            console.log('CAROUSEL DEBUG: NEXT clicked manually');
            
            stopAutoSlide();
            nextImage();
            
            // Restart auto slide after manual click
            setTimeout(startAutoSlide, 2000); // restart after 2 seconds
        });
    }
    
    // Pause auto slide when user hovers over carousel
    container.addEventListener('mouseenter', stopAutoSlide);
    container.addEventListener('mouseleave', startAutoSlide);
})();
