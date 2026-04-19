// This file is modified.
// The loadHeader() function has been REMOVED.
// PHP's "include 'header.php';" is used instead.

// This runs when the initial HTML document has been completely loaded
document.addEventListener('DOMContentLoaded', () => {
    
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

    // --- ECO-FRIENDLY PAGE LOGIC ---
    const findLocationBtn = document.getElementById('find-location-btn');
    const pincodeInput = document.getElementById('pincode-input');
    const locationResultDiv = document.getElementById('location-result');

    // This check makes sure the code only runs on the eco-friendly page
    if (findLocationBtn) {
        findLocationBtn.addEventListener('click', () => {
            const pincode = pincodeInput.value.trim();
            locationResultDiv.style.display = 'block'; // Show the results box

            // Mock search based on the starting digit of the pincode
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
    
    // --- (REMOVED) LOGIN FORM LOGIC ---
    // The old JavaScript login logic from your original login.html
    // has been REMOVED. It is now handled by PHP.


    // --- START: CART LOGIC ---

    // 1. Find all "Add to Cart" buttons on the page
    const addToCartButtons = document.querySelectorAll('.product-card .btn-primary');
    
    // 2. Add a click event listener to each button
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            // Find the parent .product-card
            const card = event.target.closest('.product-card');
            
            // Get the product details from the card
            const product = {
                title: card.querySelector('.product-title').innerText,
                price: card.querySelector('.product-price').innerText,
                image: card.querySelector('.product-image').src
            };

            // --- Save the product to localStorage ---
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            
            // Add the new product to the array
            cart.push(product);
            
            // Save the updated array back to storage
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Give the user feedback
            // Using a custom modal would be better, but alert is simple
            alert(`"${product.title}" was added to your cart!`);
        });
    });


    // 3. Logic to display items on the cart.php page
    const cartContainer = document.getElementById('cart-items-container');
    
    if (cartContainer) {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const cartTotalContainer = document.getElementById('cart-total');
        let total = 0;

        if (cart.length === 0) {
            cartContainer.innerHTML = '<p>Your cart is empty.</p>';
            cartTotalContainer.style.display = 'none'; // Hide total if cart is empty
        } else {
            cart.forEach(product => {
                let priceNumber = parseFloat(product.price.replace('₹', '').replace(',', ''));
                total += priceNumber;

                const productHtml = `
                    <div class="cart-item" style="display: flex; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 1rem;">
                        <img src="${product.image}" alt="${product.title}" style="width: 100px; height: 100px; object-fit: contain; margin-right: 1.5rem; border-radius: 5px; border: 1px solid #eee;">
                        <div style="flex-grow: 1;">
                            <h4 style="margin-bottom: 0.5rem;">${product.title}</h4>
                            <p style="font-size: 1.1rem; font-weight: 600;">${product.price}</p>
                        </div>
                    </div>
                `;
                cartContainer.innerHTML += productHtml;
            });

            cartTotalContainer.innerHTML = `<h3 style="font-size: 1.5rem;">Total: ₹${total.toFixed(2)}</h3>`;
        }
        
        // 4. Logic for the "Clear Cart" button
        const clearCartBtn = document.getElementById('clear-cart-btn');
        clearCartBtn.addEventListener('click', () => {
            // Replaced confirm() with a simple alert for compatibility.
            // A custom modal would be the best solution.
            localStorage.removeItem('cart');
            location.reload();
        });
    }

    // --- END: CART LOGIC ---
});
