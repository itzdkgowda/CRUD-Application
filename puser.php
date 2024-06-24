<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $product_id = $_POST['product_id'];
    $p_name = $_POST['p_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $mg = $_POST['mg'];
    $dosage = $_POST['dosage'];
    $quantity_available = $_POST['quantity_available'];
    $last_restock_date = $_POST['last_restock_date'];

    $sql = "INSERT INTO products (product_id, p_name, description, category, mg, dosage, quantity_available, last_restock_date) VALUES ('$product_id', '$p_name', '$description', '$category', '$mg', '$dosage', '$quantity_available', '$last_restock_date')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:pdisplay.php'); // Change this link to the appropriate display file for products
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
    <title>Product Registration</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Product ID</label>
                <input type="number" class="form-control" placeholder="Enter product ID" name="product_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" placeholder="Enter product name" name="p_name" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter product description" name="description" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Enter product category" name="category" autocomplete="off">
            </div>

            <div class="form-group">
                <label>MG</label>
                <input type="text" class="form-control" placeholder="Enter product MG" name="mg" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Dosage</label>
                <input type="text" class="form-control" placeholder="Enter product dosage" name="dosage" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Quantity Available</label>
                <input type="number" class="form-control" placeholder="Enter product quantity available" name="quantity_available" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Last Restock Date</label>
                <input type="date" class="form-control" placeholder="Enter last restock date" name="last_restock_date" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
