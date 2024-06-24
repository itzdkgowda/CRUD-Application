<?php

include 'connect.php';
$customer_id = $_GET['updateid'];
$sql = "SELECT * FROM customers WHERE customer_id = $customer_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customer_id = $row['customer_id'];
$c_name = $row['c_name'];
$phone_no = $row['phone_no'];
$address = $row['address'];

if(isset($_POST['submit'])){
    $newCustomerId = $_POST['customer_id'];
    $newCName = $_POST['c_name'];
    $newPhoneNo = $_POST['phone_no'];
    $newAddress = $_POST['address'];

    $updateSql = "UPDATE customers SET customer_id = '$newCustomerId', c_name = '$newCName', phone_no = '$newPhoneNo', address = '$newAddress' WHERE customer_id = $customer_id";
    $updateResult = mysqli_query($conn, $updateSql);

    if($updateResult){
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
    <title>Customer Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" class="form-control" placeholder="Enter customer ID" name="customer_id" autocomplete="off" value="<?php echo $customer_id; ?>">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter customer name" name="c_name" autocomplete="off" value="<?php echo $c_name; ?>">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone_no" autocomplete="off" value="<?php echo $phone_no; ?>">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter customer address" name="address" autocomplete="off" value="<?php echo $address; ?>">
            </div>

            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
