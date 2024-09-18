<?php
include("../include/connection.php");

$id = $_POST['id'];
$query = "update doctors set status='Approved' where id='$id'";
mysqli_query($connect, $query);
?>