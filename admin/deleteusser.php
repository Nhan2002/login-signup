<?php
include 'connect.php';
$id = $_GET['sid'];
$sql = "DELETE FROM `user` WHERE ID = $id";
$query = mysqli_query($conn, $sql);
header("Location: homespageadmin.php");
?>