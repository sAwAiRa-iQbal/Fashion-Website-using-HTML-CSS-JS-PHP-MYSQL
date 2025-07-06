<?php
session_start();
include("db_connect.php");

// Initialize cart arrays if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (!isset($_SESSION['quantities'])) {
    $_SESSION['quantities'] = array();
}

// Add item to cart
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
        $_SESSION['quantities'][$product_id] = 1;
    } else {
        $_SESSION['quantities'][$product_id] += 1;
    }

    // Set success message (optional)
    $_SESSION['message'] = "Item added to cart!";

    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
