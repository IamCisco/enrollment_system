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
                    <h2>Announcement Management</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- <button style='font-size:24px'>Save <i class='far fa-save'></i></button> -->
                <div class="row">
                    <div class="col-lg-12">
                        <button style='font-size:24px' data-toggle="modal" data-target="#modal_announcement_form" class="btn btn-success">Add New <i class='fas fa-plus'></i></button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped table-hover" id="tbl_announcement">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Title</td>
                                    <td>Announcement</td>
                                    <td>Type</td>
                                    <td>Validity Date</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody id="tbl_announcement_body"></tbody>
                        </table>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_announcement_form" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_announcement_add">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_title">Title</label>
                            <input type="text" name="title" class="form-control" id="txt_title" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_announcement">Announcement</label>
                            <textarea type="text" class="form-control" name="announcement" id="txt_announcement" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Validity Date</label>
                            <input type="date" class="form-control" name="validity_date" id="txt_validity" required>
                        </div>

                        <div class="form-group">
                            <label for="txt_type">Type</label>
                            <select class="form-control" id="txt_type" name="type" required>
                                <option value="" disabled selected>Please select a announcement type</option>
                                <option value="News">News</option>
                                <option value="Events">Events</option>
                                <option value="Announcements">Announcements</option>
                            </select>
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

    <div id="modal_announcement_form_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_announcement_update">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="txt_title_update">Title</label>
                            <input type="text" class="form-control" id="txt_title_update" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_announcement">Announcement</label>
                            <textarea type="text" class="form-control" id="txt_announcement_update" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txt_bday">Validity Date</label>
                            <input type="date" class="form-control" id="txt_validity_update" required>
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
    <script src="../scripts/announcement.js"></script>

</body>

</html>