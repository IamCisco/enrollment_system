<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head.php"; ?>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">

    </div>

    <?php include "../template/header.php"; ?>

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
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Birthday</td>
                                    <td>Email</td>
                                    <td>Phone Number</td>
                                    <td></td>
                                    <td></td>
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
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname" required >
                        </div>
                        <div class="form-group">
                            <label for="txt_address">Address</label>
                            <input type="text" class="form-control" id="txt_address" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber" required>
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
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_fname_update">First Name</label>
                            <input type="text" class="form-control" id="txt_fname_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_mname_update">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_lname_update">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname_update" required >
                        </div>
                        <div class="form-group">
                            <label for="txt_address_update">Address</label>
                            <input type="text" class="form-control" id="txt_address_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email_update">Email</label>
                            <input type="text" class="form-control" id="txt_email_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday_update">Birthdate</label>
                            <input type="date" class="form-control" id="txt_bday_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_phonenumber_update">Contact Number</label>
                            <input type="text" class="form-control" id="txt_phonenumber_update" required>
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
    <?php include "../template/scripts.php"; ?>
    <script src="../scripts/student.js"></script>

</body>

</html>