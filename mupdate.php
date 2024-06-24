<?php
include 'connect.php';

$manufacturer_id = $_GET['updateid'];
$sql = "SELECT * FROM manufactures WHERE manufacturer_id = $manufacturer_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$manufacturer_id = $row['manufacturer_id'];
$manufacturer_name = $row['manufacturer_name'];
$location = $row['location'];

if (isset($_POST['submit'])) {
    $newManufacturerId = $_POST['manufacturer_id'];
    $newManufacturerName = $_POST['manufacturer_name'];
    $newLocation = $_POST['location'];

    $updateSql = "UPDATE manufactures SET manufacturer_id = '$newManufacturerId', manufacturer_name = '$newManufacturerName', location = '$newLocation' 
                    WHERE manufacturer_id = $manufacturer_id";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header('location:mdisplay.php'); // Change this link to the appropriate display file for manufactures
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
    <title>Manufacturer Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Manufacturer ID</label>
                <input type="number" class="form-control" placeholder="Enter manufacturer ID" name="manufacturer_id" autocomplete="off" value="<?php echo $manufacturer_id; ?>">
            </div>

            <div class="form-group">
                <label>Manufacturer Name</label>
                <input type="text" class="form-control" placeholder="Enter manufacturer name" name="manufacturer_name" autocomplete="off" value="<?php echo $manufacturer_name; ?>">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter location" name="location" autocomplete="off" value="<?php echo $location; ?>">
            </div>

            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
