<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    if ((empty($uname))) {
        echo "<script>alert('Enter the username')</script>";
    } else if ((empty($pass))) {
        echo "<script>alert('Enter the Password')</script>";
    } else {
        $query = "Select * from patient where username='$uname' and password ='$pass'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res) == 1) {
            header('Location:patient/index.php');

            $_SESSION['patient'] = $uname;
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>

<body style="background-image:url(images/HOSPITA.jpeg); background-repeat:no-repeat;
background-size:cover">

    <?php
    include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 bg-white">
                    <h5 class="text-center my-3">
                        Patient Login
                    </h5>


                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="Password" name="pass" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                        <p>I Dont Have an Account <a href="account.php">Click here.</a></p>

                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>