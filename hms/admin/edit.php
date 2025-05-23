<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
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
                    <h5 class="text-center">Edit Doctor</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "select * from doctors where id = '$id'";
                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);


                    }
                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="my-3">ID:
                                <?php echo $row['id'] ?>
                            </h5>
                            <h5 class="my-3">First Name:
                                <?php echo $row['firstname'] ?>
                            </h5>
                            <h5 class="my-3">Surname:
                                <?php echo $row['surname'] ?>
                            </h5>
                            <h5 class="my-3">username:
                                <?php echo $row['username'] ?>
                            </h5>
                            <h5 class="my-3">Email:
                                <?php echo $row['email'] ?>
                            </h5>
                            <h5 class="my-3">Phone:+
                                <?php echo $row['phone'] ?>
                            </h5>
                            <h5 class="my-3">Gender:
                                <?php echo $row['gender'] ?>
                            </h5>
                            <h5 class="my-3">Country:
                                <?php echo $row['country'] ?>
                            </h5>
                            <h5 class="my-3">Date registered:
                                <?php echo $row['data_reg'] ?>
                            </h5>
                            <h5 class="my-3">Salary:
                                <?php echo $row['salary'] ?>
                        </div>
                        <div class="col-md-4">
                            <h5>Update Salary</h5>
                            <?php
                            if (isset($_POST['update'])) {
                                $salary = $_POST['salary'];

                                mysqli_query($connect, "update doctors set salary ='$salary' where id='$id'");

                            }
                            ?>
                            <form action="" method="POST">
                                <label for="">Enter the Doctor's salary</label>
                                <input type="number" name="salary" class="form-control"
                                    placeholder="Enter the doctor's salary" autocomplete="off"
                                    value="<?php echo $row['salary'] ?>">
                                <input type="submit" name="update" class="btn btn-info my-3" value="update salary">
                            </form>

                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>