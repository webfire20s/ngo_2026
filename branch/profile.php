<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/*
|--------------------------------------------------------------------------
| Logged In Branch Manager
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT
        u.*,
        b.branch_name,
        b.branch_code,
        b.city,
        b.district,
        b.state,
        b.status AS branch_status
    FROM users u
    LEFT JOIN branches b
        ON u.branch_id = b.id
    WHERE u.id = ?
    LIMIT 1
");

$stmt->execute([$_SESSION['user_id']]);

$user = $stmt->fetch();

if (!$user) {
    die('User not found');
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    try {

        $stmt = $pdo->prepare("
            UPDATE users
            SET
                name = ?,
                email = ?,
                phone = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $name,
            $email,
            $phone,
            $_SESSION['user_id']
        ]);

        $success = "Profile updated successfully.";

        $stmt = $pdo->prepare("
            SELECT
                u.*,
                b.branch_name,
                b.branch_code,
                b.city,
                b.district,
                b.state,
                b.status AS branch_status
            FROM users u
            LEFT JOIN branches b
                ON u.branch_id = b.id
            WHERE u.id = ?
            LIMIT 1
        ");

        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();

    } catch(Exception $e) {

        $error = $e->getMessage();

    }
}

$password_success = '';
$password_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {

    $current_password = $_POST['current_password'] ?? '';
    $new_password     = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {

        $password_error = "All password fields are required.";

    } elseif ($new_password !== $confirm_password) {

        $password_error = "New passwords do not match.";

    } elseif (strlen($new_password) < 6) {

        $password_error = "Password must be at least 6 characters.";

    } else {

        $stmt = $pdo->prepare("
            SELECT password
            FROM users
            WHERE id = ?
        ");

        $stmt->execute([$_SESSION['user_id']]);

        $dbUser = $stmt->fetch();

        if (!password_verify($current_password, $dbUser['password'])) {

            $password_error = "Current password is incorrect.";

        } else {

            $newHash = password_hash($new_password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("
                UPDATE users
                SET password = ?
                WHERE id = ?
            ");

            $stmt->execute([
                $newHash,
                $_SESSION['user_id']
            ]);

            $password_success = "Password updated successfully.";
        }
    }
}
?>

<div class="space-y-6">


<!-- Header -->

<div class="border-b border-slate-200 pb-5">

    <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
        Branch Account
    </span>

    <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
        My Profile
    </h1>

    <p class="text-sm text-slate-500 mt-2">
        View your account and branch details.
    </p>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Profile Card -->

    <div class="space-y-6">

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">

            <div class="flex flex-col items-center text-center">

                <?php if (!empty($user['profile_photo'])): ?>

                    <img
                        src="../uploads/profile/<?= htmlspecialchars($user['profile_photo']) ?>"
                        class="w-24 h-24 rounded-full object-cover border border-slate-200">

                <?php else: ?>

                    <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center text-3xl font-semibold text-slate-600">
                        <?= strtoupper(substr($user['name'],0,1)) ?>
                    </div>

                <?php endif; ?>

                <h2 class="mt-4 text-xl font-semibold text-slate-900">
                    <?= htmlspecialchars($user['name']) ?>
                </h2>

                <p class="text-slate-500 text-sm">
                    Branch Manager
                </p>

            </div>

        </div>

        <!-- Documents -->

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-3">

            <h3 class="text-xs font-bold tracking-wider text-slate-400 uppercase">
                Documents
            </h3>

            <a href="../generate_certificate.php"
               target="_blank"
               class="flex items-center justify-between group bg-slate-50 hover:bg-slate-100 border border-slate-200 text-sm text-slate-700 px-4 py-3 rounded-lg transition">

                <span>Download Certificate</span>

                <span class="text-slate-400">
                    →
                </span>

            </a>

            <a href="../generate_id_card.php"
               target="_blank"
               class="flex items-center justify-between group bg-slate-50 hover:bg-slate-100 border border-slate-200 text-sm text-slate-700 px-4 py-3 rounded-lg transition">

                <span>Download ID Card</span>

                <span class="text-slate-400">
                    →
                </span>

            </a>

        </div>

    </div>

    <!-- Details -->

    <div class="lg:col-span-2 space-y-6">

        <!-- Personal Information -->

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm">

            <div class="px-6 py-4 border-b border-slate-200">

                <h3 class="font-semibold text-slate-800">
                    Personal Information
                </h3>

            </div>

            <form method="POST" class="p-6">

                <?php if($success): ?>
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        <?= $success ?>
                    </div>
                <?php endif; ?>

                <?php if($error): ?>
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="<?= htmlspecialchars($user['name']) ?>"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?= htmlspecialchars($user['email']) ?>"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="<?= htmlspecialchars($user['phone']) ?>"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Role
                        </label>

                        <input
                            type="text"
                            value="Branch Manager"
                            readonly
                            class="w-full bg-slate-100 border border-slate-300 rounded-lg px-4 py-3 text-slate-500">
                    </div>

                </div>

                <div class="mt-6">

                    <button
                        type="submit"
                        name="update_profile"
                        class="px-5 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

        <!-- Branch Information -->

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm">

            <div class="px-6 py-4 border-b border-slate-200">

                <h3 class="font-semibold text-slate-800">
                    Branch Information
                </h3>

            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        Branch Name
                    </label>

                    <p class="mt-1 text-slate-800">
                        <?= htmlspecialchars($user['branch_name']) ?>
                    </p>
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        Branch Code
                    </label>

                    <p class="mt-1 text-slate-800">
                        <?= htmlspecialchars($user['branch_code']) ?>
                    </p>
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        City
                    </label>

                    <p class="mt-1 text-slate-800">
                        <?= htmlspecialchars($user['city']) ?>
                    </p>
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        District
                    </label>

                    <p class="mt-1 text-slate-800">
                        <?= htmlspecialchars($user['district']) ?>
                    </p>
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        State
                    </label>

                    <p class="mt-1 text-slate-800">
                        <?= htmlspecialchars($user['state']) ?>
                    </p>
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-slate-400">
                        Status
                    </label>

                    <p class="mt-2">

                        <?php if($user['branch_status']=='active'): ?>

                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                Active
                            </span>

                        <?php else: ?>

                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                Inactive
                            </span>

                        <?php endif; ?>

                    </p>
                </div>

            </div>

        </div>
       
        <!-- Chnage Password -->

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm">

            <div class="px-6 py-4 border-b border-slate-200">

                <h3 class="font-semibold text-slate-800">
                    Change Password
                </h3>

            </div>

            <form method="POST" class="p-6">

                <?php if($password_success): ?>

                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        <?= $password_success ?>
                    </div>

                <?php endif; ?>

                <?php if($password_error): ?>

                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <?= $password_error ?>
                    </div>

                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Current Password
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            required
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="new_password"
                            required
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 mb-2">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="confirm_password"
                            required
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                </div>

                <div class="mt-6">

                    <button
                        type="submit"
                        name="change_password"
                        class="px-5 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition">

                        Update Password

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>
