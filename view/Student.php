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
            <button style='font-size:24px'>Save <i class='far fa-save'></i></button>
            <table class= "table table-bordered table-striped table-hover" id="tbl_students">
                <thead>
                    <tr>
                        <td>Name<td>
                        <td>Address<td>
                        <td>Birthday<td>
                        <td>Email<td>
                        <td>Phone Number<td>
                        <td>Action<td>
                    </tr>
                </thead>
                <tbody id="tbl_students_body"></tbody>
            </table>

            </div>
        </section>

    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <?php include "../template/scripts.php"; ?>

</body>

</html>