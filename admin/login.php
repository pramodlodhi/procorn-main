<?php

include 'include/connection.php';
$mssg = " ";
$class = " ";
if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ($email != "") {
        if ($pass != "") {
            $qry = mysqli_query($con, "SELECT * from `login` WHERE `email` = '$email' AND  `pass` = '$pass'");
            if (mysqli_num_rows($qry) > 0) {
                $res = mysqli_fetch_assoc($qry);
                $id = $res['id'];
                $_SESSION['Alogin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['userName'] = $res['userName'];;
                $_SESSION['userRole'] = $res['userRole'];
                $_SESSION['date'] = date('Y-m-d');
                $_SESSION['mssg'] = true;
                $_SESSION['messsage'] = "Welcome to Dashboard";
                $_SESSION['class'] = "alert-success";
                $date = date('d-m-Y H:i:s');
                $loginupdt = mysqli_query($con, "UPDATE `login` SET `date`='$date',`loginStatus`= true WHERE `id` = $id");
                header('location:index.php');
            } else {
                $_SESSION['mssg'] = true;
                $mssg = "Please enter Valid Credientails";
                $class = "alert-danger";
            }
        } else {
            $_SESSION['mssg'] = true;
            $mssg = "Please enter Password";
            $class = "alert-danger";
        }
    } else {
        $_SESSION['mssg'] = true;
        $mssg = "Please enter email id";
        $class = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PropCorn | Admin</title>
    <link rel="shortcut icon" href="dist/logo/propcornLogo.svg" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box" style=" border-radius:10px;overflow:hidden;">
        <div class="login-logo " style="margin-bottom:0px; background:#fff;">
            <img src="dist/logo/propcornLogo.svg" alt="" style="width:50%;margin: 20px 0px;
">
            <!-- <a href="index.html">ExtraChildhood</a> -->
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <!-- mssg-->
                <?php if (isset($_SESSION['mssg'])) { ?>
                    <div class="alert  <?= $class ?>" role="alert"> <?= $mssg ?></div>
                <?php unset($_SESSION['mssg']);
                } ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="justify-content: right;">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="loginBtn" class="btn  btn-light btn-block text-light" style="background-color: #c2943c;">Sign
                                In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/main.js"></script>
</body>

</html>