<?php
$cpage = "sliders";
$heading = "Home Sliders";
include 'include/header.php';
$slect = "SELECT * FROM `sliders` ORDER BY id DESC";
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
                                    <a href="add_sliders.php" class="btn btn-success">Add Sliders</a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Sliders Img</th>
                                                <th>Btn Text</th>
                                                <th>Btn Link</th>
                                                <th>Slider Content</th>
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
                                                <td><img src="../uploadeImgs/<?= $res['sliderImg'] ?>" alt=""
                                                        style="width:50px;">
                                                </td>
                                                <td><?= $res['btnText'] ?></td>
                                                <td><?= $res['btnLink'] ?></td>
                                                <td><?= $res['sliderText'] ?></td>
                                                <td>
                                                    <a href="edit_sliders.php?id=<?= $res['id'] ?>"
                                                        class="text-success"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="" class="text-danger deleteId" data-toggle="modal"
                                                        data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>"
                                                        data-name="<?= $res['btnText'] ?>"
                                                        data-deleteBtnVal="DeleteSlider">
                                                        <i class="nav-icon fas fa-trash"></i></a>
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