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
                        <button style='font-size:24px' data-toggle="modal" data-target="#modal_student_form" class="btn btn-sm btn-success">Add New <i class='far fa-save'></i></button>
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
                                    <td>Action</td>
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
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="txt_fname">First Name</label>
                            <input type="text" class="form-control" id="txt_fname">
                        </div>
                        <div class="form-group">
                            <label for="txt_mname">Middle Name</label>
                            <input type="text" class="form-control" id="txt_mname">
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Last Name</label>
                            <input type="text" class="form-control" id="txt_lname">
                        </div>
                        <div class="form-group">
                            <label for="txt_lname">Address</label>
                            <input type="text" class="form-control" id="txt_address">
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="text" class="form-control" id="txt_email">
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Birthdate</label>
                            <input type="date" placeholder="yyyy-mm-dd"class="form-control" id="txt_bday">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php include "../template/scripts.php"; ?>
    <script src="../scripts/student.js"></script>

</body>

</html>