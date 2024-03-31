 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <style>
         .nav-treeview {
             margin: 0px 15px;
         }
     </style>
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="index.php" class="nav-link">Home</a>
         </li>
         <!-- <li class="nav-item d-none d-sm-inline-block">
             <a href="#" class="nav-link">Contact</a>
         </li> -->
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li class="nav-item">
             <a class="nav-link logout" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="Log out">
                 <!-- <i class="fas fa-map-signs"></i> -->
                 <i class="fa fa-sign-out" aria-hidden="true"></i>
             </a>
         </li>
     </ul>
 </nav>


 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <div class="image" style="width: 100%;border-bottom: 1px solid grey;margin-bottom:5px;height: 57px;">
         <a href="index.php" class="" style="width: 100%;height: 100%;height:100%; display:block;text-align: center;">
             <img src="dist/logo/propcornLogo.svg" alt="Logo" class="brand-image  elevation-3" style="opacity: .8; width:50%; height:100%;">
         </a>
     </div>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/logo/extrachildhood.png" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="index.php" class="d-block">Arvind pandey</a>
             </div>
         </div> -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item menu-open">
                     <a href="index.php" class="nav-link <?= $index ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-item ">
                     <a href="properties.php" class="nav-link  <?= $properties, $addproperties ?>">
                         <i class="nav-icon fas fa-building-columns"></i>
                         <p>Property</p>
                         <i class="fas fa-angle-left right"></i>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item ">
                             <a href="properties.php" class="nav-link  <?= $properties ?>">
                                 <i class="nav-icon fas fa-list"></i>
                                 <p>All Property</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="add_properties.php" class="nav-link  <?= $addproperties ?>">
                                 <i class="nav-icon fas fa-plus"></i>
                                 <p>Add Property</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Testimonials -->
                 <li class="nav-item ">
                     <a href="testimonils.php" class="nav-link  <?= $testimonial, $addtestimonial ?>">
                         <i class="nav-icon fas fa-comment"></i>
                         <p>Testimonials</p>
                         <i class="fas fa-angle-left right"></i>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item ">
                             <a href="testimonials.php" class="nav-link  <?= $testimonial ?>">
                                 <i class="nav-icon fas fa-list"></i>
                                 <p>All Testimonials</p>
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a href="add_testimonials.php" class="nav-link  <?= $addtestimonial ?>">
                                 <i class="nav-icon fas fa-plus"></i>
                                 <p>Add Testimonials</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- Amenities -->
                 <li class="nav-item ">
                     <a href="amenities.php" class="nav-link  <?= $amenities ?>">
                         <i class="nav-icon fas fa-window-restore"></i>
                         <p>Amenities</p>
                     </a>
                 </li>
                 <!-- termsConditions -->
                 <li class="nav-item ">
                     <a href="terms_conditions.php" class="nav-link  <?= $termsConditions ?>">
                         <i class="nav-icon fas fa-quote-left"></i>
                         <p>Terms & Conditions</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="career.php" class="nav-link  <?= $career ?>">
                         <i class="nav-icon fas fa-briefcase"></i>
                         <p>Career</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="contact_request.php" class="nav-link  <?= $contactus ?>">
                         <i class="nav-icon fas fa-headset"></i>
                         <p>Contact Request</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="property_enquiry.php" class="nav-link  <?= $propEnq ?>">
                         <i class="nav-icon fas fa-headset"></i>
                         <p>Property Enquiry </p>
                     </a>
                 </li>
                 <!-- Slider -->
                 <li class="nav-item active">
                     <a href="schools.php" class="nav-link  <?= $sliders, $addSlider ?>">
                         <i class="nav-icon fas fa-image"></i>
                         <p>Sliders</p>
                         <i class="fas fa-angle-left right"></i>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item ">
                             <a href="home_slider.php" class="nav-link  <?= $sliders ?>">
                                 <i class="nav-icon fas fa-list"></i>
                                 <p>All Sliders</p>
                             </a>
                         </li>

                         <li class="nav-item ">
                             <a href="add_sliders.php" class="nav-link  <?= $addSlider ?>">
                                 <i class="nav-icon fas fa-plus"></i>
                                 <p>Add Home Sliders</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- Job Openings -->
                 <li class="nav-item ">
                     <a href="" class="nav-link  <?= $job, $addJob ?>">
                         <i class="nav-icon fas fa-map-signs"></i>
                         <p>Job Openings</p>
                         <i class="fas fa-angle-left right"></i>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item ">
                             <a href="job_openings.php" class="nav-link  <?= $job ?>">
                                 <i class="nav-icon fas fa-list"></i>
                                 <p>All Jobs</p>
                             </a>
                         </li>

                         <li class="nav-item ">
                             <a href="add_job_opening.php" class="nav-link  <?= $addJob ?>">
                                 <i class="nav-icon fas fa-plus"></i>
                                 <p>Add Job</p>
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li class="nav-item ">
                     <a href="logout.php" class="nav-link logout">
                         <i class="nav-icon fas fa-right-from-bracket"></i>
                         <p>Logout</p>
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>

 <?php if (isset($_SESSION['mssg'])) { ?>
     <div class="alert bg-<?= $_SESSION['class']  ?>" role="alert" style="position:absolute;right:30px;z-index:12;top:90px;">
         <?= $_SESSION['mssg']  ?>
     </div>
 <?php }
    unset($_SESSION['mssg']);
    unset($_SESSION['class']);
    ?>