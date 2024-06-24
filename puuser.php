<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $purchase_id = $_POST['purchase_id'];
    $customer_id = $_POST['customer_id'];
    $purchase_date = $_POST['purchase_date'];
    $total_cost = $_POST['total_cost'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO purchases (purchase_id, customer_id, purchase_date, total_cost, quantity) VALUES ('$purchase_id', '$customer_id', '$purchase_date', '$total_cost', '$quantity')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:pudisplay.php'); // Change this link to the appropriate display file for purchases
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
    <title>Purchase Registration</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Purchase ID</label>
                <input type="number" class="form-control" placeholder="Enter purchase ID" name="purchase_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" class="form-control" placeholder="Enter customer ID" name="customer_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Purchase Date</label>
                <input type="date" class="form-control" placeholder="Enter purchase date" name="purchase_date" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Total Cost</label>
                <input type="number" class="form-control" placeholder="Enter total cost" name="total_cost" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
