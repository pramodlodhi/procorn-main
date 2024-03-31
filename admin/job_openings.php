<?php
$cpage = "job";
$heading = "All Job Openings";
include 'include/header.php';
$slect = "SELECT * FROM `jobopenings` ORDER BY id DESC";
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
                                    <a href="add_job_opening.php" class="btn btn-success">Add Job</a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Job Id</th>
                                                <th>Title</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>Status</th>
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
                                                        <td><?= $res['jobTitle'] ?></td>
                                                        <td><?= $res['jobLocation'] ?></td>
                                                        <td><?= $res['salary'] ?></td>
                                                        <td><?= $res['status'] ?></td>
                                                        <td>
                                                            <a href="add_job_opening.php?id=<?= $res['id'] ?>" class="text-success"><i class="nav-icon fas fa-edit"></i></a>
                                                            <a href="" class="text-danger deleteId" data-toggle="modal" data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>" data-name="<?= $res['jobTitle'] ?>" data-deleteBtnVal="DeleteJobId"><i class="nav-icon fas fa-trash"></i></a>
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