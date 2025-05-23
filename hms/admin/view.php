<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Patient details</title>
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
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10 text-center">
                    <h5 class="text-center my-3">View Patient Details</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "Select * from patient where id='$id'";
                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);
                    }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php echo ' <img src="../patient/img/' . $row['profile'] . '" class="col-md-12 my-2" height="250px;" alt="">
' ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center " colspan="2">
                                            Details
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>FirstName</td>
                                        <td>
                                            <?php echo $row['firstname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>surname</td>
                                        <td>
                                            <?php echo $row['surname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>username</td>
                                        <td>
                                            <?php echo $row['username']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>phone</td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>
                                            <?php echo $row['gender']; ?>
                                        </td>
                                    <tr>
                                        <td>country</td>
                                        <td>
                                            <?php echo $row['country']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date_reg</td>
                                        <td>
                                            <?php echo $row['date_reg']; ?>
                                        </td>
                                    </tr>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>