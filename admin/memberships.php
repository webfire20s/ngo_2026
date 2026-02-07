<?php
include 'includes/auth.php';
include '../includes/db.php';

$result = $conn->query(
    "SELECT * FROM memberships ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Applications</title>

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

                <h4 class="card-title">Membership Applications</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['full_name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['membership_type']) ?></td>
                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
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
