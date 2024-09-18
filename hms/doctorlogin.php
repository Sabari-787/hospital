<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();


    $q = "Select * from doctors where username='$uname' 
    and password='$password'";
    $qq = mysqli_query($connect, $q);

    $row = mysqli_fetch_array($qq);

    if (empty($uname)) {
        $error['login'] = "Enter your username";
    } else if (empty($password)) {
        $error['login'] = "Enter the password";

    } else if ($row['status'] == "Pendding") {
        $error['login'] = "Please wait for the admin to confirm";

    } else if ($row['status'] == "Rejected") {
        $error['login'] = "Try again later with new reg";

    }
    if (count($error) == 0) {
        $query = "select * from doctors where username='$uname' AND password='$password'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res)) {
            echo '<script>alert("Done")</script>';
            $_SESSION['doctor'] = $uname;
            header("Location:doctor/index.php");
        } else {
            echo "<script>alert('Failed')</script>";
        }
    }
}

if (isset($error['login'])) {
    $l = $error['login'];

    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
    $show = "";
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
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 jumbotron my-3" style="background-color:white;">
                    <h5 class=" text-center my-2">
                        Doctor login
                    </h5>
                    <div>
                        <?php
                        echo $show;
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" autocomplete="off" value="Login">
                        <p>I dont have an account <a href="apply.php"> Apply Now</a></p>
                    </form>
                </div>
                <div class="col-md-3">

                </div>


            </div>
        </div>
    </div>
</body>

</html>