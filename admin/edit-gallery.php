<?php
include 'includes/auth.php';
include '../includes/db.php';

$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM gallery WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $photo = $data['photo'];

    if (!empty($_FILES['photo']['name'])) {
        if (!empty($photo)) {
            @unlink("../uploads/" . $photo);
        }
        $photo = time() . '_' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/" . $photo);
    }

    $stmt = $conn->prepare(
        "UPDATE gallery SET title=?, description=?, photo=? WHERE id=?"
    );
    $stmt->bind_param("sssi", $title, $description, $photo, $id);
    $stmt->execute();

    header("Location: manage-gallery.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Gallery Item</title>
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

<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Gallery Item</h4>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="5" class="form-control" required><?= htmlspecialchars($data['description']) ?></textarea>
    </div>

    <div class="form-group">
        <label>Photo</label><br>
        <?php if ($data['photo']) { ?>
            <img src="../uploads/<?= $data['photo'] ?>" width="100" class="mb-2"><br>
        <?php } ?>
        <input type="file" name="photo" class="form-control">
    </div>

    <button name="update" class="btn btn-warning">Update</button>
    <a href="manage-gallery.php" class="btn btn-light">Cancel</a>
</form>

</div>
</div>

</div>
<?php include '../partials/footer.php'; ?>
</div>
</div>
</div>

<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/template.js"></script>
</body>
</html>
