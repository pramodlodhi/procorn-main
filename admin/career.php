<?php
$cpage = "career";
$heading = "Careers";
include 'include/header.php';
$slect = "SELECT * FROM `career` ORDER BY id DESC";
$query = mysqli_query($con, $slect);
?>

<body class="hold-transition sidebar-mini layout-fixed">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <a href="add_sliders.php" class="btn btn-success">Add Sliders</a> -->
                                </div>
                                <div class="card-body" style="overflow-x: scroll;">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Job Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>City</th>
                                                <th>Exprience</th>
                                                <th>Qualification</th>
                                                <th>Job Positions</th>
                                                <th>Expec. CTC</th>
                                                <th>Resume</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($query) > 0) {
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $res['jobId'] ?></td>
                                                <td><?= $res['firstName'] . " " . $res['lastName'] ?></td>
                                                <td><?= $res['email'] ?></td>
                                                <td><?= $res['contact'] ?></td>
                                                <td><?= $res['city'] ?></td>
                                                <td><?= $res['exprience'] ?></td>
                                                <td><?= $res['qualific'] ?></td>
                                                <td><?= $res['jobPosition'] ?></td>
                                                <td><?= $res['ctc'] ?></td>
                                                <td><a href="<?= $res['resume'] ?>" target="_blank">Resume</a></td>
                                                <td><?= $res['date'] ?></td>
                                                <td>
                                                    <a href="" class="text-danger deleteId" data-toggle="modal"
                                                        data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>"
                                                        data-name="<?= $res['firstName'] ?>"
                                                        data-deleteBtnVal="DeleteCareerReq"><i
                                                            class="nav-icon fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include 'include/footer.php'; ?>
</body>

</html>