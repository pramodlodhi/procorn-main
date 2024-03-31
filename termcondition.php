<?php
include './include/head.php';
include './include/nav.php';

$cpage = "termsConditions";
$heading = "Terms and Policy";

// Fetching data from the database
$slc = mysqli_query($con, "SELECT * FROM `termsconditions` ORDER BY id DESC LIMIT 1");
$res = mysqli_fetch_assoc($slc);

?>



<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single"><?= $heading ?></h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <!-- You can add breadcrumb links here if needed -->
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <p><?= $res['content'] ?></p>
    </div>

</section>
<?php include './include/foter.php';  ?>
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>