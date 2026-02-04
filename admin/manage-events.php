<?php
include 'includes/auth.php';
include '../includes/db.php';

/* DELETE EVENT */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    $img = $conn->query("SELECT photo FROM events WHERE id=$id")->fetch_assoc();
    if (!empty($img['photo'])) {
        @unlink("../uploads/" . $img['photo']);
    }

    $conn->query("DELETE FROM events WHERE id=$id");
    header("Location: manage-events.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Events</title>

    <!-- PURPLE THEME CSS -->
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

                <div class="row mb-4">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h3 class="font-weight-bold">Manage Events</h3>
                        <a href="add-event.php" class="btn btn-primary">+ Add Event</a>
                    </div>
                </div>

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
                                    $res = $conn->query("SELECT * FROM events ORDER BY id DESC");
                                    $i = 1;
                                    while ($row = $res->fetch_assoc()):
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($row['title']) ?></td>
                                            <td><?= substr(strip_tags($row['description']), 0, 80) ?>...</td>
                                            <td>
                                                <?php if ($row['photo']) { ?>
                                                    <img src="../uploads/<?= $row['photo'] ?>" width="70">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="edit-event.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="manage-events.php?delete=<?= $row['id'] ?>"
                                                   onclick="return confirm('Delete this event?')"
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
