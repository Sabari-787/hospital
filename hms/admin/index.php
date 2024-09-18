<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <style>
        .titles{
        text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");



    ?>




    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-20px ">


                    <!-- side nav bar-->
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9 col-xs-1">
                                                <?php
                                                $ad = mysqli_query($connect, "Select * from admin");
                                                $num = mysqli_num_rows($ad);
                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font
                                                -size:30px;">
                                                    <?php echo $num ?>
                                                </h5>
                                                <a href="admin.php" class='titles'>
                                                <h5 class="text-white">Total </h5>
                                                <h5 class="text-white">Admin</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-xs-1">
                                                <a href="admin.php"><i class="fa-solid fa-user-tie fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <?php
                                                $doctor = mysqli_query($connect, "Select * from doctors where status='approved'");
                                                $num2 = mysqli_num_rows($doctor);
                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font-size:30px;">
                                                    <?php echo $num2 ?>
                                                </h5>
                                               <a href="doctor.php" class='titles'>
                                               <h5 class="text-white">Total </h5>
                                                <h5 class="text-white ">Doctor</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                $p = mysqli_query($connect, 'select *
                                                from patient');
                                                $pp = mysqli_num_rows($p);

                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font-size:30px;">
                                                    <?php
                                                    echo $pp;
                                                    ?>
                                                </h5>
                                                
                                               <a href="patient.php" class="titles">
                                                        <h5 class="text-white">Total </h5>
                                                        <h5 class="text-white">Patient</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2 my-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <?php
                                                $p = mysqli_query($connect, 'select *
                                                from report');
                                                $pp = mysqli_num_rows($p);

                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font-size:30px;">
                                                    <?php
                                                    echo $pp;
                                                    ?>
                                                </h5>

                                                
                                               <a href="report.php" class="titles">
                                                        <h5 class="text-white">Total </h5>
                                                        <h5 class="text-white">Report</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="report.php"> <i class="fa-solid fa-flag fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                $job = mysqli_query($connect, "Select * From
                                                    doctors where status='Pendding'");

                                                $num1 = mysqli_num_rows($job);
                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font-size:30px;">
                                                    <?php echo $num1 ?>
                                                </h5>
                                                
                                               <a href="job_request.php" class="titles">
                                                    <h5 class="text-white">Total </h5>
                                                    <h5 class="text-white">Job Request</h5>
                                               </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="job_request.php"> <i class="fa-solid fa-book-open fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height:130px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                $in = mysqli_query($connect, 'select sum(amount_paid) as profit
                                                from income');
                                                $row = mysqli_fetch_array($in);
                                                $inc = $row['profit'];

                                                ?>
                                                <h5 class="my-2 text-center text-white" style="font-size:30px;">
                                                    <?php echo $inc ?>
                                                </h5>
                                                
                                               <a href="income.php" class="titles">
                                                <h5 class="text-white">Total </h5>
                                                    <h5 class="text-white">Income</h5>
                                               </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="income.php"> <i
                                                        class="fa-solid fa-money-check-dollar fa-3x my-3"
                                                        style="color:white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>