<?php
include("include/connection.php");

if (isset($_POST['create'])) {

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($fname)) {
        $error['ac'] = 'Enter First name';
    } else if (empty($sname)) {
        $error['ac'] = "Enter the surname ";
    } else if (empty($uname)) {
        $error['ac'] = "Enter  the user name";
    } else if (empty($email)) {
        $error['ac'] = "Enter the email ";
    } else if (empty($phone)) {
        $error['ac'] = "Enter the phone number ";
    } else if ($gender == "") {
        $error['ac'] = "Select your gender ";
    } else if ($country == "") {
        $error['ac'] = "Select your country ";
    } else if (empty($password)) {
        $error['ac'] = "Enter the password";
    } else if ($con_pass != $password) {
        $error['ac'] = "Both should be match ";
    }

    if (count($error) == 0) {
        $query = "insert into patient(
            firstname, surname, username, email,
             phone, gender, country, password, date_reg,
              profile) values('$fname','$sname','$uname',
              '$email','$phone','$gender','$country',
              '$password',NOW(),'patient.jpg')";
        $res = mysqli_query($connect, $query);


        if ($res) {
            echo "<script>alert('SUCESS')</script>";

            header("Location:patientlogin.php");

        } else {
            echo "<script>alert('Failed')</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-image:url(images/HOSPITA.jpeg); background-repeat:no-repeat;
background-size:cover">

    <?php
    include("include/header.php");
    ?>

    <div class="continer-fluid a">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 bg-white">
                    <div class="col-md-2"></div>
                    <div class="col-md-12 md-2 bg-white">
                        <h5 class="text-center text-info my-2">
                            Create Account
                        </h5>

                        <form action="" method="POST">
                            <div>
                                <label for="">FirstName</label>
                                <input type="text" name="fname" class="form-control" autocomplete="off"
                                    placeholder="Enter Firstname">
                            </div>
                            <div>
                                <label for="">Lastname</label>
                                <input type="text" name="sname" class="form-control" autocomplete="off"
                                    placeholder="Enter Lastname">
                            </div>
                            <div>
                                <label for="">userName</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off"
                                    placeholder="Enter Username">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" autocomplete="off"
                                    placeholder="Enter Email">
                            </div>
                            <div>
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" autocomplete="off"
                                    placeholder="Enter Phone number">
                            </div>
                            <div class="form-group">
                                <label for=""> group </label>
                                <select name="gender" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for=""> Country </label>
                                <select name="country" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="India">India</option>
                                    <option value="Usa">Usa</option>
                                </select>
                            </div>
                            <div>
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control" autocomplete="off"
                                    placeholder="Enter Password">
                            </div>
                            <div>
                                <label for="">confirm Password</label>
                                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                    placeholder="Enter confirm Password">
                            </div>
                            <input type="submit" name='create' class="btn btn-info" value="Create Account">
                            <p>Already Have An Account<a href="patientlogin.php"> click</a></p>
                        </form>
                    </div>

                    <div class="col-md-2"></div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>