<?php
$cpage = "propEnq";
$heading = "Property Enquiry Request";
include 'include/header.php';
if (isset($_GET['date'])) {
    $TodatDate = $_GET['date'];
    $heading = "Property Enquiry Request ($TodatDate)";
    $slect = "SELECT * FROM `property_enq`  WHERE `date`='$TodatDate' ORDER BY id DESC";
} else {
    $slect = "SELECT * FROM `property_enq` ORDER BY id DESC";
}
$query = mysqli_query($con, $slect);
?>

<style>
    th,
    td {
        text-wrap: nowrap;
        /* white-space: break-spaces; */
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'include/nav.php'; ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $heading ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <a href="add_sliders.php" class="btn btn-success">Add Sliders</a> -->
                                </div>
                                <div class="card-body" style="overflow-x: scroll;">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Date</th>
                                                <th>Property Id</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Enquiry For</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($query) > 0) {
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $res['date'] ?></td>
                                                        <td class="text-center"><a href="edit_properties.php?property_id=<?= $res['property_id'] ?>" target="_blank"><?= $res['property_id'] ?></a>
                                                        </td>
                                                        <td><?= $res['name'] ?></td>
                                                        <td><?= $res['contact'] ?></td>
                                                        <td><?= $res['email'] ?></td>
                                                        <td><?= $res['city'] ?></td>
                                                        <td><?= $res['enqFor'] ?></td>
                                                        <td>
                                                            <?= substr($res['message'], 0, 50) ?> ...
                                                            <br>
                                                            <a href="" class="enqBtn" data-toggle="modal" data-target="#exampleModalCenter"> Vie More

                                                                <input type="hidden" class="enqText" value="<?= $res['message'] ?>">
                                                            </a>
                                                        </td>
                                                        <td>

                                                            <a href="" class="text-danger deleteId" data-toggle="modal" data-target="#DeleteModel" data-deleteId="<?= $res['id'] ?>" data-name="<?= $res['name'] ?>" data-deleteBtnVal="DeletePropertyEnqReq"><i class="nav-icon fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="reqMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include 'include/footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        $(".enqBtn").click(function() {
            var enqText = $(".enqText", this).val();
            $(".reqMessage").html(enqText);
        })
    })
</script>

</html>