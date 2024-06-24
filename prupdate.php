<?php
include 'connect.php';

$prescription_id = $_GET['updateid'];
$sql = "SELECT * FROM prescriptions WHERE prescription_id = $prescription_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prescription_id = $row['prescription_id'];
$customer_id = $row['customer_id'];
$prescription_date = $row['prescription_date'];
$doctor_name = $row['doctor_name'];

if (isset($_POST['submit'])) {
    $newPrescriptionId = $_POST['prescription_id'];
    $newCustomerId = $_POST['customer_id'];
    $newPrescriptionDate = $_POST['prescription_date'];
    $newDoctorName = $_POST['doctor_name'];

    $updateSql = "UPDATE prescriptions SET prescription_id = '$newPrescriptionId', customer_id = '$newCustomerId', prescription_date = '$newPrescriptionDate', doctor_name = '$newDoctorName'
                    WHERE prescription_id = $prescription_id";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header('location:prdisplay.php'); // Change this link to the appropriate display file for prescriptions
    } else {
        die(mysqli_error($conn));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Prescription Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Prescription ID</label>
                <input type="number" class="form-control" placeholder="Enter prescription ID" name="prescription_id" autocomplete="off" value="<?php echo $prescription_id; ?>">
            </div>

            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" class="form-control" placeholder="Enter customer ID" name="customer_id" autocomplete="off" value="<?php echo $customer_id; ?>">
            </div>

            <div class="form-group">
                <label>Prescription Date</label>
                <input type="date" class="form-control" placeholder="Enter prescription date" name="prescription_date" autocomplete="off" value="<?php echo $prescription_date; ?>">
            </div>

            <div class="form-group">
                <label>Doctor Name</label>
                <input type="text" class="form-control" placeholder="Enter doctor name" name="doctor_name" autocomplete="off" value="<?php echo $doctor_name; ?>">
            </div>

            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
