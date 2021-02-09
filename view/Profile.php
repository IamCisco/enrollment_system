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
                    <h2>Profile</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">

                            <img class="img-responsive avatar-view"  id="img_avatar" style="height:50%;width:50%" src="" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <h5 id="lbl_name">Samuel Doe</h5>
                    <br>
                    <ul class="list-unstyled user_data">
                        <li id="lbl_email">
                            
                        </li>
                    </ul>
                    <a class="btn btn-success" onclick="PROFILE.editProfile()">
                        <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br />
                </div>
                <div class="col-md-9 col-sm-9">
                    <form id="frm_update_profile">
                        <div class="form-group">
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname" name="middle_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="file_image">Image</label>
                            <input type="file" name="input_file" class="form-control-file border" id="file_image">
                        </div>
                        
                        <button type ="submit" class="btn btn-success">
                            <i class="fa fa-save m-right-xs"></i>Update Profile</button>
                    </form>
                    
                </div>
                <div class="row">
            </div>
        </section>

    </main>
    <!-- End #main -->
    <div id="modal_teacher_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_teacher_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Teacher</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_id_num">ID Number</label>
                            <input type="text" class="form-control" id="txt_id_num" name="id_number" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname" name="middle_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_address">Address</label>
                            <input type="text" class="form-control" id="txt_address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber" name="contact_number" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_teacher_level">Position</label>
                            <input type="text" class="form-control" id="txt_teacher_level" name="teacher_level" required>
                        </div>
                        <div class="form-group">
                            <label for="file_image">Image</label>
                            <input type="file" name="input_file" class="form-control-file border" id="file_image" required>
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
    <div id="modal_teacher_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_teacher_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname_update" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname_update" name="middle_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname_update" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_address">Address</label>
                            <input type="text" class="form-control" id="txt_address_update" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email_update" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday_update" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber_update" name="contact_number" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_teacher_level">Position</label>
                            <input type="text" class="form-control" id="txt_teacher_level_update" name="teacher_level" required>
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
    <div id="preloader"></div>
    <a href="#" class="back-to-top">
        <i class="icofont-simple-up"></i>
    </a>
    <?php include "../template/scripts.php"; ?>

    <script src="../scripts/index.js"></script>
    <script src="../scripts/user.js"></script>
    <script src="../scripts/profile.js"></script>

</body>

</html>