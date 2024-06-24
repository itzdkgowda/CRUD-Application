<?php
include 'connect.php';

$product_id = $_GET['updateid'];
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$product_id = $row['product_id'];
$p_name = $row['p_name'];
$description = $row['description'];
$category = $row['category'];
$mg = $row['mg'];
$dosage = $row['dosage'];
$quantity_available = $row['quantity_available'];
$last_restock_date = $row['last_restock_date'];

if (isset($_POST['submit'])) {
    $newProductId = $_POST['product_id'];
    $newPName = $_POST['p_name'];
    $newDescription = $_POST['description'];
    $newCategory = $_POST['category'];
    $newMg = $_POST['mg'];
    $newDosage = $_POST['dosage'];
    $newQuantityAvailable = $_POST['quantity_available'];
    $newLastRestockDate = $_POST['last_restock_date'];

    $updateSql = "UPDATE products SET product_id = '$newProductId', p_name = '$newPName', description = '$newDescription', category = '$newCategory',
                    mg = '$newMg', dosage = '$newDosage', quantity_available = '$newQuantityAvailable', last_restock_date = '$newLastRestockDate' 
                    WHERE product_id = $product_id";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
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
    <title>Product Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Product ID</label>
                <input type="number" class="form-control" placeholder="Enter product ID" name="product_id" autocomplete="off" value="<?php echo $product_id; ?>">
            </div>

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" placeholder="Enter product name" name="p_name" autocomplete="off" value="<?php echo $p_name; ?>">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter product description" name="description" autocomplete="off" value="<?php echo $description; ?>">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Enter product category" name="category" autocomplete="off" value="<?php echo $category; ?>">
            </div>

            <div class="form-group">
                <label>MG</label>
                <input type="text" class="form-control" placeholder="Enter product MG" name="mg" autocomplete="off" value="<?php echo $mg; ?>">
            </div>

            <div class="form-group">
                <label>Dosage</label>
                <input type="text" class="form-control" placeholder="Enter product dosage" name="dosage" autocomplete="off" value="<?php echo $dosage; ?>">
            </div>

            <div class="form-group">
                <label>Quantity Available</label>
                <input type="number" class="form-control" placeholder="Enter quantity available" name="quantity_available" autocomplete="off" value="<?php echo $quantity_available; ?>">
            </div>

            <div class="form-group">
                <label>Last Restock Date</label>
                <input type="date" class="form-control" placeholder="Enter last restock date" name="last_restock_date" autocomplete="off" value="<?php echo $last_restock_date; ?>">
            </div>

            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
