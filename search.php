<?php
include 'db_connect.php';
$output = "";

if (isset($_GET['query'])) {
  $query = trim($_GET['query']);
  $safe_query = mysqli_real_escape_string($conn, $query);

  $sql = "SELECT * FROM products 
          WHERE name LIKE '%$safe_query%' 
          OR description LIKE '%$safe_query%'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $output .= "<h3>🔍 Results for '<em>$query</em>'</h3><div class='row'>";

    while ($row = mysqli_fetch_assoc($result)) {
      $output .= "
        <div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='productImg/uploads/{$row['image']}' class='card-img-top' alt='{$row['name']}' height='200'>
            <div class='card-body'>
              <h5 class='card-title'>{$row['name']}</h5>
              <p class='card-text'>PKR {$row['price']} <del>PKR {$row['old_price']}</del></p>
            </div>
          </div>
        </div>";
    }

    $output .= "</div>";
  } else {
    $output = "<p>No products found for '<b>$query</b>'</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="padding: 40px;">
  <div class="container">
    <a href="index.php" class="btn btn-dark mb-4">← Back to Home</a>
    <?= $output ?>
  </div>
</body>
</html>
