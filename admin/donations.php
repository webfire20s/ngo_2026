<?php
include 'includes/auth.php';
include '../includes/db.php';

/* DELETE DONATION */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM donations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: donations.php");
    exit;
}


$result = $conn->query("SELECT * FROM donations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donations</title>

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

<div class="card">
<div class="card-body">

<h4 class="card-title">Donation Records</h4>

<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Amount (₹)</th>
            <th>Type</th>
            <th>Message</th>
            <th>Date</th>
            <th>Actions</th>

        </tr>
    </thead>

    <tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= $row['amount'] ?></td>
            <td><?= htmlspecialchars($row['donation_type']) ?></td>
            <td><?= htmlspecialchars($row['message']) ?></td>
            <td><?= date("d M Y", strtotime($row['created_at'])) ?></td>
            <td>
                <a href="donations.php?delete=<?= $row['id'] ?>"
                onclick="return confirm('Are you sure you want to delete this donation?')"
                class="btn btn-sm btn-danger">
                    Delete
                </a>
            </td>

        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="8" class="text-center">No donations found</td>
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
<script src="../assets/js/template.js"></script>

</body>
</html>
