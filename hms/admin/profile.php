<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    $ad = $_SESSION['admin'] ?? '';
    $query = "Select * from admin where username='$ad'";
    $res = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];
        $profiles = $row['profile'];
    }

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                    <?php
                    include("sidenav.php");

                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>
                                    <?php
                                    echo $username;
                                    ?> Profile
                                </h4>
                                <?php
                                if (isset($_POST['update'])) {
                                    $profile = $_FILES['profile']['name'];

                                    if (empty($profile)) {

                                    } else {
                                        $query = "Update admin set profile='$profile' where username='$ad'";
                                        $result = mysqli_query($connect, $query);
                                        if ($result) {
                                            move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='img/$profiles' class='col-md-12' style='height:200px;width:400px;'";
                                    ?>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="">Update Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['change'])) { // There's an error here, '$_POST' should be changed to '$_POST' to correctly check if the form has been submitted.
                                    $uname = $_POST['uname'];
                                    // Retrieves the new username from the form.
                                    if (empty($uname)) {
                                        // If the new username is empty, do nothing.
                                    } else {
                                        $query = "Update admin set username='$uname' where username='$ad'"; // Constructs a SQL query to update the username in the 'admin' table.
                                        $res = mysqli_query($connect, $query); // Executes the SQL query.
                                
                                        if ($res) {
                                            $_SESSION['admin'] = $uname; // If the query is successful, update the username in the session variable 'admin'.
                                        }
                                    }
                                }
                                ?>
                                <form action=" " method="POST"> <!-- The form is submitted to the same page -->
                                    <label for="">change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">
                                    <!-- Input field to enter the new username -->
                                    <input type="submit" name="change" class="btn btn-success" value="change username">
                                    <!-- Submit button to change the username -->
                                </form>
                                <br><br><br>
                                <?php
                                if (isset($_POST['update_pass'])) {
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();
                                    $old = mysqli_query($connect, "select * from admin where username='$ad'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];


                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter old password";

                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Enter the new password";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Enter the Confirm password";
                                    } else if (($old_pass != $pass)) {
                                        $error['p'] = "Invalid old password";
                                    } else if (($new_pass != $con_pass)) {
                                        $error['p'] = "Invalid confirm password";

                                    }
                                    if (count($error) == 0) {
                                        $query = "Update admin set password='$new_pass' Where username='$ad'";
                                        mysqli_query($connect, $query);
                                    }


                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];
                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                } else {
                                    $show = '';
                                }




                                ?>
                                <form method="post" class="text-center my-4">
                                    <h5 class="text-center my-4">
                                        change Password
                                    </h5>
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">old Password</label>
                                        <input type="password" class="form-control" name="old_pass">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" class="form-control" name="new_pass">
                                    </div>
                                    <div class="form-group">
                                        <label for="">confirm Password</label>
                                        <input type="password" class="form-control" name="con_pass">
                                        <input type="submit" name="update_pass" value="Update_Password"
                                            class="btn btn-info">
                                    </div>
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