<?php
include "../db_connect.php"; // Go one level up to include DB connection

$msg = "";

if (isset($_POST['add_product'])) {
  $product_id = $_POST['product_id'];
  $subcategory_id = $_POST['subcategory_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $old_price = $_POST['old_price'];

  // Image upload
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_path = "../productimg/uploads/" . $image_name;

  move_uploaded_file($image_tmp, $image_path);

  $query = "INSERT INTO products (product_id, subcategory_id, name, price, old_price, image)
            VALUES ('$product_id', '$subcategory_id', '$name', '$price', '$old_price', '$image_name')";

  if (mysqli_query($con, $query)) {  // ✅ FIXED: changed $conn to $con
    $msg = "✅ Product added successfully!";
  } else {
    $msg = "❌ Error: " . mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f2f6f9;
    }
    .container {
      margin-top: 40px;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
      max-width: 600px;
    }
    h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      color: #0f172a;
    }
    .form-label {
      font-weight: 500;
    }
    .btn-primary {
      background-color: #198754;
      border: none;
    }
    .btn-primary:hover {
      background-color: #157347;
    }
    .alert {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>➕ Add New Product</h2>

  <?php if ($msg != "") { ?>
    <div class="alert alert-info"><?php echo $msg; ?></div>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Product ID</label>
      <input type="text" name="product_id" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Subcategory ID</label>
      <input type="number" name="subcategory_id" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Old Price</label>
      <input type="number" name="old_price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" name="add_product" class="btn btn-primary w-100">Save Product</button>
  </form>
</div>

</body>
</html>
