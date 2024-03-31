<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "propcorn";
$con = mysqli_connect($host, $user, $pass, $db) or die("No Database Connection");
date_default_timezone_set("Asia/Calcutta");