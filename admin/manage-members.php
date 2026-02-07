<?php
session_start();
include '../includes/db.php';

/* ADD MEMBER */
if (isset($_POST['add_member'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];

    $photo = $_FILES['photo']['name'];
    $tmp  = $_FILES['photo']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/members/" . $photo);

    $stmt = $conn->prepare(
        "INSERT INTO members (name, designation, photo) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $designation, $photo);
    $stmt->execute();
}

/* DELETE MEMBER */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    // Get member photo to delete the file from the server
    $res = $conn->query("SELECT photo FROM members WHERE id = $id");
    if ($res && $row = $res->fetch_assoc()) {
        $filePath = "../uploads/members/" . $row['photo'];
        if (!empty($row['photo']) && file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Delete member record from database
    $conn->query("DELETE FROM members WHERE id = $id");

    header("Location: manage-members.php");
    exit;
}

$members = $conn->query("SELECT * FROM members ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Members</title>
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
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h3 class="font-weight-bold">Manage Members</h3>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Add Member</h4>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control" placeholder="Member Name" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="designation" class="form-control" placeholder="Designation" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="photo" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" name="add_member" class="btn btn-primary mt-3">Add Member</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($members->num_rows > 0):
                                    $i = 1;
                                    while ($row = $members->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= htmlspecialchars($row['name']); ?></td>
                                        <td><?= htmlspecialchars($row['designation']); ?></td>
                                        <td>
                                            <img src="../uploads/members/<?= $row['photo']; ?>" width="60" style="height:auto; border-radius:0;">
                                        </td>
                                        <td>
                                            <a href="manage-members.php?delete=<?= $row['id']; ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Are you sure you want to delete this member?')">
                                               Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No members found</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../partials/footer.php'; ?>
        </div>
    </div>
</div>

<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>
</body>
</html>