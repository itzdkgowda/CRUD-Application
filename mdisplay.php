<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="muser.php" class="text-light">Add manufacturer</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Manufacturer Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM manufactures";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $manufacturer_id = $row['manufacturer_id'];
                    $manufacturer_name = $row['manufacturer_name'];
                    $location = $row['location'];

                    echo '<tr>
                            <th scope="row">' . $manufacturer_id . '</th>
                            <td>' . $manufacturer_name . '</td>
                            <td>' . $location . '</td>
                            <td>
                                <button class="btn btn-success"><a href="mupdate.php?updateid=' . $manufacturer_id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="mdelete.php?deletemanufacturerid=' . $manufacturer_id . '" class="text-light">Delete</a></button>
                            </td>
                          </tr>';
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            // Close the connection
            mysqli_close($conn);
            ?>

            </tbody>
        </table>
    </div>
    
</body>
</html>
