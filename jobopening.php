<?php include './include/head.php';
$cpage = "jobopening";

?>
<?php include './include/nav.php';  ?>

<?php if (isset($_SESSION['mssg'])) { ?>
<div class="alert bg-<?= $_SESSION['class']  ?> text-white" role="alert"
    style="position:absolute;right:30px;z-index:121;top:140px;">
    <?= $_SESSION['mssg']  ?>
</div>
<?php }
unset($_SESSION['mssg']);
unset($_SESSION['class']);
?>
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Find the perfect jobs</h1>
                    <p>Seize the opportunity to shape your future by completing our career job
                        opening form and unlock a world of possibilities.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <!-- <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            About
                        </li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</section>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container mt-0 pt-0">
    <div class="row align-items-end mb-4 pb-2">
        <div class="col-md-8">
            <div class="section-title text-center text-md-start">
            </div>
        </div>
        <!--end col-->
        <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
            <div class="text-center text-md-end">
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <?php
        $slcJob = mysqli_query($con, "SELECT * FROM `jobopenings` ORDER BY id DESC");
        if (mysqli_num_rows($slcJob) > 0) {
            while ($res = mysqli_fetch_assoc($slcJob)) {
        ?>
        <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">

                    <span class="badge rounded-pill  float-md-end mb-3 mb-sm-0"
                        style="background-color:#c2943c;"><?= $res['status'] ?></span>
                    <h5><?= $res['jobTitle'] ?></h5>
                    <div class="mt-3">
                        <!-- <span class="text-muted d-block"><i class="fa fa-home" aria-hidden="true"></i> <a href="#"
                                target="_blank" class="text-muted">Bootdey.com LLC.</a></span> -->
                        <span class="text-muted d-block"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            <?= $res['jobLocation'] ?></span>
                        <span class="text-muted d-block"><i class="fa fa-briefcase" aria-hidden="true"></i>
                            <?= $res['jobType'] ?></span>
                        <span class="text-muted d-block">
                            ₹
                            <?= $res['salary'] ?></span>
                        <span class="text-muted d-block">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                            <?= date('d-m-Y', strtotime($res['lastDate'])) ?> (Last Day to Apply)</span>
                    </div>

                    <div class="mt-3">

                        <a href="career.php?jobId=<?= $res['jobId'] ?>" class="btn btn-primary"
                            style="background-color: #c2943c; border:none; float:right; <?php if ($res['status'] == 'Closed') echo "pointer-events: none"; ?>"><b>
                                <?php if ($res['status'] == 'Closed') echo "Closed";
                                        else echo "Apply Now" ?> </b></a>

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <?php }
        } else {
            ?>
        <div class="col-lg-12 col-md-12 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <h5 class="text-center">Currently No Job Openenigs</h5>
                </div>
            </div>
        </div>
        <?php
        } ?>

        <!--end col-->
    </div>
    <!--end row-->
</div>
<?php include './include/foter.php';  ?>
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>



</body>

</html>