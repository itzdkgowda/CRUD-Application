<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="cuser.php" class="text-light">Add customer</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM customers";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $customer_id = $row['customer_id'];
                    $c_name = $row['c_name'];
                    $phone_no = $row['phone_no'];
                    $address = $row['address'];

                    echo '<tr>
                            <th scope="row">' . $customer_id . '</th>
                            <td>' . $c_name . '</td>
                            <td>' . $phone_no . '</td>
                            <td>' . $address . '</td>
                            <td>
                                <button class="btn btn-success"><a href="cupdate.php?updateid=' . $customer_id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="cdelete.php?deletecustomerid=' . $customer_id . '" class="text-light">Delete</a></button>
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
