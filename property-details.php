<?php include './include/head.php';
$cpage = "property-grid";
if (isset($_POST['submitBtn'])) {
    $property_id = $_POST['property_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $enqFor = $_POST['enqFor'];
    $message = $_POST['message'];
    $date = date('d-m-Y');
    $insert = "INSERT INTO `property_enq`(`property_id`, `name`, `contact`, `email`, `message`, `date`,`city`,`enqFor`) VALUES ('$property_id','$name','$contact','$email','$message','$date','$city','$enqFor')";
    // die();
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo "<script>alert('Your request has been submitted successfully');</script>";
    } else {
        echo "<script>alert('Opps something error please try again');</script>";
    }
}

if (!isset($_GET['property_id'])) {
    header('location:property-grid.php');
}
$property_id = $_GET['property_id'];
$slcProp = mysqli_query($con, "SELECT * FROM `propertydetails` WHERE `property_id`='$property_id'");
if (mysqli_num_rows($slcProp) <= 0) {
    header('location:property-grid.php');
} else {
    $res = mysqli_fetch_assoc($slcProp);
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

<body>
    <!-- ======= Header/Navbar ======= -->
    <?php include './include/nav.php';  ?>

    <main id="main">
        <style>
        /* slick Slider */
        .action {
            display: block;
            margin: 100px auto;
            width: 100%;
            text-align: center;
        }

        .action a {
            display: inline-block;
            padding: 5px 10px;
            background: #f30;
            color: #fff;
            text-decoration: none;
        }

        .action a:hover {
            background: #000;
        }

        /* image Model */
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1233;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            color: #fff !important;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
        </style>
        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single"><?= $res['property_id'] ?></h1>
                            <!-- <h1 class="title-single">304 Blaster Up</h1> -->
                            <span class="color-text-a"><?= $res['location'] ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="property-grid.html">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $res['property_id'] ?>
                </li>
              </ol> -->
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-10 ">
                        <div class="main">
                            <div class="slider slider-for">
                                <?php
                                $slect_gallery = "SELECT * FROM `property_galllery` WHERE `property_id`='$property_id' ORDER BY id DESC";
                                $query_gallery = mysqli_query($con, $slect_gallery);
                                if (mysqli_num_rows($query_gallery) > 0) {
                                    while ($resGallery = mysqli_fetch_assoc($query_gallery)) {
                                ?>
                                <div>
                                    <img src="./uploadeImgs/<?= $resGallery['property_img'] ?>" alt=""
                                        style="width:100%;">
                                </div>
                                <?php }
                                } else {
                                    ?>
                                <div>
                                    <img src="uploadeImgs/dummyHome.png" alt="" style="width:100%;">
                                </div>
                                <?php
                                } ?>
                            </div>
                            <div class="slider slider-nav">
                                <?php
                                while ($resGallery = mysqli_fetch_assoc($query_gallery)) {
                                ?>
                                <div>
                                    <img src="./uploadeImgs/<?= $resGallery['property_img'] ?>" alt="" style="width">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="row justify-content-between">
                            <div class="col-md-5 col-lg-4">
                                <div class="property-price d-flex justify-content-center foo"
                                    style="margin-left:-47px;">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico" style="margin-left:-218px;">
                                            <span class=""> &#8377;</span>
                                        </div>
                                        <div class="card-title-c align-self-center">
                                            <h5 class="title-c"> <?= $res['property_amount'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-summary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d">Quick Summary</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-list">
                                        <ul class="list">
                                            <li class="d-flex justify-content-between">
                                                <strong>Property ID:</strong>
                                                <span> <?= $res['property_id'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Location:</strong>
                                                <span> <?= $res['location'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Property Type:</strong>
                                                <span> <?= $res['property_type'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Status:</strong>
                                                <span> <?= $res['property_Status'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Area:</strong>
                                                <div class="">
                                                    <span> <?= $res['area_in_meter'] ?>m
                                                        <sup>2</sup>
                                                    </span>
                                                    <br>
                                                    <span> <?= $res['area_in_sqfeet'] ?>sf
                                                        <sup>2</sup>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Beds:</strong>
                                                <span> <?= $res['beds'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Baths:</strong>
                                                <span> <?= $res['baths'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Garage:</strong>
                                                <span> <?= $res['garage'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 section-md-t3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Property Description</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-description">
                                    <p class="description color-text-a"> <?= $res['property_descp'] ?></p>
                                </div>
                                <div class="row section-t3">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Amenities</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="amenities-list color-text-a">
                                    <ul class="list-a no-margin">
                                        <?php
                                        $qryAmenities = mysqli_query($con, "SELECT * FROM `property_amenities` WHERE `property_id`='$property_id'");
                                        if (mysqli_num_rows($qryAmenities)) {
                                            while ($resAmenities = mysqli_fetch_assoc($qryAmenities)) { ?>
                                        <li><?= $resAmenities['amenities_name'] ?></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                            <?php if ($res['property_video'] != "") { ?>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill"
                                    href="#pills-video" role="tab" aria-controls="pills-video"
                                    aria-selected="true">Video</a>
                            </li>
                            <?php  } else {
                                $activeLink = "active";
                            } ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $activeLink ?>" id="pills-plans-tab" data-bs-toggle="pill"
                                    href="#pills-plans" role="tab" aria-controls="pills-plans"
                                    aria-selected="false">Gallery</a>
                                <button id="myImg" class="nav-link mt-3"
                                    style="background-color:#c2943c; color:white;">View Gallery</button>
                            </li>
                            <?php if ($res['property_map'] != "") { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map"
                                    role="tab" aria-controls="pills-map" aria-selected="false">Location</a>
                            </li>
                            <?php     } ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <?php $active = "";
                            if ($res['property_video'] != "") { ?>
                            <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                                aria-labelledby="pills-video-tab">
                                <iframe src="./uploadeImgs/<?= $res['property_video'] ?>" width="100%" height="460"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <?php } else {
                                $active = "show active";
                            } ?>
                            <div class="tab-pane fade <?= $active ?>" id="pills-plans" role="tabpanel"
                                aria-labelledby="pills-plans-tab">
                                <?php
                                $slect_gallery = "SELECT * FROM `property_galllery` WHERE `property_id`='$property_id' ORDER BY id DESC";
                                $query_gallery = mysqli_query($con, $slect_gallery);
                                if (mysqli_num_rows($query_gallery) > 0) {
                                    $resGallery = mysqli_fetch_assoc($query_gallery);
                                    $galleryImg = "./uploadeImgs/" . $resGallery['property_img'];
                                } else {
                                    $galleryImg = "./uploadeImgs/dummyHome.png";
                                }
                                ?>
                                <img src="<?= $galleryImg ?>" alt="" class="img-fluid" id="myImg">
                            </div>
                            <?php if ($res['property_map'] != "") { ?>
                            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                                <iframe src="<?= $res['property_map'] ?>" width="100%" height="460" frameborder="0"
                                    style="border:0" allowfullscreen></iframe>
                            </div>
                            <?php     } ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row section-t3">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">Contact Agent / Enquiry</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-6 col-lg-4">
                                <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
                            </div> -->
                            <div class="col-md-6 col-lg-4 col-12">
                                <div class="property-agent">
                                    <!-- <h4 class="title-agent">Anabella Geller</h4>
                                    <p class="color-text-a">
                                        Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet
                                        dui. Quisque velit nisi,
                                        pretium ut lacinia in, elementum id enim.
                                    </p> -->
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Whatsapp</strong>
                                            <span class="color-text-a"><a href="tel:+919406736808" target="_blank"
                                                    rel="noopener noreferrer">+91 9406736808</a></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Mobile:</strong>
                                            <span class="color-text-a"><a href="tel:+919406736808" target="_blank"
                                                    rel="noopener noreferrer">+91 9406736808</a></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a"><a href="mailto:contact@propcorn.co.in"
                                                    target="_blank"
                                                    rel="noopener noreferrer">contact@propcorn.co.in</a></span>
                                        </li>

                                    </ul>
                                    <div class="socials-a">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="https://www.facebook.com/propcorn.real.estate?mibextid=9R9pXO"
                                                    target="_blank">
                                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="https://x.com/PropCornRE?t=l9IbHgzeSZKCgoNp1jf1sg&s=08"
                                                    target="_blank">
                                                    <i class="bi bi-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="https://www.instagram.com/propcorn.co.in " target="_blank">
                                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="https://www.linkedin.com/in/sandeep-raj-toriya-863079247/"
                                                    target="_blank">
                                                    <i class="bi bi-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 col-lg-8">
                                <div class="property-contact">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-6 col-12 col-lg-6 mb-1">
                                                <input type="hidden" name="property_id" value="<?= $property_id ?>">
                                                <input type="hidden" name="enqFor" value="-">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-a" name="name"
                                                        placeholder="Name *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-6 mb-1">
                                                <div class="form-group">
                                                    <input type="number"
                                                        class="form-control form-control-lg form-control-a"
                                                        name="contact" placeholder="Contact *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-6 mb-1">
                                                <div class="form-group">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-a" name="email"
                                                        placeholder="Email *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-6 mb-1">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-a" name="city"
                                                        placeholder="City *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <textarea id="textMessage" class="form-control"
                                                        placeholder="Comment *" name="message" cols="5" rows="3"
                                                        required style="font-size:20px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-a" name="submitBtn"
                                                    style="background-color:#c2943c; float:right; border-radius:5px;"><b>Send
                                                        Enquiry</b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Property Single-->

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <div class="row" style="justify-content: center;">
                <?php
                $slect_gallery = "SELECT * FROM `property_galllery` WHERE `property_id`='$property_id' ORDER BY id DESC";
                $query_gallery = mysqli_query($con, $slect_gallery);
                if (mysqli_num_rows($query_gallery) > 0) {
                    while ($resGallery = mysqli_fetch_assoc($query_gallery)) {
                ?>
                <div class="col-lg-10 col-md-12 col-12 mb-3">
                    <img class="modal-content" src="./uploadeImgs/<?= $resGallery['property_img'] ?>" id="">
                </div>
                <?php
                    }
                } else {
                    ?>
                <div class="col-lg-10 col-md-12 col-12">
                    <img class="modal-content" id="img01">
                </div>
                <?php
                }
                ?>

            </div>
            <div id="caption"></div>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include './include/foter.php' ?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- slick slider -->
<script>
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    focusOnSelect: true
});

$('a[data-slide]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav').slick('slickGoTo', slideno - 1);
});
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    modal.style.display = "none";
}
</script>


</html>