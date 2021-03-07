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
                    <h2>Program Management</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                    <div class="col-lg-12">
                        <button style='font-size:24px' data-toggle="modal" data-target="#modal_program_form" class="btn btn-success">Add New <i class='fas fa-plus'></i></button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover" id="tbl_program">
                            <thead>
                                <tr>
                                    <td>Program</td>
                                    <td>Abbreviation</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody id="tbl_program_body"></tbody>
                        </table>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_program_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_program_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Program</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_program">Program</label>
                            <input type="text" class="form-control" name="program" id="txt_program" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Abbreviation</label>
                            <input type="text" class="form-control" name="abbreviation" id="txt_abbreviation" required>
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

    <div id="modal_program_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_program_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Program</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="txt_id"  name="id" required>
                            <label for="txt_program">Program</label>
                            <input type="text" class="form-control" name="program" id="txt_program_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Abbreviation</label>
                            <input type="text" class="form-control" name="abbreviation" id="txt_abbreviation_update" required>
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
    <?php include "../template/scripts.php"; ?>

    <script src="../scripts/user.js"></script>
    <script src="../scripts/program.js"></script>

</body>

</html>