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
                    <h2>Requirements Management</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                    <div class="col-lg-12">
                        <button style='font-size:24px' data-toggle="modal" data-target="#modal_requirement_form" class="btn btn-success">Add New <i class='fas fa-plus'></i></button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover" id="tbl_requirement">
                            <thead>
                                <tr>
                                    <td>Form Label</td>
                                    <td>Type Of Input</td>
                                    <td>Values</td>
                                    <td>Is Required</td>
                                    <td>Enabled</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody id="tbl_requirement_body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_requirement_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_requirement_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txt_title">Form Label</label>
                            <input type="text" name="form_label" class="form-control" id="form_label" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_announcement">Input Type</label>
                            <select class="form-control" id="txt_type_update" name="input_type" required>
                                <option value="" disabled selected>Please select an input type</option>
                                <option value="text">Text</option>
                                <option value="date">Date</option>
                                <option value="number">Number</option>
                                <option value="select">Dropdown</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Select Values</label>
                            <textarea type="text" class="form-control" name="select_values" id="txt_select_values" rows="3"></textarea>
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

    <div id="modal_requirement_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_requirement_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_title_update">Title</label>
                            <input type="hidden" class="form-control" id="txt_id"  name="id" required>
                            <input type="text" class="form-control" id="txt_title_update" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_announcement">Announcement</label>
                            <textarea type="text" class="form-control" id="txt_announcement_update" name="announcement" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Validity Date</label>
                            <input type="date" class="form-control" id="txt_validity_update" name="validity_date" required>
                        </div>

                        <div class="form-group">
                            <label for="txt_type">Type</label>
                            <select class="form-control" id="txt_type_update" name="type" name="type" required>
                                <option value="" disabled selected>Please select a announcement type</option>
                                <option value="News">News</option>
                                <option value="Events">Events</option>
                                <option value="Announcements">Announcements</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file_image">Image</label>
                            <input type="file" name="input_file" class="form-control-file border" id="file_image_update" >
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
    <script src="../scripts/requirement.js"></script>

</body>

</html>