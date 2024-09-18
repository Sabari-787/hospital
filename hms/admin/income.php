<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Income</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Income</h5>
                    <?php
                    $query = "SELECT * FROM income";

                    $res = mysqli_query($connect, $query);
                    $output = "";

                    $output .= "
                    <table class='table table-bordered'>
                        <tr>
                            <th>ID</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Date Discharge</th>
                            <th>Amount Paid</th>
                        </tr>
                    ";

                    $totalAmount = 0;

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                            <tr>
                                <td class='text-center' colspan='5'>No Reports Yet</td>
                            </tr>";
                    } else {
                        while ($row = mysqli_fetch_array($res)) {
                            $output .= "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['doctor']}</td>
                                    <td>{$row['patient']}</td>
                                    <td>{$row['date_discharge']}</td>
                                    <td>{$row['amount_paid']}</td>
                                </tr>
                            ";

                            // Calculate total amount paid
                            $totalAmount += $row['amount_paid'];
                        }
                    }

                    // Display the total row
                    $output .= "
                        <tr>
                            <td colspan='4' class='text-right'><strong>Total:</strong></td>
                            <td>{$totalAmount}</td>
                        </tr>
                    ";

                    $output .= "</table>";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
