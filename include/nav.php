<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <style>
        .logo {
            width: 150px;
        }

        .active a {
            color: #c2943c !important;
        }

        .success {
            background-color: #c2943c;
            outline: none !important;
            /* color:black; */
            border-radius: 3px;
            border: 2px solid #c2943c;
            cursor: pointer;
            color: white;
        }

        .success:hover {
            color: black;
        }

        .nav-link a:hover {
            color: #c2943c;
            cursor: pointer;
        }

        /* .showMobileView {
            display: none;
        } */

        /* @media screen and (max-width:992px) {
            .showMobileView {
                display: block;
            }

            .hidemobileView {
                display: none;
            }
        } */
    </style>
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="index.php"><img src="./img/propcornLogo.svg" class="logo" alt=""></a>

        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">

                <li class="nav-item pl-2 <?php if ($cpage == 'index') echo "active"; ?>">
                    <a class="nav-link pl- 4" href="index.php">Home</a>
                </li>

                <li class="nav-item <?php if ($cpage == 'about') echo "active"; ?>">
                    <a class="nav-link pl-2" href="about.php">About Us</a>
                </li>

                <li class="nav-item <?php if ($cpage == 'property-grid') echo "active"; ?>">
                    <a class="nav-link " href="property-grid.php">Properties</a>
                </li>

                <li class="nav-item <?php if ($cpage == 'contact') echo "active"; ?>">
                    <a class="nav-link " href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item <?php if ($cpage == 'jobopening') echo "active"; ?>">
                    <a class="nav-link " href="jobopening.php"> Careers</a>
                </li>
            </ul>
        </div>
        <a href="propertyenquiry.php" class="success p-2 "><b>Enquire Now</b></a>
    </div>
    <script>
        document.getElementById('.nav-item').onclick = changeColor;

        function changeColor() {
            document.body.style.color = "purple";
            return false;
        }
    </script>
    <script>
        // Get all the navigation items
        var navItems = document.querySelectorAll('.nav-item');

        // Add a click event listener to each navigation item
        navItems.forEach(function(item) {
            item.addEventListener('click', function() {
                // Reset the color of all navigation items
                navItems.forEach(function(navItem) {
                    navItem.style.color = 'green';
                });

                // Change the color of the clicked navigation item to green
                item.style.color = 'green';
            });
        });
    </script>
</nav><!-- End Header/Navbar -->