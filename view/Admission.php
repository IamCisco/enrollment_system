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
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Basic Information
                                    </h3>
                                </div>
                                
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="file_image">Image</label>
                                            <input type="file" name="input_file" class="form-control-file border" id="file_image"required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_lrn" name="learning_reference_number" placeholder="Learning Reference Number*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_voucher" name="voucher" required>
                                                <option value="" disabled selected>Do you have a Voucher/ESC/QVR?*</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_voucher_number" name="voucher_number" placeholder="Voucher/ESC/QVR">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_lname" name="last_name" placeholder="Last Name*"required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_fname" name="first_name" placeholder="First Name*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_mname" name="middle_name" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="date" class="form-control" name="birthdate" id="txt_birthday" placeholder="Birthday*"required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_place_of_birth" name="place_of_birth" placeholder="Place of Birth*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" id="txt_cititzenship" name="cititzenship" placeholder="Cititzenship*" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="address" id="txt_address" placeholder="Present Address*"required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" id="txt_religion" name="religion" placeholder="Religion" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" id="txt_sex" name="sex" required>
                                                <option value="" disabled selected>Sex*</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <select class="form-control" id="txt_registered_voter" name="registered_voter" required>
                                                <option value="" disabled selected>Are you a registered voter of Cabuyao?*</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="registered_at" id="txt_registered_at" placeholder="Where?">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="number" min=1900 class="form-control" id="txt_registered_since" name="registered_since" placeholder="Since?" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control" name="last_school" id="txt_last_school" placeholder="Last School Attended?*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_school_type" name="school_type" required>
                                                <option value="" disabled selected>School Type*</option>
                                                <option value="Public">Public</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Contact Information
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="contact_number" id="txt_number" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="telephone_number" id="txt_telephone" placeholder="Telephone Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="email" class="form-control" name="email" id="txt_email" placeholder="Email*"required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Educational Background
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="junior_school" id="txt_junior_school" placeholder="Junior High School(NO ACRONYM)*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="junior_year_graduated" id="txt_junior_year_graduated" placeholder="Year Graduated*"required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="honors_junior" id="txt_honors_junior" placeholder="Honors Received">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="junior_school_address" id="txt_junior_school_address" placeholder="Junior High School Address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="elementary_school" id="txt_elementary_school" placeholder="Elementary School(NO ACRONYM)*" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="elementary_year_graduated" id="txt_elementary_year_graduated" placeholder="Year Graduated*"required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="honors_elementary" id="txt_honors_elementary" placeholder="Honors Received">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="elementary_school_address" id="txt_elementary_school_address" placeholder="Elementary High School Address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Family Background
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="civil_status" id="txt_civil_status" placeholder="Civil Status*"required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="spouse_name" id="txt_spouse_name" placeholder="Spouse Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="spouse_residence" id="txt_spouse_residence" placeholder="Spouse Legal Residence">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Father's Information
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="father_name" id="txt_father_name" placeholder="Father's Name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_highest_educ_father" name="highest_educ_father">
                                                <option value="" disabled selected>Highest Educational Attainment</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="High School">High School</option>
                                                <option value="Vocational">Vocational</option>
                                                <option value="College">College</option>
                                                <option value="Post Graduate">Post Graduate</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="date" class="form-control" name="father_birthday" id="txt_father_birthday" placeholder="Birthday" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="father_contact_no" id="txt_father_contact_no" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="father_occupation" id="txt_father_occupation" placeholder="Occupation">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" class="form-control" name="father_income" id="txt_father_income" placeholder="Monthly Income">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="father_company" id="txt_father_company" placeholder="Company">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="father_company_address" id="txt_father_company_address" placeholder="Company Address">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_father_status" name="father_status" required>
                                                <option value="" disabled selected>Status</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="OFW">OFW</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Deceased">Deceased</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Mother's Information
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="mother_name" id="txt_mother_name" placeholder="Mother's Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_highest_educ_mother" name="highest_educ_mother" required>
                                                <option value="" disabled selected>Highest Educational Attainment</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="High School">High School</option>
                                                <option value="Vocational">Vocational</option>
                                                <option value="College">College</option>
                                                <option value="Post Graduate">Post Graduate</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="date" class="form-control" name="mother_birthday" id="txt_mother_birthday" placeholder="Birthday">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="mother_contact_no" id="txt_mother_contact_no" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="mother_occupation" id="txt_mother_occupation" placeholder="Occupation">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" class="form-control" name="mother_income" id="txt_mother_income" placeholder="Monthly Income">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="mother_company" id="txt_mother_company" placeholder="Company">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="mother_company_address" id="txt_mother_company_address" placeholder="Company Address">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="txt_mother_status" name="mother_status" required>
                                                <option value="" disabled selected>Status</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="OFW">OFW</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Deceased">Deceased</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class = "panel panel-primary">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">
                                        Course
                                    </h3>
                                </div>
                                <div class = "panel-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="txt_program" name="program" required>
                                                <option value="" disabled selected>First Choice*</option>
                                                <option value="ABM">ABM</option>
                                                <option value="STEM">STEM</option>
                                                <option value="HUMMS">HUMMS</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="txt_program2" name="program2" required>
                                                <option value="" disabled selected>Second Choice*</option>
                                                <option value="ABM">ABM</option>
                                                <option value="STEM">STEM</option>
                                                <option value="HUMMS">HUMMS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="txt_whose_choice" name="whose_choice1" required>
                                                <option value="" disabled selected>Whose choice is your first course?*</option>
                                                <option value="My own choice">My own choice</option>
                                                <option value="My Parent's Choice">My Parent's Choice</option>
                                                <option value="My Relative's Choice">My Relative's Choice</option>
                                                <option value="No one in particular">No one in particular</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="txt_whose_choice2" name="whose_choice2" required>
                                                <option value="" disabled selected>Whose choice is your first course?*</option>
                                                <option value="My own choice">My own choice</option>
                                                <option value="My Parent's Choice">My Parent's Choice</option>
                                                <option value="My Relative's Choice">My Relative's Choice</option>
                                                <option value="No one in particular">No one in particular</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="form-group">
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
                            </div> -->
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