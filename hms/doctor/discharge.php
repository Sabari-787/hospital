<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check patient Appointment</title>
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
                <div class="col-md-10">
                    <h5 class="text-center my-2">
                        Total Appointment
                    </h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "Select * from appointment where id='$id'";

                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class=" table table-bordered">
                                    <tr>
                                        <td class="text-center">
                                            Appointment Details
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            First name
                                        </td>
                                        <td>
                                            <?php echo $row['firstname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            surname
                                        </td>
                                        <td>
                                            <?php echo $row['surname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            Gender
                                        </td>
                                        <td>
                                            <?php echo $row['gender']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            phone
                                        </td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            appointment
                                        </td>
                                        <td>
                                            <?php echo $row['appointment_date']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            symptoms
                                        </td>
                                        <td>
                                            <?php echo $row['symptoms']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Invoice</h5>

                                <?php
                                if (isset($_POST['send'])) {
                                    $fee = $_POST['fee'];
                                    $des = $_POST['des'];
                                    if (empty($fee)) {

                                    } else if (empty($des)) {

                                    } else {

                                        $doc = $_SESSION['doctor'];
                                        $fname = $row['firstname'];
                                        $query = "insert into income (doctor, patient, date_discharge, 
                                        amount_paid, description) 
                                        values('$doc','$fname',NOW(),'$fee','$des')";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            echo "<script>Success</script>";
                                            mysqli_query($connect, "Update appointment set 
                                        status ='Discharge' where id='$id'");

                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <label for="">fee</label>
                                    <input type="number" name="fee" class="form-control" autocomplete="off">

                                    <label for="">description</label>
                                    <input type="description" name="des" class="form-control" autocomplete="off">


                                    <input type="submit" name="send" class="btn btn-info" autocomplete="off">
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

59.57