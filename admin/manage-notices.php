<?php
include 'includes/auth.php';
include '../includes/db.php';

/* DELETE NOTICE */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    // delete image if exists
    $img = $conn->query("SELECT photo FROM notices WHERE id=$id")->fetch_assoc();
    if (!empty($img['photo'])) {
        @unlink("../uploads/" . $img['photo']);
    }

    $conn->query("DELETE FROM notices WHERE id=$id");
    header("Location: manage-notices.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Notices</title>

    <!-- PURPLE THEME CSS -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container-scroller">

    <?php include '../partials/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">

        <?php include '../partials/sidebar.php'; ?>

        <div class="main-panel">
            <div class="content-wrapper">

                <!-- HEADER -->
                <div class="row mb-4">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h3 class="font-weight-bold">Manage Notices</h3>
                        <a href="add-notice.php" class="btn btn-primary">+ Add Notice</a>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $res = $conn->query("SELECT * FROM notices ORDER BY id DESC");
                                    $i = 1;

                                    if ($res->num_rows == 0):
                                    ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                No notices found.
                                            </td>
                                        </tr>
                                    <?php
                                    endif;

                                    while ($row = $res->fetch_assoc()):
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($row['title']) ?></td>
                                            <td><?= substr(strip_tags($row['description']), 0, 80) ?>...</td>
                                            <td>
                                                <?php if (!empty($row['photo'])) { ?>
                                                    <img src="../uploads/<?= htmlspecialchars($row['photo']) ?>" width="70">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="edit-notice.php?id=<?= $row['id'] ?>"
                                                   class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>

                                                <a href="manage-notices.php?delete=<?= $row['id'] ?>"
                                                   onclick="return confirm('Delete this notice?')"
                                                   class="btn btn-sm btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php include '../partials/footer.php'; ?>

        </div>
    </div>
</div>

<!-- PURPLE JS -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>

</body>
</html>
