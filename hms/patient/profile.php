<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php
                    include("sidenav.php");
                    $patient = $_SESSION['patient'];

                    $query = "Select * from patient where username='$patient'";
                    $res = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($res)
                        ?>
                </div>
                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST['upload'])) {
                                $img = $_FILES['img']['name'];

                                if (empty($img)) {

                                } else {
                                    $query = "Update patient set profile='$img' 
                            where username='$patient'";
                                    $res = mysqli_query($connect, $query);

                                    if ($res) {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                    }
                                }
                            }
                            ?>
                            <h5>
                                My profile
                            </h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                echo "<img src='img/" . $row['profile'] . "' class='col-md-12' style='height:250px;'";
                                ?>
                                <input type="file" name="img" class="form-control my-2">

                                <input type="file" name="img" class="form-control my-2">
                                <input type="submit" name="upload" class="btn btn-info" value="update profile">
                            </form>

                            <table class="table table-border">
                                <tr>
                                    <th class="text-center" colspan="2">
                                        My Details
                                    </th>
                                </tr>

                                <tr>
                                    <th class="" colspan="">
                                        FirstName
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['firstname'] ?>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="" colspan="">
                                        Surname
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['surname'] ?>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="" colspan="">
                                        username
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['username'] ?>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="" colspan="">
                                        Email
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['email'] ?>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="" colspan="">
                                        phone
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['phone'] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="" colspan="">
                                        gender
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['gender'] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="" colspan="">
                                        country
                                    </th>
                                    <th class="" colspan="">
                                        <?php echo $row['country'] ?>
                                    </th>
                                </tr>

                            </table>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST['update'])) {
                                $uname = $_POST['uname'];
                                if (empty($uname)) {
                                } else {
                                    $query = "update patient set username='$uname' where username='$patient'";
                                    $res = mysqli_query($connect, $query);

                                    if ($res) {
                                        $_SESSION['patient'] = $uname;
                                    }
                                }
                            }
                            ?>

                            <h5 class="text-center">Change Username</h5>

                            <form action="" method="post">
                                <label for="">Enter the username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off"
                                    placeholder="Enter the username">
                                <input type="submit" name="update" class="btn btn-info my-2" value="update Username">


                            </form>
                            <?php
                            if (isset($_POST['change'])) {
                                $old = $_POST['old_pass'];
                                $new = $_POST['new_pass'];
                                $con = $_POST['con_pass'];

                                $q = "Select * from patient where username='$patient'";

                                $re = mysqli_query($connect, $q);

                                $row = mysqli_fetch_array($re);

                                if ($old != $row['password']) {
                                    echo '<script>alert("Incorrect old password");</script>';
                                } elseif (empty($new)) {
                                    echo '<script>alert("New password cannot be empty");</script>';
                                } elseif ($con != $new) {
                                    echo '<script>alert("New password and confirm password do not match");</script>';
                                } else {
                                    $query = "UPDATE patient SET password = '$new' WHERE username='$patient'";
                                    if (mysqli_query($connect, $query)) {
                                        echo '<script>alert("Password changed successfully");</script>';
                                    } else {
                                        echo "Error changing password: " . mysqli_error($connect);
                                    }
                                }
                            }
                            ?>
                            <h5 class="my-4 text-center">Change Password</h5>
                            <form action="" method="POST">
                                <label for="">Old password</label>
                                <input type="password" name="old_pass" class="form-control" autocomplete="off">

                                <label for="">New password</label>
                                <input type="password" name="new_pass" class="form-control" autocomplete="off">

                                <label for="">confirm password</label>
                                <input type="password" name="con_pass" class="form-control" autocomplete="off">

                                <input type="submit" name="change" class="btn btn-info">
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