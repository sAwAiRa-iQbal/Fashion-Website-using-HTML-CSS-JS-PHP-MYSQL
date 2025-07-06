<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TrendOrbit - Fashion Accessories</title>
  <link rel="stylesheet" href="style1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #111;
      color: white;
      padding: 15px 30px;
    }

    .logo h1 {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      margin: 0;
    }

    .nav {
      display: flex;
      align-items: center;
      gap: 18px;
      position: relative;
    }

    .nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
    }

    .auth-cart {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
    }

    .login-btn {
      background-color: #00aaff;
      color: white;
    }

    .register-btn {
      background-color: #00cc66;
      color: white;
    }

    .logout-btn {
      background-color: #ff4444;
      color: white;
    }

    .cart-button {
      background-color: white;
      color: black;
      font-weight: 500;
      border-radius: 4px;
      padding: 6px 12px;
      text-decoration: none;
    }

    /* Dropdown */
    .dropdown {
      display: none;
      position: absolute;
      top: 50px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      padding: 30px 60px;
      z-index: 1000;
      justify-content: space-evenly;
      gap: 40px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 750px;
    }

    .show-dropdown {
      display: flex !important;
    }

    .column {
      flex: 1;
      min-width: 150px;
      max-width: 200px;
    }

    .column h4 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 10px;
      border-bottom: 1px dotted #999;
      padding-bottom: 4px;
      color: #111;
    }

    .column a {
      display: block;
      margin-left: 10px;
      margin-bottom: 8px;
      font-size: 14px;
      color: #444;
      text-decoration: none;
      border-left: 2px dotted #aaa;
      padding-left: 8px;
    }

    .column a:hover {
      color: #00aaff;
      font-weight: 600;
      border-left: 2px solid #00aaff;
    }

    #collections-wrapper {
      position: relative;
    }

    .alert {
      text-align: center;
      padding: 10px;
      background-color: #d4edda;
      color: #155724;
      margin-top: 10px;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const link = document.getElementById('collections-link');
      const dropdown = document.getElementById('collections-dropdown');

      link.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('show-dropdown');
      });

      document.addEventListener('click', function(event) {
        if (!event.target.closest('#collections-wrapper')) {
          dropdown.classList.remove('show-dropdown');
        }
      });
    });
  </script>
</head>
<body>

<!-- Header -->
<header class="navbar">
  <div class="logo">
    <h1 class="brand-name">TrendOrbit</h1>
  </div>

  <nav class="nav">
    <a href="index.php">Home</a>
    <a href="shop.php">Shop</a>

    <div id="collections-wrapper">
      <a href="#" id="collections-link">Collections</a>
      <div class="dropdown" id="collections-dropdown">
        <div class="column">
          <h4>Men's</h4>
          <a href="subcategory.php?subcat=1">Polo Shirts</a>
          <a href="subcategory.php?subcat=2">Jeans</a>
          <a href="subcategory.php?subcat=3">Track Suits</a>
        </div>
        <div class="column">
          <h4>Women's</h4>
          <a href="subcategory.php?subcat=4">Luxury Rings</a>
          <a href="subcategory.php?subcat=5">Sneakers</a>
          <a href="subcategory.php?subcat=6">Saudi Nikabs</a>
        </div>
        <div class="column">
          <h4>Accessories</h4>
          <a href="subcategory.php?subcat=7">Mobile Back & Front Sheets</a>
        </div>
      </div>
    </div>

    <a href="footer.php">Contact</a>
  </nav>

  
  <div class="auth-cart">
    <?php if (isset($_SESSION['user_id'])): ?>
      <span class="welcome-text">Welcome!</span>
      <a href="logout.php" class="btn logout-btn">Logout</a>
    <?php else: ?>
      <a href="loginN.php" class="btn login-btn">Login</a>
      <a href="registerN.php" class="btn register-btn">Register</a>
    <?php endif; ?>
    <a href="view_cart.php" class="cart-button">🛒 Cart (<?= $cart_count ?>)</a>
  </div>
</header>

<?php if (isset($_SESSION['message'])): ?>
  <div class="alert"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
<?php endif; ?>
