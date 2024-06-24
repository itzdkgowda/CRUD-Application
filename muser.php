<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $manufacturer_id = $_POST['manufacturer_id'];
    $manufacturer_name = $_POST['manufacturer_name'];
    $location = $_POST['location'];

    $sql = "INSERT INTO manufactures (manufacturer_id, manufacturer_name, location) VALUES ('$manufacturer_id', '$manufacturer_name', '$location')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:mdisplay.php'); // Change this link to the appropriate display file for manufacturers
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
    <title>Manufacturer Registration</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Manufacturer ID</label>
                <input type="number" class="form-control" placeholder="Enter manufacturer ID" name="manufacturer_id" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Manufacturer Name</label>
                <input type="text" class="form-control" placeholder="Enter manufacturer name" name="manufacturer_name" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter manufacturer location" name="location" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
