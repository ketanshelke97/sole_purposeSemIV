// =====================================================
// Sole Purpose - Main JavaScript
// =====================================================
// Handles: Size Converter Modal, Eco-Friendly Page,
// Size Selector, Wishlist Toggle, Cart (AJAX + localStorage),
// Buy Now Button, and Hamburger Menu.
// =====================================================

document.addEventListener('DOMContentLoaded', () => {
    
    // Use the PHP-set BASE_URL variable, or fallback
    const baseUrl = (typeof BASE_URL !== 'undefined') ? BASE_URL : '/sole_purposeSemIV/';

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
                    alert('Please log in to use the Wishlist feature.');
                    return;
                }
                if (data.success) {
                    if (data.action === 'added') {
                        btn.classList.add('wishlisted');
                        btn.textContent = '♥ Wishlisted';
                    } else {
                        btn.classList.remove('wishlisted');
                        btn.textContent = '♡ Wishlist';
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
                    alert(`"${title}" (Size: ${selectedSize}) added to cart!`);
                    return;
                }
                if (data.success) {
                    const title = card.querySelector('.product-title')?.innerText || 'Item';
                    alert(`"${title}" (Size: US ${selectedSize}) added to cart!`);
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
                location.reload();
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
                    location.reload();
                }
            })
            .catch(err => console.error('Remove error:', err));
        });
    });


    // =====================================================
    // BUY NOW BUTTON
    // =====================================================
    const buyNowBtn = document.getElementById('buy-now-btn');
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', () => {
            alert('🎉 Thank you for your order!\n\nYour order has been placed successfully. This is a demo feature — in a real application, this would proceed to a payment gateway.\n\nThank you for shopping with Sole Purpose!');
        });
    }


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
                    alert('✅ ' + data.message + '\n\nAll wishlist items have been added to your cart!');
                    location.reload();
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
                        alert('Wishlist cleared successfully.');
                        location.reload();
                    }
                })
                .catch(err => console.error('Clear wishlist error:', err));
            }
        });
    }


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
