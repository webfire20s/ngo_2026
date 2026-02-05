<?php
include 'includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Bootstrap & Purple Admin CSS -->
    <!-- REQUIRED CSS -->
<link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <div class="container-scroller">
            <?php include '../partials/sidebar.php'; ?>

        <div class="container-fluid page-body-wrapper">
            <?php include '../partials/navbar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="font-weight-bold">Admin Dashboard</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Courses</h4>
                                    <a href="manage-courses.php" class="btn btn-light mt-2">Go</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Products</h4>
                                    <a href="manage-products.php" class="btn btn-light mt-2">Go</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-warning text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Research</h4>
                                    <a href="manage-research.php" class="btn btn-light mt-2">Go</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Contact Messages</h4>
                                    <a href="contact-messages.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Members</h4>
                                    <a href="manage-members.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-warning text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Memberships</h4>
                                    <a href="memberships.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Events</h4>
                                    <a href="manage-events.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Gallery</h4>
                                    <a href="manage-gallery.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Notices</h4>
                                    <a href="manage-notices.php" class="btn btn-light mt-2">View</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-danger text-white text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Logout</h4>
                                    <a href="logout.php" class="btn btn-light mt-2">Exit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <?php include '../partials/footer.php'; ?>


            </div>
            <!-- main-panel ends -->

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller ends -->

    <!-- JS files -->
    <!-- REQUIRED JS -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>


</body>
</html>
