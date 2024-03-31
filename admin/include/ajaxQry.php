<?php
include './connection.php';
if (isset($_POST['checking_SchoolId'])) {
    $SchoolId = $_POST['SchoolId'];
    $IsEditingTeacher = $_POST['IsEditingTeacher'];
    $slect = "SELECT `SchoolId` FROM `schooldetails` WHERE `SchoolId` = '$SchoolId'";
    $qry = mysqli_query($con, $slect);
    if (mysqli_num_rows($qry) > 0) {
        $slectTeacher = "SELECT `TeacherId` FROM `teacherdetails` ORDER BY id DESC LIMIT 1";
        $qryTeacher = mysqli_query($con, $slectTeacher);
        if (mysqli_num_rows($qryTeacher) > 0) {
            if ($IsEditingTeacher === 'true') {
                $TeacherId = $_POST['TeacherId'];
                $explode = explode("T", $TeacherId);
                $newId = $explode[1];
                $result = $SchoolId . "_T" . sprintf("%03s", $newId);
            }
            if ($IsEditingTeacher === 'false') {
                $resTeacher = mysqli_fetch_assoc($qryTeacher);
                $TeacherId =  $resTeacher['TeacherId'];
                $explode = explode("T", $TeacherId);
                $newId = $explode[1] + 1;
                $result = $SchoolId . "_T" . sprintf("%03s", $newId);
            }
        } else {
            $result = "NoId";
            $result = $SchoolId . "_T001";
        }
    } else {
        $result = false;
    }
    echo json_encode($result);
}
