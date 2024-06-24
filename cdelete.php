<?php
include 'connect.php';

if (isset($_GET['deletecustomerid'])) {
    $customer_id = $_GET['deletecustomerid'];

    $sql = "DELETE FROM customers WHERE customer_id = $customer_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
