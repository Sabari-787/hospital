<?php
session_start();

error_reporting();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("../include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php


                                    include("../include/connection.php");

                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE username='$doc'";
                                    $res = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($res);

                                    if (isset($_POST['upload'])) {
                                        $img = $_FILES['img']['name'];

                                        if (!empty($img)) {
                                            $query = "UPDATE doctors SET profile='$img' WHERE username='$doc'";
                                            $res = mysqli_query($connect, $query);
                                            if ($res) {
                                                move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                            }
                                        }
                                    }

                                    if (isset($_POST['change_uname'])) {
                                        $uname = $_POST['uname'];
                                        if (!empty($uname)) {
                                            $query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";
                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                $_SESSION['doctor'] = $uname;
                                            }
                                        }
                                    }

                                    if (isset($_POST['change_pass'])) {
                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $ol = "SELECT * FROM doctors WHERE username='$doc'";
                                        $ols = mysqli_query($connect, $ol);
                                        $row = mysqli_fetch_array($ols);

                                        if ($old != $row['password']) {
                                            // Handle incorrect old password
                                        } elseif (empty($new)) {
                                            // Handle empty new password
                                        } elseif ($con != $new) {
                                            // Handle new password and confirm password mismatch
                                        } else {
                                            $query = "UPDATE doctors SET password = '$new' WHERE username='$doc'";
                                            mysqli_query($connect, $query);
                                        }
                                    }
                                    ?>


                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                        echo "<img src='img/" . $row['profile'] . "' style='height:250px;'>";
                                        ?>
                                        <input type="file" class="form-control" name="img">
                                        <input type="submit" name="upload" class="btn btn-success"
                                            value="Update Profile">
                                    </form>
                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td>FirstName</td>
                                                <td>
                                                    <?php
                                                    echo $row['firstname']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>SurName</td>
                                                <td>
                                                    <?php
                                                    echo $row['surname']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td>
                                                    <?php
                                                    echo $row['username']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>
                                                    <?php
                                                    echo $row['email']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Phone no.</td>
                                                <td>
                                                    <?php
                                                    echo $row['phone']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>
                                                    <?php
                                                    echo $row['gender']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>
                                                    <?php
                                                    echo $row['country']
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Salary</td>
                                                <td>
                                                    <?php
                                                    echo $row['salary']
                                                        ?>
                                                </td>
                                            </tr>

                                            </tr>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center">Change Username</h5>
                                    <?php
                                    if (isset($_POST['change_uname'])) {
                                        $uname = $_POST['uname'];
                                        if (empty($uname)) {

                                        } else {
                                            $query = "update doctors set username='$uname' where username='$doc'";
                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                $_SESSION['doctor'] = $uname;
                                            }
                                        }
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <label for="">Change username</label>
                                        <?php

                                        include("../include/connection.php");

                                        $doc = $_SESSION['doctor'];
                                        $query = "Select * from doctors where username='$doc'";
                                        $res = mysqli_query($connect, $query);
                                        $row = mysqli_fetch_array($res);

                                        if (isset($_POST['upload'])) {
                                            $img = $_FILES['img']['name'];

                                            if (!empty($img)) {
                                                $query = "Update doctors set profile='$img' where username='$doc'";
                                                $res = mysqli_query($connect, $query);
                                                if ($res) {
                                                    move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                                }
                                            }
                                        }

                                        if (isset($_POST['change_uname'])) {
                                            $uname = $_POST['uname'];
                                            if (empty($uname)) {
                                                $query = "update doctors set username='$uname' where username='$doc'";
                                                $res = mysqli_query($connect, $query);

                                                if ($res) {
                                                    $_SESSION['doctor'] = $uname;
                                                }
                                            }
                                        }
                                        ?>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                        <input type="submit" class="btn-success btn" name="change_uname" value="submit">
                                    </form>
                                    <br><br>
                                    <h5 class="text-center">Change Password</h5>

                                    <?php if (isset($_POST['change_pass'])) {
                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $query = "SELECT * FROM doctors WHERE username='$doc'";
                                        $result = mysqli_query($connect, $query);
                                        $row = mysqli_fetch_array($result);

                                        if ($old == $row['password']) {
                                            echo '<script>alert("Incorrect old password");</script>';
                                        } elseif (empty($new)) {
                                            echo '<script>alert("New password cannot be empty");</script>';
                                        } elseif ($con != $new) {
                                            echo '<script>alert("New password and confirm password do not match");</script>';
                                        } else {
                                            $query = "UPDATE doctors SET password = '$new' WHERE username='$doc'";
                                            if (mysqli_query($connect, $query)) {
                                                echo '<script>alert("Password changed successfully");</script>';
                                            } else {
                                                echo "Error changing password: " . mysqli_error($connect);
                                            }
                                        }
                                    }

                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">

                                            <label for="">old Password</label>
                                            <input type="text" name="old_pass" class="form-control" autocomplete="off">

                                        </div>


                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="text" name="new_pass" class="form-control" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label for="">confirm Password</label>
                                            <input type="text" name="con_pass" class="form-control" autocomplete="off">
                                        </div>
                                        <input type="submit" class="btn btn-info" name="change_pass" value="Change">
                                    </form>

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