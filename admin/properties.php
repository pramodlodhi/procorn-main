<?php
$cpage = "properties";
$heading = "All Properties";
include 'include/header.php';
$slect = "SELECT * FROM `propertydetails` ORDER BY id DESC";
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
                                    <a href="add_properties.php" class="btn btn-success">Add Properties</a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Property Id</th>
                                                <th>Location</th>
                                                <th>Property Type</th>
                                                <th>Property Status</th>
                                                <th>Property Amount</th>
                                                <th>Property Gallary</th>
                                                <th>Property Video</th>
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
                                                <td><?= $res['property_id'] ?></td>
                                                <td><?= $res['location'] ?></td>
                                                <td><?= $res['property_type'] ?></td>
                                                <td><?= $res['property_Status'] ?></td>
                                                <td><?= $res['property_amount'] ?></td>
                                                <td><a
                                                        href="property_gallery.php?property_id=<?= $res['property_id'] ?>">Gallary</a>
                                                </td>
                                                <td> <?php if ($res['property_video'] != "") {
                                                                ?>
                                                    <a href="../uploadeImgs/<?= $res['property_video'] ?>"
                                                        target="_blank">See
                                                        Video</a>
                                                    <?php } else {
                                                                    echo '<strong class="text-danger">No Video </strong>';
                                                                }
                                                            ?>
                                                </td>
                                                <td>

                                                    <a href="edit_properties.php?property_id=<?= $res['property_id'] ?>"
                                                        class="text-success"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="" class="text-danger deleteId" data-toggle="modal"
                                                        data-target="#DeleteModel"
                                                        data-deleteId="<?= $res['property_id'] ?>"
                                                        data-name="<?= $res['property_id'] ?>"
                                                        data-deleteBtnVal="DeleteProperty"><i
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