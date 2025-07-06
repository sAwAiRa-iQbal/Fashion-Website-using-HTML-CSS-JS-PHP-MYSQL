<?php
include "../db_connect.php";
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>TrendOrbit Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f2f6f9;
    }
    .navbar {
      background: #0f172a !important;
    }
    .navbar .navbar-brand {
      color: #fff;
      font-weight: bold;
      font-size: 1.5rem;
    }
    h2 {
      color: #0f172a;
      font-weight: 600;
    }
    table img {
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    .btn-primary {
      background-color: #198754;
      border: none;
    }
    .btn-primary:hover {
      background-color: #157347;
    }
    .btn-warning {
      background-color: #ffc107;
      border: none;
    }
    .btn-danger {
      background-color: #dc3545;
      border: none;
    }
    .btn-sm {
      margin-right: 5px;
    }
    .table th {
      text-align: center;
    }
    .table td {
      vertical-align: middle;
      text-align: center;
    }
  </style>
</head>
<body>

<nav class="navbar px-4">
  <span class="navbar-brand">🛍️ TrendOrbit Admin Dashboard</span>
</nav>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>🧾 All Products</h2>
    <a href="add_product.php" class="btn btn-primary">➕ Add New Product</a>
  </div>

  <table class="table table-bordered table-hover shadow-sm bg-white rounded">
    <thead class="table-dark">
      <tr>
        <th>Image</th>
        <th>Product ID</th>
        <th>Subcategory</th>
        <th>Name</th>
        <th>Price</th>
        <th>Old Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)) { 
      $imagePath = "/TrendOrbit_ProjectWeb/productImg/uploads/" . $row['image'];
    ?>
      <tr>
        <td>
           <img src="/TrendOrbit_ProjectWeb/productImg/<?php echo $row['image']; ?>" width="60" height="60" alt="Product Image"
     onerror="this.onerror=null;this.src='/TrendOrbit_ProjectWeb/productImg/default.jpg';">

        </td>
        <td><?php echo $row['product_id']; ?></td>
        <td><?php echo $row['subcategory_id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><strong><?php echo $row['price']; ?> PKR</strong></td>
        <td><del><?php echo $row['old_price']; ?> PKR</del></td>
        <td>
          <a href="edit_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
          <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this product?');">🗑️ Delete</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
