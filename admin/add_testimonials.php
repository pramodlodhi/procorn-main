<?php
$cpage = "addtestimonial";
$heading = "Add Testimonial";
include 'include/header.php';
// select School Id
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .form-group label {
            font-weight: 500 !important;
        }

        .form-check input {
            width: 17px;
            height: 17px;
            margin-right: 20px;
        }

        .form-check {
            width: 20%;
        }

        .form-check label {
            margin-left: 10px;
            font-size: 1.1rem;
        }
    </style>
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
                    <form action="include/forms.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-info">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Client Img <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" accept="image/*" name="img" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Profession <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="profession" placeholder="Enter Profession">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Feedback<span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" name="feedback" placeholder="Type....." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-4 d-flex" style="margin: auto;">
                                        <a href="home_slider.php" class="btn btn-outline-secondary btn-md" style="color: black;margin-right:15px;">Back</a>
                                        <button type="submit" name="submit" class="btn btn-info btn-block" value="addTestimonial">Submit</button>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php include 'include/footer.php'; ?>

</body>

</html>