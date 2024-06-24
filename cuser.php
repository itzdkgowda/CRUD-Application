<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $customer_id = $_POST['customer_id'];
    $c_name = $_POST['c_name'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (customer_id, c_name, phone_no, address) VALUES ('$customer_id', '$c_name', '$phone_no', '$address')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:display.php');
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
    <title>Customer Registration</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" class="form-control" placeholder="Enter customer ID" name="customer_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter customer name" name="c_name" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone_no" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter customer address" name="address" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
