<?php

include './include/head.php';
$cpage = "jobopening";
if ($_GET['jobId']) {
    $jobId = $_GET['jobId'];
    $slcJob = mysqli_query($con, "SELECT `id` FROM `jobopenings` WHERE `jobId`='$jobId'");
    if (mysqli_num_rows($slcJob) <= 0) {
        header('location:jobopening.php');
    }
} else {
    header('location:jobopening.php');
}
function ImgExtension($img)
{
    $imageName = explode(".", $img);
    return end($imageName);
}
if (isset($_POST['submit'])) {

    $jobId = $_POST['jobId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $exprience = $_POST['exprience'];
    $qualific = $_POST['qualific'];
    $jobPosition = $_POST['jobPosition'];
    $ctc = $_POST['ctc'];
    $date = date('Ymd');
    // if ($_FILES['resume']['error'] == 0) {
    //     $img = $_FILES['resume']['name'];
    //     $tempName = $_FILES['resume']['tmp_name'];
    //     $path = "./uploadeImgs";
    //     $extension = ImgExtension($img);
    //     $resume = $firstName . date("dmYhis") . "." . $extension;
    //     $isUploadedImg = move_uploaded_file($tempName, "$path/$resume");
    // } else {
    //     $resume = "";
    // }

    // checking before inserting data 

    // $sqlData = mysqli_query($con, "SELECT `id` FROM `career` WHERE `jobId`='$jobId' AND (`email`='$email' OR `contact`= '$contact')");

    if ($_FILES['resume']['error'] != "4") {
        $respFile = uploadToS3Bucket($_FILES['resume']);
        $resume = $respFile['pathInS3'];
        $KeyName = $respFile['keyName'];
    } else {
        $resume = '';
        $KeyName = '';
    }


    $insert = "INSERT INTO `career`( `jobId`, `firstName`, `lastName`, `email`, `contact`, `city`, `exprience`, `qualific`, `jobPosition`, `ctc`, `resume`,`resumeKeyName`, `date`) VALUES ('$jobId','$firstName','$lastName','$email','$contact','$city','$exprience','$qualific','$jobPosition','$ctc','$resume','$KeyName','$date')";
    $qry = mysqli_query($con, $insert);
    if ($qry) {
        $_SESSION['mssg'] = "Your request has been submitted sucessfully";
        $_SESSION['class'] = "success";
        header('location:jobopening.php');
    } else {
        echo "<script> alert('Your Something Error please try again..') </script>";
    }
}

?>



<body>
    <!-- ======= Header/Navbar ======= -->
    <?php include './include/nav.php'; ?>
    <section class="intro-single mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Apply For Jobs</h1>
                        <p>Thank you for expressing interest in the exciting new job opening at Property Corner. We appreciate your eagerness to join our dynamic team. Please fill the below form and submit your request.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <section style="margin-top:22px;" style="border:2px solid black;">
        <div class="south-search-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="advanced-search-form" style="margin-bottom: 100px;">
                            <!-- Search Title -->
                            <div class="msg_div"></div>
                            <style>
                                .red-star {
                                    color: red;
                                }
                            </style>
                            <form method="post" style="border:2px solid black;  padding-left:20px; padding-right:18px; padding-top: 20px; " class="mb-2" enctype="multipart/form-data">
                                <div class="row" style="width: 100%">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <input type="hidden" name="jobId" value="<?= $_GET['jobId'] ?>">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Frist Name</label><span class="red-star">*</span>
                                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Frist Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Last Name</label><span class="red-star">*</span>
                                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label> Enter Email</label><span class="red-star">*</span>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label> Enter Contact No.</label><span class="red-star">*</span>
                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No.">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Enter Address</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 20px;">
                                            <label>Years of Experience</label><span class="red-star">*</span>
                                            <div class="input-group">
                                                <select class="form-control bg-none outline-none pr-5" name="exprience" id="work_ex2">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Less Than Year">Less Than Year</option>
                                                    <option value="1 year">1 year</option>
                                                    <option value="2 year">2 year</option>
                                                    <option value="3 year">3 year</option>
                                                    <option value="4 year">4 year</option>
                                                    <option value="5 year">5 year</option>
                                                    <option value="5+ year">5+ year</option>
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

                                    <!-- <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group"
                                            style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Years of Experience</label><span class="red-star">*</span>
                                            <select class="form-control" name="exprience" id="work_ex2">
                                                <option>Select</option>
                                                <option value="Less Than Year">Less Than Year</option>
                                                <option value="1 year">1 year</option>
                                                <option value="2 year">2 year</option>
                                                <option value="3 year">3 year</option>
                                                <option value="4 year">4 year</option>
                                                <option value="5 year">5 year</option>
                                                <option value="5+ year">5+ year</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-12 col-md-6 col-xl-6">
                                        <div class="form-group"
                                            style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Highest Qualification</label><span class="red-star">*</span>
                                            <select class="form-control" name="qualific" id="education">
                                                <option value=" ">Select</option>
                                                <option value="10th">10th</option>
                                                <option value="12th">12th</option>
                                                <option value="Graduate">Graduate</option>
                                                <option value="Post Graduate">Post graduate</option>
                                                <option value="Others">Others</option>
                                            </select>

                                        </div>
                                    </div> -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Highest Qualification</label><span class="red-star">*</span>
                                            <div class="input-group">
                                                <select class="form-control bg-none outline-none pr-5" name="qualific" id="education">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="10th">10th</option>
                                                    <option value="12th">12th</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Post Graduate">Post graduate</option>
                                                    <option value="Others">Others</option>
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

                                    <!-- <div class="col-12 col-md-6 col-xl-6">
                                        <div class="form-group"
                                            style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Job Position</label><span class="red-star">*</span>
                                            <select class="form-control" name="jobPosition" id="job_position">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-down-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                </svg>
                                                <option value="Job Position">Select</option>
                                                <option value="UI/UX Developer">UI/UX Developer</option>
                                                <option value="Backend Developer">Backend Developer</option>
                                                <option value="">Android Developer</option>
                                                <option value="">Flutter Developer</option>
                                                <option value="">Full Stack Developer</option>
                                                <option value="">Business Development</option>
                                            </select>
                                            <div class="input-group-append">
                                                    <div class="input-group-text bg-white outline-white " style="position: absolute;
                                                               right: 10px;
                                                               top: 9px;
                                                                outline-color: white;
                                                                border: none;
                                                                padding: 1px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-caret-down-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                        </div>
                                    </div> -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Job Position</label><span class="red-star">*</span>
                                            <div class="input-group">
                                                <select class="form-control bg-none outline-none pr-5" name="jobPosition" id="job_position">
                                                    <option value="" disabled selected>Select </option>
                                                    <option value="UI/UX Developer">UI/UX Developer</option>
                                                    <option value="Backend Developer">Backend Developer</option>
                                                    <option value="Android Developer">Android Developer</option>
                                                    <option value="Flutter Developer">Flutter Developer</option>
                                                    <option value="Full Stack Developer">Full Stack Developer</option>
                                                    <option value="Business Development">Business Development</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text bg-white outline-white " style="position: absolute;
                                                               right: 10px;
                                                               top: 9px;
                                                                outline-color: white;
                                                                border: none;
                                                                padding: 0px;
                                                                background-color:white;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px; padding-bottom: 60px;">
                                            <label>Expected CTC</label>
                                            <input type="text" class="form-control" name="ctc" id="salary" placeholder="Expected CTC">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="form-group" style="margin-bottom: 30px; height: 38px;">
                                            <label>Upload Resume</label><span class="red-star">*</span>
                                            <input type="file" class="form-control" name="resume" accept=".pdf" id="document" required>
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="col-12 d-flex justify-content-between align-items-end " style="width:15%; float:right;">
                                    More Filter -->
                                <!-- <div class="more-filter"> -->
                                <!-- </div> -->
                                <!-- Submit -->
                                <!-- <div class="form-group mb-1 mt-3 w-100"> -->
                                <!-- <button type="submit" class="btn south-btn carrer_aply_btn " name="submit" id="colordiv " style="background-color: #2eca6a; -->
                                <!-- padding: 9px; color:white; width:100%; font-size:18px;"><b>Apply Now</b></button> -->
                                <!-- </div> -->
                                <!-- </div> -->
                                <div class="col-md-12 mt-5">
                                    <button type="submit" class="btn south-btn carrer_aply_btn " name="submit" id="colordiv " style="background-color: #c2943c;
                                    padding: 9px; color:white; float:right; font-size:18px; margin-top:10px;"><b>Apply
                                            Now</b></button>
                                </div>
                            </form>
                            <style>
                                #colordiv:hover {
                                    cursor: pointer;
                                    color: black !important;
                                }
                            </style>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =======Team Section ======= -->


    <!-- </main> -->

    <!-- ======= Footer ======= -->

    <?php include './include/foter.php'; ?>
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