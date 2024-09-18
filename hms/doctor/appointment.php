<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    // Check if connection to the database is successful
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Appointment</h5>

                    <?php
                    // Debug: Check if the connection and query are working
                    $res = mysqli_query($connect, "SELECT * FROM appointment WHERE status='pending'");
                    if (!$res) {
                        die("Query failed: " . mysqli_error($connect));
                    }

                    $output = "";

                    $output .= "
                    <table class='table table-bordered'>
                    <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Surname</td>
                        <td>Gender</td>
                        <td>Phone</td>
                        <td>Appointment</td>
                        <td>Symptoms</td>
                        <td>Date Booked</td>
                        <td>Action</td>
                    </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                        <tr>
                            <td class='text-center' colspan='9'>No appointments yet</td>
                        </tr>
                        ";
                    } else {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $output .= "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['surname']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['symptoms']}</td>
                                <td>{$row['date_booked']}</td>
                                <td>
                                    <a href='discharge.php?id={$row['id']}' class='btn btn-info'>Check</a>
                                </td>
                            </tr>
                            ";
                        }
                    }

                    $output .= "</table>";

                    echo $output;

                    // Close the database connection
                    mysqli_close($connect);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
