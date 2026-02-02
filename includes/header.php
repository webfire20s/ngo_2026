<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?? 'Neel Foundation' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="navbar">
    <div class="container navbar-inner">
        <div class="logo">
            <a href="index.php">NEEL FOUNDATION</a>
        </div>

        <nav class="nav-links">
            <a href="index.php" class="<?= ($active=='home')?'active':'' ?>">Home</a>
            <a href="about.php" class="<?= ($active=='home')?'active':'' ?>">About Us</a>
            <a href="members.php" class="<?= ($active=='members')?'active':'' ?>">Members</a>
            <a href="activities.php" class="<?= ($active=='activities')?'active':'' ?>">Activities</a>
            <a href="courses.php" class="<?= ($active=='courses')?'active':'' ?>">Courses</a>
            <a href="gallery.php" class="<?= ($active=='gallery')?'active':'' ?>">Gallery</a>
            <a href="notices.php" class="<?= ($active=='notices')?'active':'' ?>">Notices</a>
            <a href="contact.php" class="<?= ($active=='members')?'active':'' ?>">Contact</a>
        </nav>
    </div>
</header>
