# Sole Purpose: Footwear E-commerce Platform 👟

> **Award-Winning Semester IV Project**
> *Step Smart. Step Sustainably.*
> 
> 🌐 **Live Demo:** [ssolepurposee.infinityfreeapp.com](https://ssolepurposee.infinityfreeapp.com/)

**Sole Purpose** is a specialized, community-focused e-commerce platform designed to promote sustainable footwear and support local Indian artisans. Beyond standard e-commerce functionality, it integrates unique tools centered around foot health and inclusive sizing.

## ✨ Key Features

- **👟 Dynamic Shop:** Advanced filtering capabilities (by gender, category, budget, orthopedic comfort type, and brand).
- **🦶 Foot Quiz Engine:** A custom recommendation algorithm that suggests footwear based on user-specific foot health needs.
- **📏 Smart Size Converter:** An intuitive tool to calculate and convert exact foot measurements (in cm) to standard US/UK/EU sizes.
- **🛒 Asynchronous Shopping Flow:** Seamless Cart and Wishlist operations utilizing AJAX for real-time updates without page reloads.
- **🔐 Secure User Authentication:** Complete login, registration, and session management system protecting customer data.
- **🎨 Premium UI/UX:** A fully responsive, dark-themed (Dark Red, Cream, and White) user interface built from scratch with Vanilla HTML/CSS/JS.

## 🛠️ Technology Stack

- **Frontend:** HTML5, CSS3 (Vanilla), JavaScript, Poppins (Google Fonts)
- **Backend:** PHP
- **Database:** MySQL
- **Environment:** Localhost via XAMPP (Windows)

## 📂 Project Structure

```text
sole_purposeSemIV/
├── api/                # AJAX endpoints (cart/wishlist processing)
├── auth/               # Login, Signup, and User Profile logic
├── pages/              # Cart, Checkout, Quiz, and Health Guides
├── partials/           # Reusable components & DB connection (_dbconnect.php)
├── products/           # Category-specific rendering views
├── index.php           # Landing Page
├── shop.php            # Main Storefront
├── style.css           # Premium UI Design System
└── script.js           # Frontend logic and DOM manipulation
```

## 🚀 Installation & Local Setup

To run this project locally, you will need an environment like **XAMPP** or **WAMP** installed on your machine.

1. **Clone the repository:**
   Move the project folder into your local server directory. For XAMPP, this is usually `C:\xampp\htdocs\`.
   
   Ensure the folder is named `sole_purposeSemIV` or adjust your localhost URL accordingly.

2. **Start your server:**
   Open the XAMPP Control Panel and start **Apache** and **MySQL**.

3. **Database Setup:**
   - Open your browser and navigate to `http://localhost/phpmyadmin/`.
   - Create a new database named `sole_purpose`.
   - Import the provided SQL file: click on the **Import** tab, choose the `sole_purpose_upgrade.sql` file located in the root of the project, and click **Go**.

4. **Database Configuration:**
   If your MySQL root user has a password (by default in XAMPP it does not), update the connection credentials in:
   `partials/_dbconnect.php`
   *(Ensure the `$username` and `$password` variables match your local MySQL configuration).*

5. **Launch the Application:**
   Open your browser and visit: 
   `http://localhost/sole_purposeSemIV/`

## 🏆 Acknowledgements
This project was developed as a core academic project for Semester IV and was recognized as an Award-Winning submission for its technical implementation and real-world applicability in sustainable commerce.
