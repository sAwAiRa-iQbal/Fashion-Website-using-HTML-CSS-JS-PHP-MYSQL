<?php include 'header.php'; ?>
<link rel="stylesheet" href="assets/style.css?v=1.0">

<!-- Hero Section -->
<section class="hero-section">
  <!-- Search Bar -->
  <!-- Search Bar with Form -->
<div class="hero-topbar">
  <form method="GET" action="search.php">
    <input type="text" name="query" class="search-bar" placeholder="Search for fashion..." required />
  </form>
</div>



  <!-- Hero Text -->
  <div class="hero-blog">
    <h1>Elevate Your Style with TrendOrbit</h1>
    <p>Discover accessories that go beyond trends — designed to add elegance, confidence, and personality to your everyday look.</p>
    <a href="#categories" class="blog-btn">Explore Categories</a>
  </div>
</section>

 
<!-- Featured Categories -->
<section class="categories-section" id="categories">
  <h2>Featured Categories</h2>
  <div class="categories-grid">
    <div class="category-card"><img src="assets/polos.jpg" alt=""><h3>Polo Shirts</h3></div>
    <div class="category-card"><img src="assets/jeans.jpg" alt=""><h3>Jeans</h3></div>
    <div class="category-card"><img src="assets/tracksuiti.jpg" alt=""><h3>Track Suit</h3></div>
    <div class="category-card"><img src="assets/ringz.jpg" alt=""><h3>Luxury Rings</h3></div>
    <div class="category-card"><img src="assets/sneakerss.jpg" alt=""><h3>Sneakers</h3></div>
    <div class="category-card"><img src="assets/nikabz.jpg" alt=""><h3>Saudi Nikabs</h3></div>
    <div class="category-card"><img src="assets/fone.jpg" alt=""><h3>Mobile Sheets</h3></div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
  <h2>What Our Customers Say</h2>
  <div class="review-row centered">
    <div class="testimonial-box">
      <p><i class="quote">“</i>Absolutely love the designs and quality!<i class="quote">”</i></p>
      <div class="stars">★★★★★</div>
      <div class="reviewer"><strong>Amna</strong><span>Verified Buyer</span></div>
    </div>
    <div class="testimonial-box">
      <p><i class="quote">“</i>Fast delivery and stunning accessories.<i class="quote">”</i></p>
      <div class="stars">★★★★★</div>
      <div class="reviewer"><strong>Sarah</strong><span>Verified Buyer</span></div>
    </div>
    <div class="testimonial-box">
      <p><i class="quote">“</i>Highly recommended. Premium packaging!<i class="quote">”</i></p>
      <div class="stars">★★★★★</div>
      <div class="reviewer"><strong>Noor</strong><span>Verified Buyer</span></div>
    </div>
    <div class="testimonial-box">
      <p><i class="quote">“</i>Customer support was helpful & responsive.<i class="quote">”</i></p>
      <div class="stars">★★★★★</div>
      <div class="reviewer"><strong>Iqra</strong><span>Verified Buyer</span></div>
    </div>
    <div class="testimonial-box">
      <p><i class="quote">“</i>Received my ring in just 2 days. Loved it!<i class="quote">”</i></p>
      <div class="stars">★★★★★</div>
      <div class="reviewer"><strong>Ayesha</strong><span>Verified Buyer</span></div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
  <h2>📬 Join Our Style Circle</h2>
  <p>✨ Be the first to get updates on <strong>exclusive deals</strong>, <strong>trendy arrivals</strong>, and <strong>fashion tips</strong> — straight to your inbox.</p>

  <div class="newsletter-form">
    <input type="email" placeholder="📧 Enter your email address">
    <button>Subscribe 💌</button>
  </div>

  <p class="disclaimer">🛡️ We respect your privacy. No spam — just pure fashion inspiration.</p>
</section>


<!-- Admin Dashboard Button -->
<section style="text-align: center; margin: 40px 0;">
  <a href="adminpannel/adminDashboard.php" style="
      display: inline-block;
      background-color: #000;
      color: #fff;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 50px;
      text-decoration: none;
    ">
    👤 Admin Dashboard
  </a>
</section>


<?php include 'footer.php'; ?>
<?php include 'assets/scriptcode.php'; ?>
