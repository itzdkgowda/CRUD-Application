<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchases CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="puuser.php" class="text-light">Add Purchase</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Purchase ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Quantity</th>
                    
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM purchases";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $purchase_id = $row['purchase_id'];
                    $customer_id = $row['customer_id'];
                    $purchase_date = $row['purchase_date'];
                    $total_cost = $row['total_cost'];
                    $quantity = $row['quantity'];

                    echo '<tr>
                            <th scope="row">' . $purchase_id . '</th>
                            <td>' . $customer_id . '</td>
                            <td>' . $purchase_date . '</td>
                            <td>' . $total_cost . '</td>
                            <td>' . $quantity . '</td>
                           
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
