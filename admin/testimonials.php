<?php
$cpage = "testimonial";
$heading = "All Testimonials";
include 'include/header.php';
$slect = "SELECT * FROM `testimonials` ORDER BY id DESC";
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
                                    <a href="add_testimonials.php" class="btn btn-success">Add Testimonials</a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Img</th>
                                                <th>Name</th>
                                                <th>Profession</th>
                                                <th>Feedback</th>
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
                                                <td><a href="<?= $res['img'] ?>" target="_blank"><img
                                                            src="../uploadeImgs/<?= $res['img'] ?>" alt=""
                                                            style="width:50px;"></a></td>
                                                <td><?= $res['name'] ?></td>
                                                <td><?= $res['profession'] ?></td>
                                                <td><?= $res['feedback'] ?></td>
                                                <td><?= $res['date'] ?></td>
                                                <td>
                                                    <a href="" class="text-danger deleteId" data-toggle="modal"
                                                        data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>"
                                                        data-name="<?= $res['name'] ?>"
                                                        data-deleteBtnVal="DeleteTestimonial"><i
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