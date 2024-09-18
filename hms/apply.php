<?php
include("include/connection.php");

if (isset($_POST['apply'])) {
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if (empty($firstname)) {
        $error['apply'] = "Enter FirstName";
    } else if (empty($surname)) {
        $error['apply'] = "Enter Surname";
    } else if (empty($username)) {
        $error['apply'] = "Enter username";
    } else if (empty($email)) {
        $error['apply'] = "Enter the email Address";
    } else if (($gender) == "") {
        $error['apply'] = "Select the gender";
    } else if (empty($phone)) {
        $error['apply'] = "Enter the phone number";
    } else if (($country) == "") {
        $error['apply'] = "Select the country";
    } else if (empty($password)) {
        $error['apply'] = "Enter the password";
    } else if (($confirm_password) != $password) {
        $error['apply'] = "Both password Not Match";
    }

    if (count($error) == 0) {
        $query = "Insert into doctors(firstname,surname,username,email,
gender,phone,country,password,salary,data_reg,status,profile)
 values('$firstname','$surname','$username','$email','$gender',
 '$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
        $result = mysqli_query($connect, $query);
        if ($result) {
            echo "<script>alert('You have Successfully Applied')</script>";
            header('Location:doctorlogin.php');
        } else {
            echo "<script>alert('Failed')</script>";

        }
    }
}
if (isset($error['apply'])) {
    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
} else {
    $show = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-image:url(images/HOSPITAl.jpeg); background-repeat:no-repeat;
background-size:cover">
    <?php
    include("include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron bg-white">
                    <h5 class="text-center">
                        Apply Now
                    </h5>
                    <div>
                        <?php
                        echo $show;
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">
                                FirstName
                            </label>
                            <input type="text" class="form-control" autocomplete="off" name="fname" value="<?php
                            if (isset($_POST['fname']))
                                echo $_POST['fname'];
                            ?>">

                        </div>
                        <div class="form-group">
                            <label for="">
                                Last Name
                            </label>
                            <input type="text" class="form-control" autocomplete="off" name="sname" placeholder="Enter the last" value="
                            <?php
                            if (isset($_POST['sname']))
                                echo $_POST['sname'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <label for="">
                                UserName
                            </label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" value="
                            <?php
                            if (isset($_POST['uname']))
                                echo $_POST['uname'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input type="text" name="email" class="form-control" autocomplete="off" value="
                            <?php
                            if (isset($_POST['email']))
                                echo $_POST['email'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Select-group
                            </label>

                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Phone
                            </label>
                            <input type="text" name="phone" class="form-control" autocomplete="off" value="
                            <?php
                            if (isset($_POST['Phone']))
                                echo $_POST['Phone'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Select-Country
                            </label>

                            <select id="" class="form-control" name="country">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="America">America</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pass">
                                Password
                            </label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="pass">
                                confirm Password
                            </label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="apply" value="Apply now" class="btn btn-success text-center">
                        <p>I already have an account <a href="doctorlogin.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
</body>

</html>