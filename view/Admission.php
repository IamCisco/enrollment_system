<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head.php"; ?>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">

    </div>

    <?php include "../template/top_nav1.php"; ?>

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Admission</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <form id="frm_enrollee_add" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="txt_fname">First Name</label>
                                    <input type="text" class="form-control" id="txt_fname" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_mname">Middle Name</label>
                                    <input type="text" class="form-control" id="txt_mname" name="middle_name" placeholder="Middle Name"required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_lname">Last Name</label>
                                    <input type="text" class="form-control" id="txt_lname" name="last_name" placeholder="Last Name"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txt_address">Address</label>
                                <textarea class="form-control" id="txt_address" name="address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="txt_email">Email</label>
                                <input type="email" class="form-control" name="email" id="txt_email" placeholder="Email"required>
                            </div>
                            <div class="form-group">
                                <label for="txt_birthday">Birthday</label>
                                <input type="date" class="form-control" name="birthdate" id="txt_birthday" placeholder="Birthday"required>
                            </div>
                            <div class="form-group">
                                <label for="txt_number">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" id="txt_number" placeholder="Contact Number"required>
                            </div>
                            <div class="form-group">
                                <label for="txt_program">Program</label>
                                <select class="form-control" id="txt_program" name="program" required>
                                    <option value="" disabled selected>Please select a program</option>
                                    <option value="ABM">ABM</option>
                                    <option value="STEM">STEM</option>
                                    <option value="HUMMS">HUMMS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txt_grade">Grade</label>
                                <select class="form-control" id="txt_grades" name="grade_level"required>
                                    <option value="" disabled selected>Please select a grade</option>
                                    <option value="11">XI</option>
                                    <option value="12">XII</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file_image">Image</label>
                                <input type="file" name="input_file" class="form-control-file border" id="file_image"required>
                            </div>
                            <div class="form-group">
                                <label for="txt_number">Requirement <strong>Note : Please upload your scanned TOR(Form 137)</strong></label>
                                <input type="file" name="input_file_requirement" class="form-control-file border" id="file_requirement"required>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </form>
                    </div>
                </div>


            </div>
        </section>

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
                            <input type="password" class="form-control" id="txt_password" name="password"  required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-success pull-right" id="btn_login">Save</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <?php include "../template/scripts.php"; ?>

    <script src="../scripts/user.js"></script>
    <script src="../scripts/enrollee.js"></script>

</body>
</html>