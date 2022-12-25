<?php
include "connect.php";
$id = $_POST['id'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];
$role = $_POST['role'];
$edit = "UPDATE `user` 
SET fullname = '$fullname',email = '$email',phonenumber = '$phonenumber', password = '$password', ID_Role =$role 
WHERE ID = $id";
mysqli_query($conn, $edit);
header("Location: homespageadmin.php");

?>