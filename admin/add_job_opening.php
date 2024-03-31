<?php
$cpage = "addJob";
$heading = "Add Job Opening";
include 'include/header.php';

// creating job id
$slcJobId = mysqli_query($con, "SELECT `jobId` FROM `jobopenings` ORDER BY `id` DESC LIMIT 1");
if (mysqli_num_rows($slcJobId) > 0) {
    $resJobId = mysqli_fetch_assoc($slcJobId);
    $explode =  explode("J", $resJobId['jobId']);
    $lastJobId = end($explode) + 1;
    $jobId = "J" . sprintf('%03d', $lastJobId);
} else {
    $jobId = "J001";
}
$BtnVal = "addJobOpening";
$jobTitle = "";
$jobLocation = "";
$jobType = "";
$salary = "";
$status = "";
$lastDate = "";

if (isset($_GET['id'])) {
    $heading = "Update Job Opening";
    $BtnVal = "UpdateJobOpening";
    $id = $_GET['id'];
    $slect = "SELECT * FROM `jobopenings` WHERE `id`= $id";
    $qry = mysqli_query($con, $slect);
    if (mysqli_num_rows($qry) > 0) {
        $res = mysqli_fetch_assoc($qry);
        $jobId = $res['jobId'];
        $jobTitle = $res['jobTitle'];
        $jobLocation = $res['jobLocation'];
        $jobType = $res['jobType'];
        $salary = $res['salary'];
        $status = $res['status'];
        $lastDate = $res['lastDate'];
    }
}
// select School Id
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .form-group label {
            font-weight: 500 !important;
        }

        .form-check input {
            width: 17px;
            height: 17px;
            margin-right: 20px;
        }

        .form-check {
            width: 20%;
        }

        .form-check label {
            margin-left: 10px;
            font-size: 1.1rem;
        }
    </style>
    <div class="wrapper">
        <?php include 'include/nav.php'; ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $heading ?></h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $heading ?></li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <form action="include/forms.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-info">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Job Id <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="jobId" value="<?= $jobId ?>" placeholder="Auto Generated" readonly>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Job Title <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="jobTitle" value="<?= $jobTitle ?>" placeholder="Enter Job Title">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Job Location <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="<?= $jobLocation ?>" name="jobLocation" placeholder="Enter Job Location">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Job Type <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="<?= $jobType ?>" name="jobType" placeholder="Enter Job Type">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Salary <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="<?= $salary ?>" name="salary" placeholder="Enter Job Type">
                                    </div>

                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">status <span class="text-danger"></span></label>
                                        <select class="form-control" name="status">
                                            <?php $statusArr = ['Open', 'Closed'];
                                            foreach ($statusArr as  $value) { ?>
                                                <option value="<?= $value ?>" <?php if ($statusArr == $status) echo "selected"; ?>><?= $value ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Last Date <span class="text-danger"></span></label>
                                        <input type="date" class="form-control" value="<?= $lastDate ?>" name="lastDate" data-toggle="toggle" data-size="sm">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-4 d-flex" style="margin: auto;">
                                        <a href="job_openings.php" class="btn btn-outline-secondary btn-md" style="color: black;margin-right:15px;">Back</a>
                                        <button type="submit" name="submit" class="btn btn-info btn-block" value="<?= $BtnVal ?>">Submit</button>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php include 'include/footer.php'; ?>


</body>

</html>