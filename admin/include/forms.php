<?php
include './connection.php';
// include './aws.php';
$date = date('d-m-Y');

// function FileUpload($Image)
// {
//     $respFile = uploadToS3Bucket($Image);
//     if ($respFile['isUploaded'] == true) {
//         $FileLink = $respFile['pathInS3'];
//         $deleteFile = $respFile['keyName'];
//         return $FileLink;
//     } else {
//         return "error";
//     }
// }


function Query($con, $qry)
{
    $query = mysqli_query($con, $qry);
    return $query;
}
function ImgExtension($img)
{
    $imageName = explode(".", $img);
    return end($imageName);
}
function replaceSpace($FileName)
{
    return str_replace(" ", "_", $FileName);
}

if (isset($_POST['submit'])) {
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'addHomeSlider' || $_POST['submit'] === 'UpdateHomeSlider') {
        $btnText = $_POST['btnText'];
        $btnLink = $_POST['btnLink'];
        $sliderText = $_POST['sliderText'];

        if ($_FILES['sliderImg']['error'] == 0) {
            $img = $_FILES['sliderImg']['name'];
            $tempName = $_FILES['sliderImg']['tmp_name'];
            $path = "../../uploadeImgs";
            $extension = ImgExtension($img);
            $sliderImg = "sliderImg" . date("dmYhis") . "." . $extension;
            $isUploadedImg = move_uploaded_file($tempName, "$path/$sliderImg");
        } else {
            $sliderImg = "";
        }
        // die();
        // update Query
        if ($_POST['submit'] === 'UpdateHomeSlider') {
            $id = $_POST['id'];
            if ($sliderImg == "") {
                $slect = "SELECT `sliderImg`,`deleteSliderLink` FROM `sliders` WHERE `id`=$id";
                $querySlc = mysqli_query($con, $slect);
                $respSlider = mysqli_fetch_assoc($querySlc);
                $sliderImg = $respSlider['sliderImg'];
            }

            $update = "UPDATE `sliders` SET `sliderImg`='$sliderImg',`deleteSliderLink`='$keyName',`btnText`='$btnText',`btnLink`='$btnLink',`sliderText`='$sliderText',`date`='$date' WHERE `id`=$id";
            $query = Query($con, $update);
            if ($query) {
                $mssg = "Slider Updated successfully";
                $class = "success";
            } else {
                $mssg = "Error while uploading";
                $class = "danger";
            }
        } else {
            // Insert query
            $insert = "INSERT INTO `sliders`(`sliderImg`,`deleteSliderLink`,`btnText`, `btnLink`, `sliderText`, `date`) VALUES ('$sliderImg','$keyName','$btnText','$btnLink','$sliderText','$date')";
            $query = Query($con, $insert);
            if ($query) {
                $mssg = "Slider added successfully";
                $class = "success";
            } else {
                $mssg = "Error while uploading";
                $class = "danger";
            }
        }

        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../home_slider.php');
    }
    // Delete Slider+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteSlider') {
        $id = $_POST['deleteId'];
        // unlink uploaded image
        $slcImg = mysqli_query($con, "SELECT `sliderImg`,`deleteSliderLink` FROM `sliders` WHERE id= $id");
        $resImg = mysqli_fetch_assoc($slcImg);
        $path = "../../uploadeImgs";
        $image = $path . "/" . $resImg['sliderImg'];
        if (file_exists($image)) {
            unlink($image);
        }
        // delete image form s3 bucket
        if ($resImg['deleteSliderLink'] != "") {
            delteFromS3($resImg['deleteSliderLink']);
        }

        $delete = mysqli_query($con, "DELETE FROM `sliders` WHERE `id`=$id");
        if ($delete) {
            $mssg = "Slider deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../home_slider.php');
    }
    // Testimonial+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'addTestimonial') {
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $feedback = $_POST['feedback'];


        if ($_FILES['img']['error'] == 0) {
            $img = $_FILES['img']['name'];
            $tempName = $_FILES['img']['tmp_name'];
            $path = "../../uploadeImgs";
            $extension = ImgExtension($img);
            $imgName = replaceSpace($name) . date("dmYhis") . "." . $extension;
            $isUploadedImg = move_uploaded_file($tempName, "$path/$imgName");
        }

        $insert = "INSERT INTO `testimonials`(`name`, `profession`, `img`, `feedback`, `date`) VALUES ('$name','$profession','$imgName','$feedback','$date')";
        $query = Query($con, $insert);

        if ($query) {
            $mssg = "Testimonial added successfully";
            $class = "success";
        } else {
            $mssg = "Error while uploading";
            $class = "danger";
        }
        header('location:../testimonials.php');
    }
    // Delete Testimonials ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteTestimonial') {
        $id = $_POST['deleteId'];
        $slcImg = mysqli_query($con, "SELECT `img` FROM `testimonials` WHERE id= $id");
        $resImg = mysqli_fetch_assoc($slcImg);
        $path = "../../uploadeImgs";
        $image = $path . "/" . $resImg['img'];
        if (file_exists($image)) {
            unlink($image);
        }

        // delete image form s3 bucket
        if ($resImg['keyName'] != "") {
            delteFromS3($resImg['keyName']);
        }

        $delete = mysqli_query($con, "DELETE FROM `testimonials` WHERE `id`= $id");
        if ($delete) {
            $mssg = "Testimonial deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../testimonials.php');
    }
    // TermsConditions ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'TermsConditions') {
        $content =  $_POST['content'];
        $id =  $_POST['id'];
        $update = mysqli_query($con, "UPDATE `termsconditions` SET `content`='$content' WHERE `id`= $id");
        if ($update) {
            $mssg = "Terms Conditions Updated successfully";
            $class = "success";
        } else {
            $mssg = "Error while Updating";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../terms_conditions.php');
    }
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'addJobOpening' || $_POST['submit'] === 'UpdateJobOpening') {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die();
        $jobId = $_POST['jobId'];
        $jobTitle = $_POST['jobTitle'];
        $jobLocation = $_POST['jobLocation'];
        $jobType = $_POST['jobType'];
        $salary = $_POST['salary'];
        $status = $_POST['status'];
        $lastDate = $_POST['lastDate'];
        if ($_POST['submit'] === 'addJobOpening') {
            // creating job id
            $slcJobId = mysqli_query($con, "SELECT `jobId` FROM `jobopenings` ORDER BY `id` DESC LIMIT 1");
            if (mysqli_num_rows($slcJobId) > 0) {
                $resJobId = mysqli_fetch_assoc($slcJobId);
                $explode =  explode("J", $resJobId['jobId']);
                $lastJobId = end($explode) + 1;
                $jobId = "J" . sprintf('%03d', $lastJobId);
            } else {
                $jobId = "J001";
            }
            $insert = "INSERT INTO `jobopenings`(`jobId`, `jobTitle`, `jobLocation`, `jobType`, `salary`, `status`, `lastDate`, `date`) VALUES ('$jobId','$jobTitle','$jobLocation','$jobType','$salary','$status','$lastDate','$date')";
            $query = Query($con, $insert);
            if ($query) {
                $mssg = "Job opening added successfully";
                $class = "success";
            } else {
                $mssg = "Error while adding";
                $class = "danger";
            }
        } else {
            $update = "UPDATE `jobopenings` SET `jobTitle`='$jobTitle',`jobLocation`='$jobLocation',`jobType`='$jobType',`salary`='$salary',`status`='$status',`lastDate`='$lastDate' WHERE `jobId`='$jobId'";
            $query = Query($con, $update);
            if ($query) {
                $mssg = "Job opening Updated successfully";
                $class = "success";
            } else {
                $mssg = "Error while updating";
                $class = "danger";
            }
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../job_openings.php');
    }
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteJobId') {
        $id =   $_POST['deleteId'];
        $delete = mysqli_query($con, "DELETE FROM `jobopenings` WHERE `id`= $id");
        if ($delete) {
            $mssg = "Job Openings deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../job_openings.php');
    }
    // delete Career
    if ($_POST['submit'] === 'DeleteCareerReq') {
        $id =   $_POST['deleteId'];

        $slcImg = mysqli_query($con, "SELECT `firstName`,`resume`,`resumeKeyName` FROM `career` WHERE id = $id");
        // $resImg = mysqli_fetch_assoc($slcImg);
        $path = "../../uploadeImgs";
        $image = $path . "/" . $resImg['resume'];
        if (file_exists($image)) {
            unlink($image);
        }
        // delete file from s3 bucket
        if ($resImg['resumeKeyName'] != "") {
            delteFromS3($resImg['resumeKeyName']);
        }

        $delete = mysqli_query($con, "DELETE FROM `career` WHERE `id`= $id");
        if ($delete) {
            $mssg = $resImg['firstName'] . "deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../career.php');
    }
    // delete DeleteContectReq +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteContectReq') {
        $id =   $_POST['deleteId'];



        $delete = mysqli_query($con, "DELETE FROM `contactus` WHERE `id`= $id");
        if ($delete) {
            $mssg = "deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../contact_request.php');
    }
    // Amenities +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] == 'AddAmenities') {
        $name = $_POST['name'];
        $qry = mysqli_query($con, "INSERT INTO `amenities`(`name`) VALUES ('$name')");
        if ($qry) {
            $mssg = $name . "Added successfully";
            $class = "success";
        } else {
            $mssg = "Error while Adding";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../amenities.php');
    }
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteAmenities') {
        $id =   $_POST['deleteId'];
        $delete = mysqli_query($con, "DELETE FROM `amenities` WHERE `id`= $id");
        if ($delete) {
            $mssg = "deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../amenities.php');
    }
    // add property +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'addPropertyDetails' || $_POST['submit'] === 'UpdatePropertyDetails') {
        $property_id = $_POST['property_id'];
        $location = $_POST['location'];
        $property_type = $_POST['property_type'];
        $property_Status = $_POST['property_Status'];
        $area_in_meter = $_POST['area_in_meter'];
        $area_in_sqfeet = $_POST['area_in_sqfeet'];
        $beds = $_POST['beds'];
        $baths = $_POST['baths'];
        $garage = $_POST['garage'];
        $property_amount = $_POST['property_amount'];
        $property_map = $_POST['property_map'];
        $property_descp = $_POST['property_descp'];
        $property_amenities = $_POST['property_amenities'];

        // uploading Video
        if ($_FILES['property_video']['error'] != 4) {
            $img = $_FILES['property_video']['name'];
            $tempName = $_FILES['property_video']['tmp_name'];
            $path = "../../uploadeImgs";
            $extension = ImgExtension($img);
            $property_video = "video" . date("dmYhis") . "." . $extension;
            $isUploadedImg = move_uploaded_file($tempName, "$path/$property_video");
        } else {
            $property_video = "";
        }

        if ($_FILES['property_CoverImage']['error'] != "4") {

            $img = $_FILES['property_CoverImage']['name'];
            $tempName = $_FILES['property_CoverImage']['tmp_name'];
            $path = "../../uploadeImgs";
            $extension = ImgExtension($img);
            $property_CoverImage = "coverProperty" . date("dmYhis") . "." . $extension;
            $isUploadedImg = move_uploaded_file($tempName, "$path/$property_CoverImage");
        } else {
            $property_CoverImage = "";
        }
        //addPropertyDetails +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        if ($_POST['submit'] === 'addPropertyDetails') {
            // creating Property id
            $slcProperty_id = mysqli_query($con, "SELECT `property_id` FROM `propertydetails` ORDER BY `id` DESC LIMIT 1");
            if (mysqli_num_rows($slcProperty_id) > 0) {
                $resProperty_id = mysqli_fetch_assoc($slcProperty_id);
                $property_id = $resProperty_id['property_id'] + 1;
            } else {
                $property_id = "1101";
            }
            $insert = "INSERT INTO `propertydetails`(`property_id`, `location`, `property_type`, `property_Status`, `area_in_meter`, `area_in_sqfeet`, `beds`, `baths`, `garage`, `property_descp`, `property_amount`, `property_video`, `property_map`,`property_CoverImage`) VALUES ('$property_id','$location','$property_type','$property_Status','$area_in_meter','$area_in_sqfeet','$beds','$baths','$garage','$property_descp','$property_amount','$property_video','$property_map','$property_CoverImage')";
            $qry = Query($con, $insert);
            if ($qry) {
                foreach ($property_amenities as  $value) {
                    mysqli_query($con, "INSERT INTO `property_amenities`(`property_id`, `amenities_name`) VALUES ('$property_id','$value')");
                }
                $mssg = "Property Added successfully";
                $class = "success";
            } else {
                $mssg = "Error while Adding";
                $class = "danger";
            }
        } else {
            // property video  UpdatePropertyDetails  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $propVideo = mysqli_query($con, "SELECT `property_video`,`property_CoverImage` FROM `propertydetails` WHERE `property_id`='$property_id'");
            $resVideo = mysqli_fetch_assoc($propVideo);
            if ($_FILES['property_video']['error'] == 4) {
                $property_video = $resVideo['property_video'];
            } else {
                $path = "../../uploadeImgs";
                $image = $path . "/" . $resVideo['property_video'];
                if (file_exists($image)) {
                    unlink($image);
                }
            }
            if ($_FILES['property_CoverImage']['error'] == 4) {
                $property_CoverImage = $resVideo['property_CoverImage'];
            } else {
                $path = "../../uploadeImgs";
                $image = $path . "/" . $resVideo['property_CoverImage'];
                if (file_exists($image)) {
                    unlink($image);
                }
            }
            $update = "UPDATE `propertydetails` SET `location`='$location',`property_type`='$property_type',`property_Status`='$property_Status',`area_in_meter`='$area_in_meter',`area_in_sqfeet`='$area_in_sqfeet',`beds`='$beds',`baths`='$baths',`garage`='$garage',`property_descp`='$property_descp',`property_amount`='$property_amount',`property_video`='$property_video',`property_map`='$property_map',`property_CoverImage`='$property_CoverImage' WHERE `property_id`= '$property_id'";
            $qry = Query($con, $update);
            if ($qry) {
                // inserting amenities 
                $amenities = mysqli_query($con, "SELECT `id` FROM `property_amenities` WHERE `property_id`='$property_id'");
                if (mysqli_num_rows($amenities) > 0) {
                    $delete_amenities = mysqli_query($con, "DELETE FROM `property_amenities` WHERE `property_id`='$property_id'");
                }
                foreach ($property_amenities as  $value) {
                    echo  $value;
                    mysqli_query($con, "INSERT INTO `property_amenities`(`property_id`, `amenities_name`) VALUES ('$property_id','$value')");
                }
                $mssg = "Property Updated successfully";
                $class = "success";
            } else {
                $mssg = "Error while Updating";
                $class = "danger";
            }
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../properties.php');
    }
    // Delete property  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeleteProperty') {
        $id =   $_POST['deleteId'];
        $propVideo = mysqli_query($con, "SELECT `coverImgKeyName`,`videoKeyName` FROM `propertydetails` WHERE `property_id`='$id'");
        // $resVideo = mysqli_fetch_assoc($propVideo);

        if ($resVideo['coverImgKeyName'] != "") {
            delteFromS3($resVideo['coverImgKeyName']);
        }

        if ($resVideo['videoKeyName'] != "") {
            delteFromS3($resVideo['videoKeyName']);
        }

        $delete = mysqli_query($con, "DELETE FROM `propertydetails` WHERE `property_id`= $id");
        if ($delete) {
            $mssg = "Property id $id deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting Property id $id ";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../properties.php');
    }
    // AddPropertyGallery +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'AddPropertyGallery') {

        $property_id = $_POST['property_id'];
        $date = date('d-m-Y');


        $property_id = $_POST['property_id'];
        $date = date('d-m-Y');
        if ($_FILES['property_img']['error'] == 0) {
            $img = $_FILES['property_img']['name'];
            $tempName = $_FILES['property_img']['tmp_name'];
            $path = "../../uploadeImgs";
            $extension = ImgExtension($img);
            $property_img = $property_id . "_" . date("dmYhis") . "." . $extension;
            $isUploadedImg = move_uploaded_file($tempName, "$path/$property_img");
            if ($isUploadedImg) {
                $insert = "INSERT INTO `property_galllery`(`property_id`, `property_img`, `date`) VALUES ('$property_id','$property_img','$date')";
                $query = Query($con, $insert);
                if ($query) {
                    $mssg = "$property_id Image Added successfully";
                    $class = "success";
                } else {
                    $mssg = "Error while Adding $property_id Image ";
                    $class = "danger";
                }
            } else {
                $mssg = "Image Not Uploaded please try again";
                $class = "danger";
            }
        } else {
            $mssg = "please Select Proper Image";
            $class = "danger";
        }

        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header("location:../property_gallery.php?property_id=$property_id");
    }
    // delete property galary +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeletePropertyImg') {
        $id =   $_POST['deleteId'];
        $keyNameQry = mysqli_query($con, "SELECT `keyName` FROM property_galllery WHERE `id`= $id ");
        // $resKeyName = mysqli_fetch_assoc($keyNameQry);
        if ($resKeyName['keyName'] != "") {
            delteFromS3($resKeyName['keyName']);
        }
        $delete = mysqli_query($con, "DELETE FROM `property_galllery` WHERE `id`= $id");
        if ($delete) {
            $mssg = "deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        // header('location:../property_gallery.php?property_id=1101');
        header('location:../properties.php');
    }
    // delete property Enquiry request +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if ($_POST['submit'] === 'DeletePropertyEnqReq') {
        $id =   $_POST['deleteId'];
        $delete = mysqli_query($con, "DELETE FROM `property_enq` WHERE `id`= $id");
        if ($delete) {
            $mssg = "deleted successfully";
            $class = "success";
        } else {
            $mssg = "Error while deleting";
            $class = "danger";
        }
        $_SESSION['mssg'] = $mssg;
        $_SESSION['class'] = $class;
        header('location:../property_enquiry.php');
    }
} else {
    header('location:../index.php');
}