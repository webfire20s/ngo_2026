<?php
include 'includes/auth.php';
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages</title>

    <!-- REQUIRED CSS -->
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
                        <h3 class="font-weight-bold">Contact Messages</h3>
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
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT * FROM contact_messages ORDER BY id DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0):
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= htmlspecialchars($row['name']); ?></td>
                                        <td><?= htmlspecialchars($row['email']); ?></td>
                                        <td><?= nl2br(htmlspecialchars($row['message'])); ?></td>
                                        <td><?= $row['created_at'] ?? '—'; ?></td>
                                    </tr>
                                <?php
                                    endwhile;
                                else:
                                ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No contact messages found
                                        </td>
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

<!-- REQUIRED JS -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/template.js"></script>

</body>
</html>
