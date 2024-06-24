<?php
include 'connect.php';

if (isset($_GET['deletemanufacturerid'])) {
    $manufacturer_id = $_GET['deletemanufacturerid'];

    $sql = "DELETE FROM manufactures WHERE manufacturer_id = $manufacturer_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:mdisplay.php'); // Change this link to the appropriate display file for manufactures
    } else {
        die(mysqli_error($conn));
    }
}
?>
