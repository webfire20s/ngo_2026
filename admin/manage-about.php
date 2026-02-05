<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include '../includes/db.php';

/* FETCH ABOUT CONTENT */
$about = [];
$res = $conn->query("SELECT * FROM about_content LIMIT 1");
if ($res && $res->num_rows) {
    $about = $res->fetch_assoc();
}

/* UPDATE ABOUT */
if (isset($_POST['save_about'])) {
    $stmt = $conn->prepare("
        UPDATE about_content SET
        hero_title=?,
        hero_subtitle=?,
        story_heading=?,
        story_p1=?,
        story_p2=?,
        story_p3=?,
        mission_text=?,
        vision_text=?
        WHERE id=1
    ");

    $stmt->bind_param(
        "ssssssss",
        $_POST['hero_title'],
        $_POST['hero_subtitle'],
        $_POST['story_heading'],
        $_POST['story_p1'],
        $_POST['story_p2'],
        $_POST['story_p3'],
        $_POST['mission_text'],
        $_POST['vision_text']
    );
    $stmt->execute();

    header("Location: manage-about.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage About Page</title>

    <!-- Purple Admin CSS -->
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

                <!-- PAGE HEADER -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="font-weight-bold">Manage About Page</h3>
                    </div>
                </div>

                <!-- NAVIGATION BUTTONS -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <a href="manage-about.php" class="btn btn-primary mr-2">
                            About Content
                        </a>
                        <a href="manage-team.php" class="btn btn-outline-primary mr-2">
                            Team Members
                        </a>
                        <a href="manage-partners.php" class="btn btn-outline-primary">
                            Partners
                        </a>
                    </div>
                </div>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">
                        About page updated successfully
                    </div>
                <?php endif; ?>

                <!-- ABOUT FORM -->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">About Page Content</h4>

                                <form method="POST">

                                    <div class="form-group">
                                        <label>Hero Title</label>
                                        <input type="text" name="hero_title" class="form-control"
                                               value="<?= htmlspecialchars($about['hero_title'] ?? '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Hero Subtitle</label>
                                        <input type="text" name="hero_subtitle" class="form-control"
                                               value="<?= htmlspecialchars($about['hero_subtitle'] ?? '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Story Heading</label>
                                        <input type="text" name="story_heading" class="form-control"
                                               value="<?= htmlspecialchars($about['story_heading'] ?? '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Story Paragraph 1</label>
                                        <textarea name="story_p1" rows="3"
                                                  class="form-control"><?= htmlspecialchars($about['story_p1'] ?? '') ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Story Paragraph 2</label>
                                        <textarea name="story_p2" rows="3"
                                                  class="form-control"><?= htmlspecialchars($about['story_p2'] ?? '') ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Story Paragraph 3</label>
                                        <textarea name="story_p3" rows="3"
                                                  class="form-control"><?= htmlspecialchars($about['story_p3'] ?? '') ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Mission Text</label>
                                        <textarea name="mission_text" rows="3"
                                                  class="form-control"><?= htmlspecialchars($about['mission_text'] ?? '') ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Vision Text</label>
                                        <textarea name="vision_text" rows="3"
                                                  class="form-control"><?= htmlspecialchars($about['vision_text'] ?? '') ?></textarea>
                                    </div>

                                    <button type="submit" name="save_about" class="btn btn-primary">
                                        Save Changes
                                    </button>

                                </form>

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
