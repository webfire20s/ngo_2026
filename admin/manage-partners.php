<?php
include 'includes/auth.php';
include 'includes/db.php';

/* ADD PARTNER */
if (isset($_POST['add_partner'])) {
    $name = trim($_POST['partner_name']);
    $logo = null;

    if (!empty($_FILES['logo']['name'])) {
        $logo = time() . '_' . $_FILES['logo']['name'];
        move_uploaded_file($_FILES['logo']['tmp_name'], "../uploads/partners/" . $logo);
    }

    $stmt = $conn->prepare(
        "INSERT INTO partners (partner_name, logo) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $name, $logo);
    $stmt->execute();
}

/* DELETE */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM partners WHERE id=$id");
}

/* TOGGLE */
if (isset($_GET['toggle'])) {
    $id = (int)$_GET['toggle'];
    $conn->query("UPDATE partners SET status = IF(status=1,0,1) WHERE id=$id");
}

/* FETCH */
$partners = $conn->query("SELECT * FROM partners ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Partners</title>

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

<h3 class="font-weight-bold mb-4">Manage Partners</h3>

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">

<h4 class="card-title">Add Partner</h4>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Partner Name</label>
        <input type="text" name="partner_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Logo (optional)</label>
        <input type="file" name="logo" class="form-control">
    </div>

    <button name="add_partner" class="btn btn-primary">Add Partner</button>
</form>

</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">

<h4 class="card-title">Partners List</h4>

<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
    <th>Name</th>
    <th>Logo</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

<?php while ($row = $partners->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['partner_name']) ?></td>
    <td>
        <?php if ($row['logo']): ?>
            <img src="../uploads/partners/<?= $row['logo'] ?>" height="40">
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
           onclick="return confirm('Delete partner?')"
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
