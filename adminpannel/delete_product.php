<?php
include "../db_connect.php";  // this defines $con

if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Optional: delete image from uploads folder
  // $imgQuery = mysqli_query($con, "SELECT image FROM products WHERE product_id = '$product_id'");
  // $imgRow = mysqli_fetch_assoc($imgQuery);
  // unlink("../productImg/uploads/" . $imgRow['image']);

  $query = "DELETE FROM products WHERE product_id = '$product_id'";
  $result = mysqli_query($con, $query); // ✅ FIXED: use $con instead of $conn

  if ($result) {
    $msg = "✅ Product deleted successfully!";
  } else {
    $msg = "❌ Failed to delete product: " . mysqli_error($con);
  }
} else {
  $msg = "⚠️ Invalid request.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="refresh" content="2; URL=adminDashboard.php" />
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .alert {
      width: 500px;
    }
  </style>
</head>
<body>
  <div class="alert alert-info text-center">
    <?php echo $msg; ?><br>
    Redirecting to dashboard...
  </div>
</body>
</html>
