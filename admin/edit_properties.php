<?php
$cpage = "addproperties";
$heading = "Update Properties";
include 'include/header.php';
if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    $qryProp = mysqli_query($con, "SELECT * FROM `propertydetails` WHERE `property_id`='$property_id'");
    if (mysqli_num_rows($qryProp) > 0) {
        $res = mysqli_fetch_assoc($qryProp);
    } else {
        header('location:properties.php');
    }
} else {
    header('location:properties.php');
}
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

    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #1a1616 !important;

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
                                        <label for="">Property Id <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="property_id"
                                            value="<?= $property_id ?>" placeholder="Auto Generated" readonly>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Location<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="location"
                                            value="<?= $res['location'] ?>" placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Type<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="property_type"
                                            value="<?= $res['property_type'] ?>" placeholder="Enter Proerty Type">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Status<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="property_Status"
                                            value="<?= $res['property_Status'] ?>" placeholder="Enter Status">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Area In Sq. Meter<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="area_in_meter"
                                            value="<?= $res['area_in_meter'] ?>" placeholder="Enter Area in meter">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Area In Sq. Feet<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="area_in_sqfeet"
                                            value="<?= $res['area_in_sqfeet'] ?>" placeholder="Enter Area in feet">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Bed <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="beds"
                                            value="<?= $res['beds'] ?>" placeholder="Enter Bed">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Baths <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="baths"
                                            value="<?= $res['property_Status'] ?>" placeholder="Enter Baths">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Garage <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="garage"
                                            value="<?= $res['garage'] ?>" placeholder="Enter Garage">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Cost <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="property_amount"
                                            value="<?= $res['property_amount'] ?>" placeholder="Enter Amount">
                                    </div>

                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Cover Image <span
                                                class="text-info">Size(800*600px)</span> <span
                                                class="text-danger"></span></label>
                                        <input type="file" class="form-control" accept="image/*"
                                            name="property_CoverImage">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Video <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" accept="video/*" name="property_video">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Property Map Location <span class="text-danger">(Paste Embaded
                                                Link Only)</span></label>
                                        <input type="text" class="form-control" name="property_map"
                                            value="<?= $res['property_map'] ?>">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Properties Amenities<span class="text-danger"></span></label>
                                        <select class="js-example-basic-multiple " name="property_amenities[]"
                                            multiple="multiple" style="display:block;">
                                            <?php
                                            $AssignedAmenites = array();
                                            $proAamenities = mysqli_query($con, "SELECT * FROM `property_amenities` WHERE `property_id`='$property_id'");
                                            while ($selectedAmenities =  mysqli_fetch_assoc($proAamenities)) {
                                                $amenities_name =  $selectedAmenities['amenities_name'];
                                                array_push($AssignedAmenites, $amenities_name);
                                            }
                                            $amenities = mysqli_query($con, "SELECT * FROM `amenities` ORDER BY id DESC");
                                            if (mysqli_num_rows($amenities) > 0) {
                                                while ($resAmenities = mysqli_fetch_assoc($amenities)) {
                                            ?>
                                            <option value="<?= $resAmenities['name'] ?>"
                                                <?php if (in_array($resAmenities['name'], $AssignedAmenites)) echo "selected";  ?>>
                                                <?= $resAmenities['name'] ?>
                                            </option>
                                            <?php
                                                }
                                            } else {
                                                ?>
                                            <option value="" disabled class="text-danger">No Amenities Added</option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Properties Descp<span class="text-danger"></span></label>
                                        <textarea class="form-control" id="" rows="8"
                                            name="property_descp"><?= $res['property_descp'] ?></textarea>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Properties Files<span class="text-danger"></span></label>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <a href="<?= $res['property_CoverImage'] ?>" target="_blank"><img
                                                        src="../uploadeImgs/<?= $res['property_CoverImage'] ?>" alt=""
                                                        style="width:100%;"></a>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12"
                                                style="display: flex; align-items: center; justify-content: center; border: 1px solid black;">
                                                <?php
                                                if ($res['property_video'] != "") { ?>
                                                <video width="100%" controls>
                                                    <source src="../uploadeImgs/<?= $res['property_video'] ?>"
                                                        type="video/mp4">
                                                </video>
                                                <?php } else {
                                                    echo '<span class="text-danger text-center">No Property Video uploaded</span>';
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-4 d-flex" style="margin: auto;">
                                        <a href="properties.php" class="btn btn-outline-secondary btn-md"
                                            style="color: black;margin-right:15px;">Back</a>
                                        <button type="submit" name="submit" class="btn btn-info btn-block"
                                            value="UpdatePropertyDetails">Submit</button>
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