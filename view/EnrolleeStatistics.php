
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
                    <h2>Enrollee Statistics per Year</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <br>
                <div class="row">
                <form class="form-inline" id="frm_search_stats">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="number" class="form-control" id="txt_year" name="year" min=1990 placeholder="Select Year" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <canvas id="cnv_enrollee_stats"></canvas>
                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_content_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_content_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Content</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_name_update">Name</label>
                            <input type="text" class="form-control" id="txt_name_update" disabled>
                        </div>
                        <div class="form-group">
                            <label for="txt_detail">Details</label>
                            <textarea type="text" class="form-control" id="txt_detail_update" rows="5" required></textarea>
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
    <div id="modal_enrollee_passed" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_teacher_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Passed Students</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-striped table hover" id="tbl_enrollee_passed">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Email</td>
                                    <td>Contact Number</td>
                                    <td>Program</td>
                                    <td>Rate</td>
                                    <td>Remarks</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_enrollee_passed_body"></tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <?php include "../template/scripts.php"; ?>
    
    <script src="../scripts/user.js"></script>
    <script src="../scripts/enrollee_statistics.js"></script>

</body>

</html> 