<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="puser.php" class="text-light">Add product</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                     <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">MG</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Quantity Available</th>
                    <th scope="col">Last Restock Date</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $p_name = $row['p_name'];
                    $description = $row['description'];
                    $category=$row['category'];
                    $mg = $row['mg'];
                    $dosage = $row['dosage'];
                    $quantity_available = $row['quantity_available'];
                    $last_restock_date = $row['last_restock_date'];

                    echo '<tr>
                            <th scope="row">' . $product_id . '</th>
                            <td>' . $p_name . '</td>
                            <td>' . $description . '</td>
                            <td>' . $category . '</td>
                            <td>' . $mg . '</td>
                            <td>' . $dosage . '</td>
                            <td>' . $quantity_available . '</td>
                            <td>' . $last_restock_date . '</td>
                            <td>
                                <button class="btn btn-success"><a href="pupdate.php?updateid=' . $product_id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="pdelete.php?deleteproductid=' . $product_id . '" class="text-light">Delete</a></button>
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
