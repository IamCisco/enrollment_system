<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="index.php">CITech<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo mr-auto"><img src="../assets/img/logo.png" alt=""></a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php#featured-services">About</a></li>
                <li><a href="index.php#portfolio">Portfolio</a></li>
                <li><a href="index.php#team">Team</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li class="drop-down"><a href="#" id="txt_name"></a>
                    <ul>
                        <li><a href="#" id ="btn_content" style="display:none">Content Management</a></li>
                        <li><a href="Student.php"id ="btn_student" style="display:none">Student</a></li>
                        <li><a href="Announcement.php" id ="btn_announcement" style="display:none">Announcements</a></li>
                        <li><a href="#"id ="btn_addmission" style="display:none">Addmission</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal_login_form" id ="btn_login">Login</a></li>
                        <li><a href="#" id="btn_logout" style="display:none" onclick="USER.logout()">Logout</a></li>
                    </ul>
                </li>


            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->