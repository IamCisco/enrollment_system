
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
                    <h2>Homepage Background</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->
        
        <center><button class="btn btn-success" data-toggle="modal" data-target="#modal_update_background">Change Homepage Background</button></center><br>
        <section class="inner-page" id="hero">
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Modal -->
    <div id="modal_update_background" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="frm_background_update" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Background Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file_image">Image</label>
                            <input type="file" name="input_file" class="form-control-file border" id="file_image_update" required >
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
    <script src="../scripts/content.js"></script>

</body>

</html>