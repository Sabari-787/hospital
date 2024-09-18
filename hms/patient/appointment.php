<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
                    <?php include("sidenav.php") ?>
                </div>
                <div class="col-md-10">


                    <h5 class="text-center my-2">
                        Book Appointment
                    </h5>

                    <?php
                    $patient = $_SESSION['patient'];
                    $sel = mysqli_query($connect, "Select * from patient where username='$patient'");

                    $row = mysqli_fetch_array($sel);

                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $phone = $row['gender'];
                    $phone = $row['phone'];
                    $gender = $row['gender'];

                    if (isset($_POST['book'])) {
                        $date = $_POST['date'];
                        $sym = $_POST['sym'];
                        if (empty($sym)) {

                        } else {
                            $query = "insert into appointment(
                                firstname, surname, gender, 
                                phone, appointment_date, 
                                symptoms, status, date_booked) 
                                values('$firstname','$surname','$gender'
                                ,'$phone','$date','$sym','Pending',NOW())";

                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo '<script>alert("successfully Booked appointment")</script>';
                            }
                        }
                    }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6 bg-info">
                                <form action="" method="post">
                                    <label for="">Appointment date</label>
                                    <input type="date" name="date" class="form-control">

                                    <label for="">Symptoms</label>
                                    <input type="text" name="sym" class="form-control">

                                    <input type="submit" name="book" class="btn btn-info my-2" value="Book Appointment">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>