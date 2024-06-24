<?php
include 'connect.php';

if (isset($_GET['deleteproductid'])) {
    $product_id = $_GET['deleteproductid'];

    $sql = "DELETE FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted successfully";
        header('location:pdisplay.php'); // Change this link to the appropriate display file for products
    } else {
        die(mysqli_error($conn));
    }
}
?>
