<?php
include 'includes/auth.php';
include '../includes/db.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $photo = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . '_' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/" . $photo);
    }

    $stmt = $conn->prepare(
        "INSERT INTO notices (title, description, photo) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $title, $description, $photo);
    $stmt->execute();

    header("Location: manage-notices.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Notice</title>
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
<h4 class="card-title">Add Notice</h4>

<form method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Notice Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="5" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Photo (optional)</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <button name="submit" class="btn btn-primary">Save Notice</button>
    <a href="manage-notices.php" class="btn btn-light">Cancel</a>

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
