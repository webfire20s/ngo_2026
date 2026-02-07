<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include '../includes/db.php';

/* ADD PRODUCT */
if (isset($_POST['add_product'])) {
    $title = $_POST['title'];
    $desc  = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare(
        "INSERT INTO products (product_title, product_description, price) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $title, $desc, $price);
    $stmt->execute();

    header("Location: manage-products.php");
    exit;
}

/* DELETE PRODUCT */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: manage-products.php");
    exit;
}

/* TOGGLE STATUS */
if (isset($_GET['toggle'])) {
    $id = (int)$_GET['toggle'];
    $conn->query("UPDATE products SET status = IF(status=1,0,1) WHERE id = $id");
    header("Location: manage-products.php");
    exit;
}

$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>

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
                        <h3 class="font-weight-bold">Manage Products</h3>
                    </div>
                </div>

                <!-- ADD PRODUCT -->
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Product</h4>

                                <form method="POST">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea name="description" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Price (₹)</label>
                                        <input type="text" name="price" class="form-control" required>
                                    </div>

                                    <button type="submit" name="add_product" class="btn btn-primary">
                                        Add Product
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS TABLE -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Products</h4>

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
                                        <?php while($row = $products->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['product_title']) ?></td>
                                                <td>
                                                    <span class="badge <?= $row['status'] ? 'badge-success' : 'badge-secondary' ?>">
                                                        <?= $row['status'] ? 'Active' : 'Inactive' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="?toggle=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                                        Toggle
                                                    </a>
                                                    <a href="?delete=<?= $row['id'] ?>"
                                                       onclick="return confirm('Delete product?')"
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
