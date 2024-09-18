<?php
session_start(); // Starts the session, allowing you to store and retrieve session variables.

include("include/connection.php"); // Includes the file connection.php which presumably contains the code to connect to your database.

if (isset($_POST['login'])) { // Checks if the form with the name 'login' has been submitted.

    $username = $_POST['uname']; // Retrieves the value of the 'uname' field from the submitted form and assigns it to the variable $username.
    $password = $_POST['pass']; // Retrieves the value of the 'pass' field from the submitted form and assigns it to the variable $password.

    $error = array(); // Initializes an array to store any potential errors.

    if (empty($username)) { // Checks if the $username variable is empty.
        $error['admin'] = "Enter username"; // Sets an error message in the $error array if the username is empty.
    } else if (empty($password)) { // Checks if the $password variable is empty.
        $error['admin'] = "Enter password"; // Sets an error message in the $error array if the password is empty.
    }

    if (count($error) == 0) { // Checks if there are no errors in the $error array.
        $query = "select * from admin where username ='$username' and password='$password'"; // Constructs a SQL query to select data from the 'admin' table where the username and password match the provided values.
        $result = mysqli_query($connect, $query); // Executes the SQL query using the database connection established in connection.php and stores the result in the $result variable.

        if (mysqli_num_rows($result) == 1) { // Checks if there is exactly one row in the result set.
            echo "<script>alert('You have login as admin')</script>"; // Displays a JavaScript alert indicating successful login.
            $_SESSION['admin'] = $username; // Sets a session variable 'admin' with the value of the username.

            header("Location:admin/index.php"); // Redirects the user to the admin/index.php page.
            exit(); // Terminates the script execution to prevent further execution after redirection.

        } else {
            echo "<script>alert('invalid username or password1')</script>"; // Displays a JavaScript alert indicating invalid username or password.
        }
    }
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

    <div style="margin-top:20px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-6 jumbotron" style="background-color:white;">
                    <img src="images/admin.jpeg" class="col-md-12">
                    <form method="post" class="my-2">
                        <div>
                            <?php
                            if (isset($error['admin'])) {
                                $sh = $error['admin'];
                                $show = "<h4 class='alert alert-danger'>$sh</h4>";
                            } else {
                                $show = "";
                            }
                            echo "$show";
                            ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="">
                            </div>
                            <div class="form-group jumbotron">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <input type="submit" name="login" class="btn btn-success" value="login">
                    </form>

                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>


</body>

</html>