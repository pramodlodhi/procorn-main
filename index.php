<?php include './include/head.php';
$cpage = "index";

$sliderQry = mysqli_query($con, "SELECT * FROM `sliders` ORDER BY id DESC");
?>

<body>

    <!-- ======= Header/Navbar ======= -->

    <?php include './include/nav.php';  ?>
    <!-- ======= Intro Section ======= -->
    <div class="intro intro-carousel swiper position-relative">

        <div class="swiper-wrapper">
            <?php while ($resSlider = mysqli_fetch_assoc($sliderQry)) { ?>

            <div class="swiper-slide carousel-item-a intro-item bg-image"
                style="background-image: url(./uploadeImgs/<?= $resSlider['sliderImg'] ?>)">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <h1 class="intro-title mb-4 ">
                                            <!-- <span class="color-b">204 </span> Mount
                                            <br> Olive Road Two -->
                                            <?= $resSlider['sliderText'] ?>
                                        </h1>
                                        <?php
                                            if ($resSlider['btnLink'] == "") $BtnLnk = "#";
                                            else $BtnLnk = $resSlider['btnLink'];

                                            if ($resSlider['btnText'] == "") $dNone = "d-none";
                                            else $dNone = "";
                                            ?>
                                        <p class="intro-subtitle intro-price <?= $dNone ?>">
                                            <a href="<?= $BtnLnk  ?>"><span
                                                    class="price-a"><?= $resSlider['btnText'] ?></span></a>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php     } ?>

        </div>
        <div class="swiper-pagination"></div>
    </div><!-- End Intro Section -->

    <main id="main">

        <!-- ======= Latest Properties Section ======= -->
        <section class="section-property section-t3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Latest Properties</h2>
                            </div>
                            <div class="title-link mb-0 pb-0">
                                <a href="property-grid.php">All Property Page
                                    <span class="bi bi-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="property-carousel" class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $slcProperties = mysqli_query($con, "SELECT * FROM `propertydetails` ORDER BY id DESC");
                        if (mysqli_num_rows($slcProperties) > 0) {
                            while ($res = mysqli_fetch_assoc($slcProperties)) {
                                if ($res['property_CoverImage'] != "") {
                                    // $proprtyImg = $res['property_CoverImage'];
                                    $proprtyImg = "uploadeImgs/" . $res['property_CoverImage'];
                                } else {
                                    $proprtyImg = "./uploadeImgs/dummyHome.png";
                                }

                        ?>
                        <div class="carousel-item-b swiper-slide">
                            <div class="card-box-a card-shadow" style="height: 100% !important;">
                                <div class="img-box-a">
                                    <img src="<?= $proprtyImg ?>" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="#"><?= $res['location'] ?></a>
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
                        }
                        ?>
                    </div>
                </div>
                <div class="propery-carousel-pagination carousel-pagination mb-3"></div>

            </div>
        </section><!-- End Latest Properties Section -->

        <!-- ======= Testimonials Section ======= -->
        <section class="section-testimonials section-t3 nav-arrow-a">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Testimonials</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="testimonial-carousel" class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $qryTestimonials = mysqli_query($con, "SELECT * FROM `testimonials` ORDER BY id DESC");
                        if (mysqli_num_rows($qryTestimonials)) {
                            while ($resTestimonials = mysqli_fetch_assoc($qryTestimonials)) {
                        ?>
                        <div class="carousel-item-a swiper-slide">
                            <div class="testimonials-box">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="testimonial-img">
                                            <img src="uploadeImgs/<?= $resTestimonials['img'] ?>" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="testimonial-ico">
                                            <i class="bi bi-chat-quote-fill"></i>
                                        </div>
                                        <div class="testimonials-content">
                                            <p class="testimonial-text">
                                                <?= $resTestimonials['feedback'] ?>
                                            </p>
                                        </div>
                                        <div class="testimonial-author-box">
                                            <img src="uploadeImgs/<?= $resTestimonials['img'] ?>" alt=""
                                                class="testimonial-avatar">
                                            <h5 class="testimonial-author"><?= $resTestimonials['name'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End carousel item -->
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="testimonial-carousel-pagination carousel-pagination"></div>

            </div>
        </section>
        <!-- End Testimonials Section -->

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