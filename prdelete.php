<?php
include 'connect.php';

if (isset($_GET['deleteprescriptionid'])) {
    $prescription_id = $_GET['deleteprescriptionid'];

    $sql = "DELETE FROM prescriptions WHERE prescription_id = $prescription_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted successfully";
        header('location:prescription_display.php'); // Change this link to the appropriate display file for prescriptions
    } else {
        die(mysqli_error($conn));
    }
}
?>
