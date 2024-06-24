<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="pruser.php" class="text-light">Add Prescription</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Prescription ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Prescription Date</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM prescriptions";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $prescription_id = $row['prescription_id'];
                    $customer_id = $row['customer_id'];
                    $prescription_date = $row['prescription_date'];
                    $doctor_name = $row['doctor_name'];

                    echo '<tr>
                            <th scope="row">' . $prescription_id . '</th>
                            <td>' . $customer_id . '</td>
                            <td>' . $prescription_date . '</td>
                            <td>' . $doctor_name . '</td>
                            <td>
                                <button class="btn btn-success"><a href="prupdate.php?updateid=' . $prescription_id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="prdelete.php?deleteprescriptionid=' . $prescription_id . '" class="text-light">Delete</a></button>
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
