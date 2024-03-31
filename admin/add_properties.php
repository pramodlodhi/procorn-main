<?php
$cpage = "addproperties";
$heading = "Add Properties";
include 'include/header.php';
// creating job id
$slcProperty_id = mysqli_query($con, "SELECT `property_id` FROM `propertydetails` ORDER BY `id` DESC LIMIT 1");
if (mysqli_num_rows($slcProperty_id) > 0) {
    $resProperty_id = mysqli_fetch_assoc($slcProperty_id);
    $property_id = $resProperty_id['property_id'] + 1;
} else {
    $property_id = "1101";
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
                                            placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Type<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="property_type"
                                            placeholder="Enter Proerty Type">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Status<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="property_Status"
                                            placeholder="Enter Status">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Area In Sq. Meter <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="area_in_meter"
                                            placeholder="Enter Area in meter">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Area In Sq. Feet<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="area_in_sqfeet"
                                            placeholder="Enter Area in feet">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Bed <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="beds" placeholder="Enter Bed">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Baths <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="baths"
                                            placeholder="Enter Baths">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Nos Garage <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="garage"
                                            placeholder="Enter Garage">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Cost <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="property_amount"
                                            placeholder="Enter Amount">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Cover Image <span
                                                class="text-info">Size(800*600px)</span><span
                                                class="text-danger"></span></label>
                                        <input type="file" class="form-control" accept="image/*"
                                            name="property_CoverImage" >
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-12">
                                        <label for="">Property Video <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" accept="video/mp4,video/x-m4v,video/*"
                                            name="property_video">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Property Map Location <span class="text-danger">(Paste Embaded
                                                Link Only)</span></label>
                                        <input type="text" class="form-control" name="property_map">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-12">
                                        <label for="">Properties Amenities<span class="text-danger"></span></label>
                                        <select class="js-example-basic-multiple " name="property_amenities[]"
                                            multiple="multiple" style="display:block;">
                                            <?php
                                            $amenities = mysqli_query($con, "SELECT * FROM `amenities` ORDER BY id DESC");
                                            if (mysqli_num_rows($amenities) > 0) {
                                                while ($resAmenities = mysqli_fetch_assoc($amenities)) {
                                            ?>
                                            <option value="<?= $resAmenities['name'] ?>"><?= $resAmenities['name'] ?>
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
                                        <textarea class="form-control" id="" rows="5" name="property_descp"></textarea>
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
                                            value="addPropertyDetails">Submit</button>
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