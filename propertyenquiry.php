<?php
include './include/head.php';
include './include/nav.php';

if (isset($_POST['submitBtn'])) {
    $property_id = "-";
    $name = $_POST['fname'] . " " . $_POST['Lname'];
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

?>
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Enquiry Now</h1>
                    <p>Kindly fill out the inquiry form below, and our team will promptly assist you with the information you need.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                </nav>
            </div>
        </div>
    </div>
    <section style="margin-top:50px !important; " style="border:2px solid black;  border-radius: 25px; ">
        <div class="south-search-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="advanced-search-form" style="margin-bottom: 100px;">
                            <!-- Search Title -->
                            <div class="msg_div"></div>
                            <!-- Search Form -->
                            <form method="POST" style="border:2px solid black; padding-top:20px; padding-left:50px; padding-right:38px; margin-bottom:10px; padding-bottom:42px;">
                                <div class="row" style="width: 100%">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Frist Name <span class="red-star">*</span></label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Frist Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Last Name<span class="red-star">*</span></label>
                                            <input type="text" class="form-control" name="Lname" id="fname" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label> Email<span class="red-star">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Enter Contact No.<span class="red-star">*</span></label>
                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No.">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Your City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 50px;">
                                            <label>Enquiry for<span class="red-star">*</span></label>
                                            <div class="input-group">
                                                <select class="form-control bg-white outline-none pr-5" name="enqFor">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text bg-white outline-none" style="position: absolute;
                                                               right: 10px;
                                                               top: 9px;
                                                                outline-color: white;
                                                                border: none;
                                                                padding: 0px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        .red-star {
                                            color: red
                                        }
                                    </style>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Quary<span class="red-star">*</span></label>

                                            <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message" required style="font-size:17px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mt-0">
                                    <button type="submit" class="btn btn-a" style="background-color:#c2943c; float:right;  border-radius:5px; margin-top: 56px;
    margin-right: -45px" name="submitBtn"><b>Submit</b></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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