# TrendOrbit – Fashion E-Commerce Website

**TrendOrbit** is a dynamic fashion e-commerce website built using PHP, MySQL, HTML, CSS, and JavaScript. The platform enables users to browse, search, and purchase fashion items, while providing a functional admin panel for product management.

## 🔧 Features

### 🛍️ Frontend
- **Homepage (`index.php`)** – Displays featured fashion products
- **Product Display (`subcategory.php`, `search.php`)** – Category-based browsing & search
- **Shopping Cart (`add_to_cart.php`, `checkout.php`)** – Add to cart, checkout functionality
- **User Authentication** – Register and Login (`registerN.php`, `loginN.php`)
- **Responsive UI** – Mobile-friendly layout using HTML/CSS and JS enhancements
- **Assets Folder** – Contains images, stylesheets, and JS scripts
- **Product Images** – Stored in `productImg/` directory

### 🔐 Backend
- **Database** – Connected via `db_connect.php`
- **Admin Panel (`adminpannel/`)** – Add, edit, delete, and manage products
- **Reusable Components** – Header (`header.php`), Footer (`footer.php`)

## 🗃️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP (Procedural)
- **Database**: MySQL
- **Admin Tools**: PHP-based Admin Panel with image uploads
- **Security**: Password hashing (if implemented), form validation

## 📁 Folder Structure

project-root/
├── adminpannel/ # Admin dashboard for managing products
├── assets/ # CSS, JS, fonts, etc.
├── productImg/ # Uploaded product images
├── index.php # Main landing page
├── add_to_cart.php # Cart functionality
├── checkout.php # Checkout page
├── db_connect.php # Database configuration
├── loginN.php # User login
├── registerN.php # User registration
├── subcategory.php # Filter products by category
├── search.php # Search feature
├── header.php/footer.php # UI components


## 📌 Installation

1. Clone or download the repository.
2. Import the SQL database (provided separately) into your local MySQL.
3. Update your database credentials in `db_connect.php`.
4. Run the website using XAMPP or any local PHP server.

---

## ⚙️ How to Run

1. Install XAMPP/WAMP
2. Put the folder in `htdocs`
3. Import MySQL database (SQL file)
4. Update your DB info in `db_connect.php`
5. Open `localhost/project-folder/` in browser

> 💡 This project is great for learning how PHP and MySQL power an e-commerce platform.


http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=trendorbit_db&table=users

http://localhost/TrendOrbit_ProjectWeb/index.php

http://localhost/TrendOrbit_ProjectWeb/subcategory.php?subcat=4

http://localhost/TrendOrbit_ProjectWeb/thank_you.php



http://localhost/TrendOrbit_ProjectWeb/adminpannel/adminDashboard.php

