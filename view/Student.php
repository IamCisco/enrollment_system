
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
                    <h2>Students Masterlist</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                    <div class="col-lg-12">
                        <button style='font-size:24px' data-toggle="modal" data-target="#modal_student_form" class="btn btn-success">Add New <i class='fas fa-plus'></i></button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover" id="tbl_student">
                            <thead>
                                <tr>
                                    <td>View</td>
                                    <td>Enabled</td>
                                    <td></td>
                                    <td></td>
                                    <td>Image</td>
                                    <td>Student No.</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Birthday</td>
                                    <td>Email</td>
                                    <td>Phone Number</td>
                                    <td>Program</td>
                                    <td>Grade</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_student_body"></tbody>
                        </table>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_student_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_student_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="txt_program">Entrance Exam Passers</label>
                            <select class="form-control" id="txt_passers" name="passers" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="txt_image" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_address">Address</label>
                            <input type="text" class="form-control" id="txt_address" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="txt_program">Program</label>
                            <select class="form-control" id="txt_program" required disabled>
                                <option value="" disabled selected>Please select a program</option>
                                <option value="ABM">ABM</option>
                                <option value="STEM">STEM</option>
                                <option value="HUMMS">HUMMS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_grade">Grade</label>
                            <select class="form-control" id="txt_grade" required  disabled>
                                <option value="" disabled selected>Please select a grade</option>
                                <option value="11">XI</option>
                                <option value="12">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_semester">Semester</label>
                            <select class="form-control" id="txt_semester" name="semester" required disabled>
                                <option value="" disabled selected>Please select semester</option>
                                <option value="11">XI</option>
                                <option value="12">XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-success pull-right">Save</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="modal_student_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_student_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_fname_update">First Name</label>
                            <input type="hidden" class="form-control" id="txt_id" name="id" required>
                            <input type="text" class="form-control" id="txt_fname_update" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname_update">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname_update" name="middle_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname_update">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname_update" name="last_name"  required >
                        </div>
                        <div class="form-group">
                            <label for="txt_address_update">Address</label>
                            <input type="text" class="form-control" id="txt_address_update" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email_update">Email</label>
                            <input type="text" class="form-control" id="txt_email_update" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday_update">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday_update" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber_update">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber_update" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_program_update">Program</label>
                            <select class="form-control" id="txt_program_update" name="program" required>
                                <option value="" disabled selected>Please select a program</option>
                                <option value="ABM">ABM</option>
                                <option value="STEM">STEM</option>
                                <option value="HUMMS">HUMMS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_grade">Grade</label>
                            <select class="form-control" id="txt_grade_update" name="grade_level" required>
                                <option value="" disabled selected>Please select a grade</option>
                                <option value="11">XI</option>
                                <option value="12">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_semester_update">Semester</label>
                            <select class="form-control" id="txt_semester_update" name="semester" required>
                                <option value="" disabled selected>Please select semester</option>
                                <option value="11">XI</option>
                                <option value="12">XII</option>
                            </select>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
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
                                <!-- <thead>
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
                                </tbody> -->
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Course</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_course_body">
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan=2 style="color:greenyellow;text-align:center">Other Info</th>
                                    </tr>
                                </thead>
                                <tbody id= "tbl_employee_other_info_body">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>
    <?php include "../template/scripts.php"; ?>
    
    <script src="../scripts/user.js"></script>
    <script src="../scripts/student.js"></script>

</body>

</html>