<?php
include "../db_connect.php";

$msg = "";

if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $query = "SELECT * FROM products WHERE product_id = '$product_id'";
  $result = mysqli_query($con, $query); // ✅ FIXED: changed $conn to $con
  $product = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_product'])) {
  $product_id = $_POST['product_id'];
  $subcategory_id = $_POST['subcategory_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $old_price = $_POST['old_price'];
  $old_image = $_POST['old_image'];

  // Check if new image is uploaded
  if ($_FILES['image']['name'] != '') {
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "../productimg/uploads/" . $image_name;
    move_uploaded_file($image_tmp, $image_path);
  } else {
    $image_name = $old_image;
  }

  $update_query = "UPDATE products SET 
                   subcategory_id = '$subcategory_id',
                   name = '$name',
                   price = '$price',
                   old_price = '$old_price',
                   image = '$image_name'
                   WHERE product_id = '$product_id'";

  if (mysqli_query($con, $update_query)) { // ✅ FIXED: $conn → $con
    $msg = "✅ Product updated successfully!";
    header("Location: adminDashboard.php");
    exit();
  } else {
    $msg = "❌ Update failed: " . mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
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
  <h2>✏️ Edit Product</h2>

  <?php if ($msg != "") { ?>
    <div class="alert alert-info"><?php echo $msg; ?></div>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
    <input type="hidden" name="old_image" value="<?php echo $product['image']; ?>">

    <div class="mb-3">
      <label class="form-label">Subcategory ID</label>
      <input type="number" name="subcategory_id" class="form-control" value="<?php echo $product['subcategory_id']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Old Price</label>
      <input type="number" name="old_price" class="form-control" value="<?php echo $product['old_price']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Change Image (optional)</label>
      <input type="file" name="image" class="form-control">
      <small>Current Image: <?php echo $product['image']; ?></small>
    </div>
    <button type="submit" name="update_product" class="btn btn-primary w-100">Update Product</button>
  </form>
</div>

</body>
</html>
