<?php
session_start();
include("db_connect.php");

$cart = $_SESSION['cart'] ?? [];
$quantities = $_SESSION['quantities'] ?? [];

$total_price = 0;
$items_list = "";

foreach ($cart as $product_id) {
    $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id'");
    if ($row = mysqli_fetch_assoc($result)) {
        $qty = $quantities[$product_id] ?? 1;
        $subtotal = $qty * $row['price'];
        $total_price += $subtotal;
        $items_list .= $row['name'] . " x " . $qty . ", ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - TrendOrbit</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: url('assets/LoignBGimg.png') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 30px 30px 20px;
      border-radius: 15px;
      width: 400px;
      color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 24px;
    }

    .form-container label {
      display: block;
      margin-top: 12px;
      font-weight: 500;
    }

    .form-container input,
    .form-container select,
    .form-container textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: none;
      background: #fff;
      color: #000;
      font-size: 14px;
    }

    .form-container button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background-color: #fff;
      color: #000;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .form-container button:hover {
      background-color: #e0e0e0;
    }

    .back-home {
      text-align: center;
      margin-top: 15px;
    }

    .back-home a {
      color: #ccc;
      font-size: 14px;
      text-decoration: none;
    }

    .back-home a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Checkout</h2>
  <form method="POST" action="thank_you.php">
    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email Address:</label>
    <input type="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" required>

    <label for="address">Address:</label>
    <textarea name="address" required></textarea>

    <label for="payment_method">Payment Method:</label>
    <select name="payment_method" required>
      <option value="Cash on Delivery">Cash on Delivery</option>
    </select>

    <!-- Hidden Fields -->
    <input type="hidden" name="items" value="<?= htmlspecialchars($items_list) ?>">
    <input type="hidden" name="total_amount" value="<?= $total_price ?>">

    <button type="submit">Place Order</button>
  </form>

  <div class="back-home">
    <a href="index.php">⬅ Back to Home</a>
  </div>
</div>

</body>
</html>
