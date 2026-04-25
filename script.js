// =====================================================
// Sole Purpose - Main JavaScript
// =====================================================
// Handles: Toast Notifications, Size Converter Modal,
// Eco-Friendly Page, Size Selector, Wishlist Toggle,
// Cart (AJAX + localStorage), Cart Badge, Checkout
// Payment Selection, and Hamburger Menu.
// =====================================================

document.addEventListener('DOMContentLoaded', () => {
    
    // Use the PHP-set BASE_URL variable, or fallback
    const baseUrl = (typeof BASE_URL !== 'undefined') ? BASE_URL : '/sole_purposeSemIV/';


    // =====================================================
    // TOAST NOTIFICATION SYSTEM
    // =====================================================
    // Creates a toast container if it doesn't exist, then
    // appends styled toast messages that auto-dismiss.
    // Types: 'success', 'error', 'info'
    // =====================================================
    function showToast(message, type = 'success', duration = 3000) {
        let container = document.querySelector('.toast-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'toast-container';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;

        // Pick icon based on type
        let icon = '✅';
        if (type === 'error') icon = '❌';
        if (type === 'info') icon = 'ℹ️';

        toast.innerHTML = `<span class="toast-icon">${icon}</span><span>${message}</span>`;
        container.appendChild(toast);

        // Auto-dismiss
        setTimeout(() => {
            toast.classList.add('toast-exit');
            toast.addEventListener('animationend', () => toast.remove());
        }, duration);
    }


    // =====================================================
    // CART BADGE UPDATE HELPER
    // =====================================================
    function updateCartBadge(delta) {
        const badge = document.getElementById('cart-badge');
        if (!badge) return;
        let current = parseInt(badge.getAttribute('data-count') || '0', 10);
        current += delta;
        if (current < 0) current = 0;
        badge.setAttribute('data-count', current);
        badge.textContent = current;
        // Show/hide based on count
        badge.style.display = current > 0 ? 'inline-flex' : 'none';
    }


    // --- SIZE CONVERTER MODAL LOGIC ---
    const openModalBtn = document.getElementById('open-size-converter');
    const closeModalBtn = document.getElementById('close-modal');
    const sizeModal = document.getElementById('size-modal');
    const calculateBtn = document.getElementById('calculate-size-btn');
    const cmInput = document.getElementById('cm-input');
    const sizeResultDiv = document.getElementById('size-result');

    if (openModalBtn && sizeModal && closeModalBtn) {
        const openModal = () => sizeModal.classList.add('active');
        const closeModal = () => sizeModal.classList.remove('active');

        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        sizeModal.addEventListener('click', (event) => {
            if (event.target === sizeModal) {
                closeModal();
            }
        });

        if (calculateBtn) {
            calculateBtn.addEventListener('click', () => {
                const cm = parseFloat(cmInput.value);
                if (!cm || cm < 20 || cm > 35) {
                    sizeResultDiv.innerHTML = `<p style="color: red;">Please enter a valid measurement in CM (between 20 and 35).</p>`;
                    return;
                }
                const usSize = (cm * 0.3937 - 8.25) * 3;
                const finalUsSize = (Math.round(usSize * 2) / 2).toFixed(1);
                const ukSize = parseFloat(finalUsSize) - 0.5;
                const euSize = parseFloat(finalUsSize) + 33.5;
                sizeResultDiv.innerHTML = `<h4>Your Recommended Size Is:</h4><p><strong>US:</strong> ${finalUsSize}<br><strong>UK:</strong> ${ukSize.toFixed(1)}<br><strong>EU:</strong> ${euSize.toFixed(1)}</p><p style="font-size: 0.8rem; color: #777; margin-top: 1rem;">Note: This is an estimate. Sizing may vary by brand.</p>`;
            });
        }
    }

    // --- FOOT QUIZ LOGIC ---
    const quizBox = document.getElementById('quiz-box');
    const quizSteps = document.querySelectorAll('.quiz-step');
    const quizProgress = document.getElementById('quiz-progress');
    const optionBtns = document.querySelectorAll('.quiz-option-btn');
    const backBtns = document.querySelectorAll('.back-btn');
    let currentStep = 1;
    let quizData = {
        gender: '',
        arch: '',
        width: ''
    };

    if (quizBox) {
        // Option selection
        optionBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const key = btn.getAttribute('data-key');
                const value = btn.getAttribute('data-value');
                quizData[key] = value;

                if (currentStep < 3) {
                    goToStep(currentStep + 1);
                } else {
                    showResults();
                }
            });
        });

        // Back button
        backBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                goToStep(currentStep - 1);
            });
        });

        function goToStep(step) {
            currentStep = step;
            quizSteps.forEach(s => s.classList.remove('active'));
            const activeStep = document.querySelector(`.quiz-step[data-step="${currentStep}"]`);
            if (activeStep) activeStep.classList.add('active');
            
            // Update progress
            const progress = (currentStep / 4) * 100;
            quizProgress.style.width = `${progress}%`;
        }

        function showResults() {
            goToStep(4);
            const resultsDiv = document.getElementById('quiz-results');
            
            // Simulate processing
            setTimeout(() => {
                let recommendationTitle = "";
                let recommendationDesc = "";
                let shopLink = baseUrl + "shop.php?gender=" + quizData.gender;

                // Wire logic
                if (quizData.arch === 'flat') {
                    recommendationTitle = "Orthopedic & Flat Feet Support";
                    recommendationDesc = "Based on your low arch, you need shoes with structured support to prevent overpronation.";
                    shopLink += "&comfort=Flat+Feet";
                } else if (quizData.arch === 'high') {
                    recommendationTitle = "High Arch Cushioning";
                    recommendationDesc = "Your high arches require extra cushioning and flexible support to absorb shock.";
                    shopLink += "&comfort=Arch+Support";
                } else {
                    recommendationTitle = "Natural Motion & Neutral Fit";
                    recommendationDesc = "A neutral profile with balanced cushioning will keep your feet in their natural alignment.";
                    // Medium arch is standard fitting
                }

                if (quizData.width === 'wide') {
                    recommendationDesc += " We've also prioritized models with a wider toe-box for your comfort.";
                }

                resultsDiv.innerHTML = `
                    <div class="results-card">
                        <h2>Your Perfect Match</h2>
                        <span class="highlight">${recommendationTitle}</span>
                        <p>${recommendationDesc}</p>
                        <a href="${shopLink}" class="btn-primary" style="padding: 1rem 3rem;">View Your Curated Collection</a>
                    </div>
                `;
            }, 1000);
        }
    }

    // --- ECO-FRIENDLY PAGE LOGIC ---
    const findLocationBtn = document.getElementById('find-location-btn');
    const pincodeInput = document.getElementById('pincode-input');
    const locationResultDiv = document.getElementById('location-result');

    if (findLocationBtn) {
        findLocationBtn.addEventListener('click', () => {
            const pincode = pincodeInput.value.trim();
            locationResultDiv.style.display = 'block';

            if (pincode.startsWith('4')) {
                locationResultDiv.innerHTML = '<h4>Drop-off Points Near You:</h4><p>Green Initiatives Store, Mumbai, Maharashtra</p><p>Eco-Hub, Pune, Maharashtra</p>';
            } else if (pincode.startsWith('1')) {
                locationResultDiv.innerHTML = '<h4>Drop-off Points Near You:</h4><p>Recycle Point, Delhi</p><p>Sustainable Steps, Chandigarh</p>';
            } else if (pincode.startsWith('5')) {
                locationResultDiv.innerHTML = '<h4>Drop-off Points Near You:</h4><p>Earth Savers, Bengaluru, Karnataka</p>';
            } else if (pincode) {
                locationResultDiv.innerHTML = '<p>Sorry, no drop-off locations found in your area yet. We are expanding soon!</p>';
            } else {
                locationResultDiv.innerHTML = '<p style="color: red;">Please enter a valid pincode.</p>';
            }
        });
    }


    // =====================================================
    // SIZE SELECTOR LOGIC
    // =====================================================
    document.querySelectorAll('.size-options').forEach(container => {
        container.addEventListener('click', (e) => {
            const btn = e.target.closest('.size-btn');
            if (!btn) return;

            // Remove active from all sibling size buttons
            container.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            // Set this one as active
            btn.classList.add('active');
        });
    });


    // =====================================================
    // WISHLIST TOGGLE LOGIC (AJAX) - Simple Button
    // =====================================================
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const productId = btn.getAttribute('data-product-id');

            const formData = new FormData();
            formData.append('product_id', productId);

            fetch(baseUrl + 'api/wishlist_toggle.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.message === 'login_required') {
                    showToast('Please log in to use the Wishlist feature.', 'info');
                    return;
                }
                if (data.success) {
                    if (data.action === 'added') {
                        btn.classList.add('wishlisted');
                        btn.textContent = '♥ Wishlisted';
                        showToast('Added to your Wishlist!', 'success');
                    } else {
                        btn.classList.remove('wishlisted');
                        btn.textContent = '♡ Wishlist';
                        showToast('Removed from Wishlist.', 'info');
                        // If on wishlist page, remove the card
                        if (window.location.href.includes('wishlist.php')) {
                            btn.closest('.product-card').remove();
                        }
                    }
                }
            })
            .catch(err => console.error('Wishlist error:', err));
        });
    });


    // =====================================================
    // ADD TO CART LOGIC (AJAX for logged-in users)
    // =====================================================
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.product-card');
            const productId = button.getAttribute('data-product-id');

            // Get selected size
            const activeSize = card.querySelector('.size-btn.active');
            const sizeLabel = card.querySelector('.size-label');
            let selectedSize = '8'; // default
            if (activeSize) {
                selectedSize = activeSize.getAttribute('data-size');
            } else if (sizeLabel && sizeLabel.textContent.includes('One Size')) {
                selectedSize = 'One Size';
            }

            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('size', selectedSize);

            fetch(baseUrl + 'api/cart_add.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.message === 'login_required') {
                    // Fall back to localStorage for guest users
                    const title = card.querySelector('.product-title')?.innerText || '';
                    const price = card.querySelector('.product-price')?.innerText || '';
                    const image = card.querySelector('.product-image')?.src || '';
                    
                    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
                    cart.push({ title, price, image, size: selectedSize });
                    localStorage.setItem('cart', JSON.stringify(cart));
                    showToast(`"${title}" (Size: ${selectedSize}) added to cart!`, 'success');
                    return;
                }
                if (data.success) {
                    const title = card.querySelector('.product-title')?.innerText || 'Item';
                    showToast(`"${title}" (Size: US ${selectedSize}) added to cart!`, 'success');
                    updateCartBadge(1);
                }
            })
            .catch(err => console.error('Cart error:', err));
        });
    });


    // =====================================================
    // CART PAGE LOGIC
    // =====================================================
    const cartContainer = document.getElementById('cart-items-container');

    // --- Guest Cart (localStorage) ---
    if (cartContainer && !document.querySelector('.cart-item')) {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const cartTotalContainer = document.getElementById('cart-total');
        let total = 0;

        if (cart.length === 0 && !document.querySelector('.no-results')) {
            cartContainer.innerHTML = '<div class="no-results"><h3>Your cart is empty</h3><p>Browse our collection and add your favourite products!</p></div>';
            if (cartTotalContainer) cartTotalContainer.style.display = 'none';
        } else if (cart.length > 0) {
            cart.forEach(product => {
                let priceNumber = parseFloat(product.price.replace('₹', '').replace(/,/g, ''));
                total += priceNumber;

                const productHtml = `
                    <div class="cart-item">
                        <img src="${product.image}" alt="${product.title}" class="cart-item-image">
                        <div class="cart-item-details">
                            <h4 class="cart-item-title">${product.title}</h4>
                            <p class="cart-item-size">Size: US ${product.size || 'N/A'}</p>
                        </div>
                        <div class="cart-item-price">
                            <p>${product.price}</p>
                        </div>
                    </div>
                `;
                cartContainer.innerHTML += productHtml;
            });

            if (cartTotalContainer) {
                cartTotalContainer.innerHTML = `<h3 style="font-size: 1.5rem;">Total: ₹${total.toFixed(2)}</h3>`;
            }
        }
    }

    // --- Clear Cart Button ---
    const clearCartBtn = document.getElementById('clear-cart-btn');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', () => {
            fetch(baseUrl + 'api/cart_clear.php', {
                method: 'POST'
            })
            .then(res => res.json())
            .then(data => {
                if (data.message === 'login_required') {
                    localStorage.removeItem('cart');
                }
                showToast('Cart cleared successfully.', 'info');
                setTimeout(() => location.reload(), 800);
            })
            .catch(() => {
                localStorage.removeItem('cart');
                location.reload();
            });
        });
    }

    // --- Remove Individual Cart Item ---
    document.querySelectorAll('.cart-remove-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const cartItemId = btn.getAttribute('data-cart-id');
            const formData = new FormData();
            formData.append('cart_item_id', cartItemId);

            fetch(baseUrl + 'api/cart_remove.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast('Item removed from cart.', 'info');
                    setTimeout(() => location.reload(), 800);
                }
            })
            .catch(err => console.error('Remove error:', err));
        });
    });


    // =====================================================
    // WISHLIST PAGE BUTTONS
    // =====================================================

    // --- Add All to Cart ---
    const addAllToCartBtn = document.getElementById('add-all-to-cart-btn');
    if (addAllToCartBtn) {
        addAllToCartBtn.addEventListener('click', () => {
            fetch(baseUrl + 'api/wishlist_add_all_to_cart.php', {
                method: 'POST'
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast('All wishlist items added to your cart!', 'success');
                    setTimeout(() => location.reload(), 1000);
                }
            })
            .catch(err => console.error('Add all to cart error:', err));
        });
    }

    // --- Clear Wishlist ---
    const clearWishlistBtn = document.getElementById('clear-wishlist-btn');
    if (clearWishlistBtn) {
        clearWishlistBtn.addEventListener('click', () => {
            if (confirm('Are you sure you want to clear your entire wishlist?')) {
                fetch(baseUrl + 'api/wishlist_clear.php', {
                    method: 'POST'
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showToast('Wishlist cleared.', 'info');
                        setTimeout(() => location.reload(), 800);
                    }
                })
                .catch(err => console.error('Clear wishlist error:', err));
            }
        });
    }


    // =====================================================
    // CHECKOUT PAGE - PAYMENT METHOD SELECTION
    // =====================================================
    const paymentOptions = document.querySelectorAll('.payment-option');
    if (paymentOptions.length > 0) {
        paymentOptions.forEach(option => {
            const radio = option.querySelector('input[type="radio"]');
            
            // Set initial selected state
            if (radio && radio.checked) {
                option.classList.add('selected');
            }

            option.addEventListener('click', () => {
                // Remove selected from all
                paymentOptions.forEach(o => o.classList.remove('selected'));
                // Add selected to clicked one
                option.classList.add('selected');
                // Check the radio
                if (radio) radio.checked = true;
            });
        });
    }


    // =====================================================
    // SMART SCROLL NAVBAR (Hide on scroll down, show on scroll up)
    // =====================================================
    const mainHeader = document.querySelector('header');
    let lastScrollY = window.scrollY;
    let hideTimeout;

    function handleScroll() {
        const currentScrollY = window.scrollY;

        if (currentScrollY <= 0) {
            mainHeader.classList.remove('navbar-scroll-hidden');
            mainHeader.classList.add('navbar-scroll-visible');
            return;
        }

        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            mainHeader.classList.add('navbar-scroll-hidden');
            mainHeader.classList.remove('navbar-scroll-visible');
        } else {
            mainHeader.classList.remove('navbar-scroll-hidden');
            mainHeader.classList.add('navbar-scroll-visible');
        }

        lastScrollY = currentScrollY;
    }

    window.addEventListener('scroll', () => {
        clearTimeout(hideTimeout);
        hideTimeout = setTimeout(handleScroll, 10);
    }, { passive: true });


    // =====================================================
    // HAMBURGER MENU (Mobile Navigation)
    // =====================================================
    const hamburger = document.querySelector('.hamburger-menu');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }

});
