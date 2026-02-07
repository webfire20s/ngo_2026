<?php
include 'includes/auth.php';
include 'includes/db.php';

// ADD COURSE
if (isset($_POST['add_course'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    $stmt = $conn->prepare("INSERT INTO courses (course_title, course_description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();
}

// DELETE COURSE
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id = $id");
}

// TOGGLE STATUS
if (isset($_GET['toggle'])) {
    $id = (int) $_GET['toggle'];
    $conn->query("UPDATE courses SET status = IF(status=1,0,1) WHERE id = $id");
}

// FETCH COURSES
$courses = $conn->query("SELECT * FROM courses ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Courses</title>

    <!-- Purple Admin CSS -->
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

                <!-- PAGE TITLE -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="font-weight-bold">Manage Courses</h3>
                    </div>
                </div>

                <!-- ADD COURSE CARD -->
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Course</h4>

                                <form method="POST">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Course Description</label>
                                        <textarea name="description" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <button type="submit" name="add_course" class="btn btn-primary">
                                        Add Course
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- COURSE LIST TABLE -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Courses</h4>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($row = $courses->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['course_title']) ?></td>
                                                <td>
                                                    <span class="badge <?= $row['status'] ? 'badge-success' : 'badge-secondary' ?>">
                                                        <?= $row['status'] ? 'Active' : 'Hidden' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="?toggle=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                                        Toggle
                                                    </a>
                                                    <a href="?delete=<?= $row['id'] ?>"
                                                       onclick="return confirm('Delete this course?')"
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

            </div>

            <?php include '../partials/footer.php'; ?>

        </div>
    </div>
</div>

<!-- Purple Admin JS -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>

</body>
</html>
