<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $prescription_id = $_POST['prescription_id'];
    $customer_id = $_POST['customer_id'];
    $prescription_date = $_POST['prescription_date'];
    $doctor_name = $_POST['doctor_name'];

    $sql = "INSERT INTO prescriptions (prescription_id, customer_id, prescription_date, doctor_name) VALUES ('$prescription_id', '$customer_id', '$prescription_date', '$doctor_name')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
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
    <title>Prescription Registration</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Prescription ID</label>
                <input type="number" class="form-control" placeholder="Enter prescription ID" name="prescription_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" class="form-control" placeholder="Enter customer ID" name="customer_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Prescription Date</label>
                <input type="date" class="form-control" placeholder="Enter prescription date" name="prescription_date" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Doctor Name</label>
                <input type="text" class="form-control" placeholder="Enter doctor name" name="doctor_name" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
