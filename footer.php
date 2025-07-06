<!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-box">
        <h3>TrendOrbit</h3>
        <p>Accessories that speak style and grace — only at TrendOrbit.</p>
        <p><strong>Email:</strong> trendorbit@@gmail.com</p>
        <p><strong>Phone:</strong> +92 300 0000000</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
      <div class="footer-box">
        <h4>Shop</h4>
        <a href="#">Bags</a>
        <a href="#">Rings</a>
        <a href="#">Watches</a>
      </div>
      <div class="footer-box">
        <h4>Company</h4>
        <a href="#">About</a>
        <a href="#">Blog</a>
        <a href="#">Careers</a>
      </div>
      <div class="footer-box">
        <h4>Support</h4>
        <a href="#">FAQs</a>
        <a href="#"><img src="assets\JazzcashLogo.jpg" class="jazz-logo" alt="JazzCash Logo"> Shipping via JazzCash</a>
        <a href="#">Returns</a>
      </div>
      <div class="footer-box">
        <h4>Payment</h4>
        <p>Scan to Pay with JazzCash</p>
        <img src="assets\JazzcashQRCode.jpg" alt="JazzCash QR" class="jazz-qr" />
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 TrendOrbit. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>

<style>

/* Footer */
.footer {
  background: #111;
  color: #fff;
  padding: 40px 20px 10px;
  font-family: 'Poppins', sans-serif;
}
.footer-container {
  max-width: 1300px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.footer-box {
  flex: 1 1 200px;
  margin: 20px;
}
.footer-box h3,
.footer-box h4 {
  font-size: 18px;
  margin-bottom: 15px;
  color: #fff;
}
.footer-box p,
.footer-box a {
  color: #ccc;
  font-size: 14px;
  text-decoration: none;
  display: block;
  margin-bottom: 8px;
}
.footer-box a:hover {
  color: #fff;
}
.social-icons a {
  display: inline-block;
  margin-right: 10px;
  background: #333;
  padding: 8px;
  border-radius: 50%;
  color: #fff;
  font-size: 16px;
  transition: 0.3s ease;
}
.social-icons a:hover {
  background: #fff;
  color: #111;
}
.jazz-logo {
  height: 20px;
  vertical-align: middle;
  margin-right: 6px;
}
.jazz-qr {
  width: 100px;
  margin-top: 10px;
  border-radius: 6px;
}
.footer-bottom {
  text-align: center;
  border-top: 1px solid #444;
  padding-top: 20px;
  margin-top: 30px;
  font-size: 13px;
  color: #aaa;
}

/* Responsive */
@media (max-width: 768px) {
  .navbar,
  .top-bar {
    flex-direction: column;
    align-items: flex-start;
  }

  .nav {
    flex-direction: column;
    width: 100%;
    display: none;
  }

  .mobile-nav-show {
    display: flex !important;
  }

  .search-input {
    width: 100%;
  }

  .footer-container {
    flex-direction: column;
    text-align: center;
  }

  .footer-box {
    margin: 20px auto;
  }

  .social-icons {
    justify-content: center;
  }
}

</style>