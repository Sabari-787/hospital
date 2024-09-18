<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS welcome</title>
</head>

<body>
    <?php
    include("include/header.php");
 
    if (isset($_GET['submitt'])) {
     $number=$_POST['number'];
     echo `$number`;

     if($number===24){
        header("Location:apply.php");
     }
    }

    ?>
    <div style="margin-top:15px;"></div>
    <div class="container">
        <div class="col-md-12 my-3">
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-md-3 mx-1 shadow">
                    <img src="images\pharmacyadmin.jpg" style="width:100%; height:200px;">
                    <h5 class="text-center">Pharmacy</h5>
                    <a href="admin.php">
                        <button class="btn btn-success my-3" style="margin-left:30%">Enter Here</button>
                    </a>
                </div>
                <div class="col-md-4 mx-1 shadow">
                    <img src="images\patient.jpeg" style="width:100%; height:200px;">
                    <h5 class="text-center">We are here to help you </h5>
                    <a href="patientlogin.php">
                        <button class="btn btn-success my-3" style="margin-left:30%">Create account</button>
                    </a>

                  


                </div>
                <div class="col-md-3 mx-1 shadow">
                    <img src="images\doctor.jpeg" style="width:100%; height:200px;">
                    <h5 class="text-center">Doctors come here</h5>
                    <a href="doctorlogin.php">
                        <button class="btn btn-success my-3" style="margin-left:30%">Apply now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>