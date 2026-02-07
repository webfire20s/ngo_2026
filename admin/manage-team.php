<?php
include 'includes/auth.php';
include 'includes/db.php';

/* ADD TEAM MEMBER */
if (isset($_POST['add_member'])) {
    $name = trim($_POST['name']);
    $designation = trim($_POST['designation']);
    $bio = trim($_POST['bio']);

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/team/" . $image);
    }

    $stmt = $conn->prepare(
        "INSERT INTO team_members (name, designation, bio, image) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $name, $designation, $bio, $image);
    $stmt->execute();
}

/* DELETE */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM team_members WHERE id=$id");
}

/* TOGGLE STATUS */
if (isset($_GET['toggle'])) {
    $id = (int)$_GET['toggle'];
    $conn->query("UPDATE team_members SET status = IF(status=1,0,1) WHERE id=$id");
}

/* FETCH */
$team = $conn->query("SELECT * FROM team_members ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Team</title>

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

<h3 class="font-weight-bold mb-4">Manage Team Members</h3>

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">

<h4 class="card-title">Add Team Member</h4>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Designation</label>
        <input type="text" name="designation" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label>Image (optional)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button name="add_member" class="btn btn-primary">Add Member</button>
</form>

</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">

<h4 class="card-title">Team List</h4>

<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
    <th>Name</th>
    <th>Designation</th>
    <th>Image</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

<?php while ($row = $team->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['designation']) ?></td>
    <td>
        <?php if ($row['image']): ?>
            <img src="../uploads/team/<?= $row['image'] ?>" height="40">
        <?php else: ?>
            —
        <?php endif; ?>
    </td>
    <td>
        <span class="badge <?= $row['status'] ? 'badge-success' : 'badge-secondary' ?>">
            <?= $row['status'] ? 'Active' : 'Hidden' ?>
        </span>
    </td>
    <td>
        <a href="?toggle=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Toggle</a>
        <a href="?delete=<?= $row['id'] ?>"
           onclick="return confirm('Delete member?')"
           class="btn btn-sm btn-danger">Delete</a>
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

<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>
</body>
</html>
