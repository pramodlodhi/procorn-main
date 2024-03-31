<?php
$cpage = "properties";
$heading = "Property Gallary";
include 'include/header.php';

if (!isset($_GET['property_id'])) {
    header('location:properties.php');
}
$property_id = $_GET['property_id'];
$slect = "SELECT `id` FROM `propertydetails` WHERE `property_id`='$property_id'";
$query = mysqli_query($con, $slect);
if (mysqli_num_rows($query) <= 0) {
    header('location:properties.php');
}
$slect_gallery = "SELECT * FROM `property_galllery` WHERE `property_id`='$property_id' ORDER BY id DESC";
$query_gallery = mysqli_query($con, $slect_gallery);
?>
<style>
.afteerDiv {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #3339;
    z-index: 23;
    display: none;

}

.innerDiv {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.innerDiv a {
    margin: 0px 10px;
    font-size: 15px;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'include/nav.php'; ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $heading ?> (<?= $_GET['property_id'] ?>)</h1>
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
                                    <a href="" data-toggle="modal" data-target="#PropertyGalleryModel"
                                        class="btn btn-success">Add Gallery Img</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        if (mysqli_num_rows($query_gallery) > 0) {
                                            while ($res = mysqli_fetch_assoc($query_gallery)) {
                                        ?>
                                        <div class="col-lg-4 c0l-md-6 col-12" style="cursor: pointer;">
                                            <div class="card propImage" style="position: relative;">
                                                <img class="card-img-top"
                                                    src="../uploadeImgs/<?= $res['property_img'] ?>"
                                                    alt="Card image cap">
                                                <div class="afteerDiv">
                                                    <!-- <a href="" class="text-light float-right" style="margin-right:15px ;"> <i class="fa fa-times" aria-hidden="true"></i></a> -->


                                                    <div class="innerDiv">
                                                        <a href="../uploadeImgs/<?= $res['property_img'] ?>"
                                                            target="_blank" class="text-light"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>

                                                        <a href="" class="text-danger deleteId" data-toggle="modal"
                                                            data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>"
                                                            data-name="Property Image"
                                                            data-deleteBtnVal="DeletePropertyImg"><i
                                                                class="nav-icon fas fa-trash"></i></a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <div class="card col-lg-12 col-md-12 col-12">
                                            <div class="card-body">
                                                <p class="card-text text-center">No Gallery Uploaded</p>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include 'include/footer.php'; ?>
</body>

<script>
$(document).ready(function() {
    $(".propImage").click(function() {
        $(".afteerDiv", this).toggle();
    })
})
</script>

</html>