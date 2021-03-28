
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
                                    <td>View</td>
                                    <td>Accept</td>
                                    <td>Reject</td>
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
                                    <td>View</td>
                                    <td>Accept</td>
                                    <td>Reject</td>
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
                                </tr>
                            </thead>
                            <tbody id="tbl_enrollee_for_exam_body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <div id="modal_enrollee_info" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    Enrollee Info
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class ="row">
                        <div class="col-md-12">
                            <table class="" width="100%" border="none">
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Basic Information</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_basic_info_body">
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Contact Information</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_contact_info_body">
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Educational Background</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_education_info_body">
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Family Background</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_family_background_body">
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Course</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_course_body">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>

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