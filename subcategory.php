<?php
session_start();

include("db_connect.php");
include("header.php");

$subcat_id = isset($_GET['subcat']) ? $_GET['subcat'] : 0;

$subcat_result = mysqli_query($con, "SELECT subcategory_name FROM subcategories WHERE subcategory_id = $subcat_id");
$subcat_row = mysqli_fetch_assoc($subcat_result);
$subcat_name = $subcat_row['subcategory_name'];

$query = "SELECT * FROM products WHERE subcategory_id = $subcat_id";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $subcat_name ?></title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
    }

    h2 {
      text-align: center;
      margin: 30px 0 10px;
      font-size: 2rem;
    }

    .product-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      padding: 20px;
    }

    .product-card {
      width: 250px;
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      position: relative;
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      height: 310px;
      object-fit: cover;
    }

    .product-info {
      padding: 15px;
      text-align: center;
    }

    .product-info h3 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .price {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .price del {
      color: #888;
      margin-right: 8px;
      font-weight: normal;
    }

    .price .new {
      color: #e53935;
      font-weight: bold;
    }

    .btn-cart {
      display: inline-block;
      background: black;
      color: white;
      border: none;
      border-radius: 20px;
      padding: 8px 20px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      text-decoration: none;
    }

    .wishlist {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 22px;
      color: #ccc;
      cursor: pointer;
      transition: color 0.3s;
    }

    .wishlist:hover {
      color: #e53935;
    }
  </style>
</head>
<body>

<h2><?= $subcat_name ?></h2>

<div class="product-grid">
  <?php if ($result && mysqli_num_rows($result) > 0): ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="product-card">
        <span class="wishlist">♥</span>
        <img src="productImg/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
        <div class="product-info">
          <h3><?= $row['name'] ?></h3>
          <div class="price">
            <del>PKR <?= number_format($row['old_price']) ?></del>
            <span class="new">PKR <?= number_format($row['price']) ?></span>
          </div>
          <a href="add_to_cart.php?id=<?= $row['product_id'] ?>" class="btn-cart">Add to Cart</a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No products found.</p>
  <?php endif; ?>
</div>

<?php include("footer.php"); ?>
</body>
</html>
