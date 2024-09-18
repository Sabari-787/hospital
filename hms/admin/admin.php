<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admnin</title>
</head>

<body>
    <?php
    session_start();
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
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">
                                All Admin
                            </h5>

                            <?php
                            $ad = $_SESSION['admin'] ?? ''; // Set $ad to $_SESSION['admin'] if it's set, otherwise set it to an empty string
                            
                            $query = "select * from admin where username !='$ad'";
                            $res = mysqli_query($connect, $query);
                            $output = "  <table class='table table-responsive table-bordered'>
                            <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th style='width:10%'>Action</th>
                            </tr>";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "<tr><td colspan='3' class='text-center'>No new Admin</td></tr>";

                            }
                            while ($row = mysqli_fetch_array($res)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $output .= "
                                <tr>
                                <td>$id</td>
                                <td>$username</td>
                                <td>
                                    <a href='admin.php?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
                                </td>
                                </tr>
                                ";
                            }

                            $output .= "
                            </table>
                            ";

                            echo $output;

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $query = "Delete from admin where id='$id'";
                                mysqli_query($connect, $query);


                            }
                            ?>




                        </div>
                        <div class="col-md-6">
                            <?php

                            if (isset($_POST['add'])) {
                                $uname = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $image = $_FILES['img']['name'];
                                $error = array();
                                if (empty($uname)) {
                                    $error['u'] = "Enter Admin Username";
                                    echo 'user';

                                } else if (empty($pass)) {
                                    $error['u'] = "Enter Admin Password";
                                    echo 'user';

                                } else if (empty($image)) {
                                    $error['u'] = "Add admin Picture";
                                }

                                if (count($error) == 0) {
                                    $q = "Insert into admin(username,password,profile) 
                                    Values ('$uname','$pass','$image')";
                                    $result = mysqli_query($connect, $q);

                                    if ($result) {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                    } else {

                                    }
                                }

                            }
                            ?>
                            <h5 class="text-center">
                                Add Admin
                            </h5>
                            <?php

                          
                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Add Admin Picture</label>
                                    <input type="file" name="img" class="form-control">
                                </div><br>
                                <input type="submit" name="add" class="btn btn-success" value="Add new Admin">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php">a</a>
</body>

</html>