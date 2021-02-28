
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head.php"; ?>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">

    </div>

    <?php include "../template/top_nav2.php"; ?>

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Enrollee Management</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>For Acceptance</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover  table-responsive" id="tbl_enrollee_accept">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>TOR</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Birthday</td>
                                    <td>Email</td>
                                    <td>Phone Number</td>
                                    <td>Date Registered</td>
                                    <td>Grade Level</td>
                                    <td>Program</td>
                                    <td>Accept</td>
                                    <td>Reject</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_enrollee_accept_body"></tbody>
                        </table>
                    </div>
                </div>
                
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <h4>For Entrance Exam Assessment</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover table-responsive" id="tbl_enrollee_for_exam">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>TOR</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Birthday</td>
                                    <td>Email</td>
                                    <td>Phone Number</td>
                                    <td>Date Registered</td>
                                    <td>Grade Level</td>
                                    <td>Program</td>
                                    <td>Passed</td>
                                    <td>Failed</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_enrollee_for_exam_body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <?php include "../template/scripts.php"; ?>

    <script src="../scripts/user.js"></script>
    <script>
        
        USER.checkSession();
    </script>
    <script src="../scripts/enrollee.js"></script>

</body>

</html>