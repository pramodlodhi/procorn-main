<?php include './include/head.php';
$cpage = "property-grid"; ?>

<body>
    <!-- ======= Header/Navbar ======= -->
    <?php include './include/nav.php';  ?>

    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Our Amazing Properties</h1>
                            <span class="color-text-a">All Properties</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Properties Grid
                                </li>
                            </ol> -->
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row">
                    <?php
                    $slcProperties = mysqli_query($con, "SELECT * FROM `propertydetails` ORDER BY id DESC");
                    if (mysqli_num_rows($slcProperties) > 0) {
                        while ($res = mysqli_fetch_assoc($slcProperties)) {
                    ?>
                    <div class="col-md-4 mb-5">
                        <div class="card-box-a card-shadow" style="height: 100%;">
                            <?php
                                    if ($res['property_CoverImage'] != "") {
                                        $proprtyImg = "./uploadeImgs/" . $res['property_CoverImage'];
                                    } else {
                                        $proprtyImg = "./uploadeImgs/dummyHome.png";
                                    }
                                    ?>
                            <div class="img-box-a">
                                <img src="<?= $proprtyImg ?>" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="#"><?= $res['location'] ?></a>
                                            <!-- <a href="#">204 Mount
                                                <br /> Olive Road Two</a> -->
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a"><?= $res['property_Status'] ?> | ₨
                                                <?= $res['property_amount'] ?></span>
                                        </div>
                                        <a href="property-details.php?property_id=<?= $res['property_id'] ?>"
                                            class="link-a">Click here to view
                                            <span class="bi bi-chevron-right"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span><?= $res['area_in_meter'] ?>m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span><?= $res['beds'] ?></span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span><?= $res['baths'] ?></span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Garages</h4>
                                                <span><?= $res['garage'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        ?>
                    <div class="col-lg-12 col-md-12 c0l-12">
                        <div class="card-box-a card-shadow">
                            <h3 class="text-center">Currently no property available</h3>
                        </div>
                    </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </section><!-- End Property Grid Single-->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->

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