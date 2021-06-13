<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head.php"; ?>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <!--div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div-->
            <!--div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div-->
        </div>
    </div>

    <?php include "../template/top_nav1.php"; ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>CITech Website</spa>
            </h1>
            <h2>Come and learn new things with us</h2>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="featured-services" class="featured-services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                </div>
                <div class="row" id="div_vmgo">
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <!-- <h2></h2> -->
                    <h3><span>Announcement</span></h3>
                </div>
                    <form id="frm_search_announcement">
                <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search_text" id="txt_search_announcement" placeholder="Search announcement" aria-label="Search Announcement" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                            <button class="btn btn-outline-secondary" type="button" id="btnLoadAllAnnouncement">Load All Announcements</button>
                        </div>
                    </form>
                    
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-News">News</li>
                            <li data-filter=".filter-Events">Events</li>
                            <li data-filter=".filter-Announcements">Announcements</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" id="div_portfolio">

                </div>

            </div>
        </section><!-- End Portfolio Section -->



        <!-- ======= Team Section ======= -->
        <!-- <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <h3>Our Hardworking <span>Team</span></h3>
                </div>

                <div class="row" id="div_teachers">
                </div>

            </div>
        </section> -->
        <!-- End Team Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100" id="div_contacts">


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
    <div id="modal_login_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="form_login">
                    <div class="modal-header">
                        <h4 class="modal-title">Login Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_username">Username</label>
                            <input type="text" class="form-control" id="txt_username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password</label>
                            <input type="password" class="form-control" id="txt_password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-toggle="modal" data-target="#modal_register_form" class="btn btn-primary pull-right">Register</button>
                        <button type="submit" class="btn btn-success pull-right" id="btn_login">Login</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div id="modal_register_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="form_register">
                    <div class="modal-header">
                        <h4 class="modal-title">Register Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Default inline 1-->
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="rdb_student" name="user_type" required>
                            <label class="custom-control-label" for="rdb_student">Student</label>
                        </div>

                        <!-- Default inline 2-->
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="rdb_teacher" name="user_type" required>
                            <label class="custom-control-label" for="rdb_teacher">Teacher</label>
                        </div>
                        <br>


                        <div class="form-group">
                            <label for="txt_username_register">Username</label>
                            <input type="text" class="form-control" id="txt_id_number" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password_register">Password</label>
                            <input type="password" class="form-control" id="txt_password_register" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password_register">Re Enter Password</label>
                            <input type="password" class="form-control" id="txt_confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success pull-right" id="btn_register">Register</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div id="modal_comments" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    Comment
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="announcement_title">Comment</p>
                    <p id="announcement_details"><b>Announcement Detail</b></p>
                    <div class="panel panel-default widget">
                        <div class="panel-body">
                            <ul class="list-group" id="list_comment">


                            </ul>
                            <br>
                            <div class="form-row justify-content">
                                <div class="col-md-10 mb-6">
                                    <input type="text" class="form-control" id="txt_comment" placeholder="Input your comment here">
                                </div>
                                <div class="col-md-2 mb-6">
                                    <a href="#portfolio" class="btn btn-primary btn-sm " onclick="INDEX.insertComment()" role="button"><span class="fas fa-paper-plane"></span> Send</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal_comment_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    Edit Comment
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-12">
                        <textarea type="text" rows=7 class="form-control" id="txt_comment_update" placeholder="Input your comment here"></textarea>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success pull-right" id="btn_update_comment">Update Comment</button>
                </div>

            </div>
        </div>
    </div>

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <?php include "../template/scripts.php"; ?>
    <script src="../scripts/user.js"></script>
    <script src="../scripts/index.js"></script>

</body>

</html>