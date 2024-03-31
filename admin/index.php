<?php
$cpage = "index";
include 'include/header.php';
$qryContactNum = mysqli_query($con, "SELECT `id` FROM `contactus`");
$ContactNum  = mysqli_num_rows($qryContactNum);

$qryPropertyContactNum = mysqli_query($con, "SELECT `id` FROM `property_enq`");
$PropertyContactNum  = mysqli_num_rows($qryPropertyContactNum);

$TodatDate = date('d-m-Y');
$qryTodayPropertyContactNum = mysqli_query($con, "SELECT `id` FROM `property_enq` WHERE `date`='$TodatDate'");
$TodayPropertyContactNum  = mysqli_num_rows($qryTodayPropertyContactNum);

$qryJubReqNum = mysqli_query($con, "SELECT `id` FROM `career`");
$JubReqNum  = mysqli_num_rows($qryJubReqNum);

$qryPropertiesNum = mysqli_query($con, "SELECT `id` FROM `propertydetails`");
$PropertiesNum  = mysqli_num_rows($qryPropertiesNum);
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        $cpage = "index";
        include 'include/nav.php';
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $ContactNum ?></h3>
                                    <p>Total Contacts</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-headset"></i>
                                </div>
                                <a href="contact_request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $PropertyContactNum ?></h3>
                                    <p>Total Property Enquiry</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-headset"></i>
                                </div>
                                <a href="property_enquiry.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= $TodayPropertyContactNum ?></h3>
                                    <p>Today Property Enquiry</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-headset"></i>
                                </div>
                                <a href="property_enquiry.php?date=<?= date('d-m-Y') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $JubReqNum ?></h3>
                                    <p>Total Job Request</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                </div>
                                <a href="career.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $PropertiesNum ?></h3>
                                    <p>All Properties</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-building-columns"></i>
                                </div>
                                <a href="properties.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>




                    </div>

                </div>
            </section>
        </div>
        <?php include 'include/footer.php'; ?>
</body>

</html>