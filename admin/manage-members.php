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

    // Get member photo
    $res = $conn->query("SELECT photo FROM members WHERE id = $id");
    if ($res && $row = $res->fetch_assoc()) {
        if (!empty($row['photo']) && file_exists("../uploads/members/" . $row['photo'])) {
            unlink("../uploads/members/" . $row['photo']);
        }
    }

    // Delete member record
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

    <!-- REQUIRED CSS -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<div class="container-scroller">

    <!-- SIDEBAR -->
    <?php include '../partials/sidebar.php'; ?>

    <div class="container-fluid page-body-wrapper">

        <!-- NAVBAR -->
        <?php include '../partials/navbar.php'; ?>

        <!-- MAIN PANEL -->
        <div class="main-panel">
            <div class="content-wrapper">

                <!-- PAGE TITLE -->
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

                            <button type="submit" name="add_member" class="btn btn-primary mt-3">
                                Add Member
                            </button>
                        </form>
                    </div>
                </div>


                <!-- MEMBERS TABLE -->
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
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $result = $conn->query("SELECT * FROM members ORDER BY id DESC");
                                if ($result->num_rows > 0):
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= htmlspecialchars($row['name']); ?></td>
                                        <td><?= htmlspecialchars($row['designation']); ?></td>
                                        <td>
                                            <img src="../uploads/<?= $row['photo']; ?>" width="60">
                                        </td>
                                    </tr>
                                <?php
                                    endwhile;
                                else:
                                ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            No members found
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

            <td>
                <a href="manage-members.php?delete=<?php echo $row['id']; ?>"
                    onclick="return confirm('Delete this member?')"
                    class="btn btn-danger btn-sm">
                    Delete
                </a>


            </td>


            <!-- FOOTER -->
            <?php include '../partials/footer.php'; ?>
        </div>
    </div>
</div>

    <!-- REQUIRED JS -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>

</body>
</html>
