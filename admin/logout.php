<?php
include 'include/connection.php';
$id = $_SESSION['id'];
$loginupdt = mysqli_query($con, "UPDATE `login` SET `loginStatus`= false WHERE `id` = $id");
session_destroy();
session_reset();
session_abort();
header('location:login.php');
