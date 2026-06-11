<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';


$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT *
    FROM branches
    WHERE id=?
");
$stmt->execute([$id]);

$branch = $stmt->fetch();

if(!$branch){
    echo "<div class='p-6'>Branch not found.</div>";
    require '../includes/footer.php';
    exit;
}

/* UPDATE */
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $branch_name = trim($_POST['branch_name']);
    $branch_code = trim($_POST['branch_code']);

    $state    = trim($_POST['state']);
    $district = trim($_POST['district']);
    $city     = trim($_POST['city']);

    $address  = trim($_POST['address']);

    $phone    = trim($_POST['phone']);
    $email    = trim($_POST['email']);

    $status   = $_POST['status'];

    $stmt = $pdo->prepare("
        UPDATE branches
        SET
            branch_name=?,
            branch_code=?,
            state=?,
            district=?,
            city=?,
            address=?,
            phone=?,
            email=?,
            status=?
        WHERE id=?
    ");

    $stmt->execute([
        $branch_name,
        $branch_code,
        $state,
        $district,
        $city,
        $address,
        $phone,
        $email,
        $status,
        $id
    ]);

    header("Location: branches.php");
    exit;
}
require '../includes/admin_header.php';
require '../includes/sidebar.php';  
?>

<div class="max-w-4xl">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            Edit Branch
        </h1>

        <a href="branches.php"
           class="px-4 py-2 bg-gray-200 rounded">
            Back
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form method="POST">

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="block mb-1">Branch Name</label>
                    <input type="text"
                           name="branch_name"
                           required
                           value="<?= htmlspecialchars($branch['branch_name']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-1">Branch Code</label>
                    <input type="text"
                           name="branch_code"
                           required
                           value="<?= htmlspecialchars($branch['branch_code']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-1">State</label>
                    <input type="text"
                           name="state"
                           value="<?= htmlspecialchars($branch['state']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-1">District</label>
                    <input type="text"
                           name="district"
                           value="<?= htmlspecialchars($branch['district']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-1">City</label>
                    <input type="text"
                           name="city"
                           value="<?= htmlspecialchars($branch['city']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block mb-1">Phone</label>
                    <input type="text"
                           name="phone"
                           value="<?= htmlspecialchars($branch['phone']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-1">Email</label>
                    <input type="email"
                           name="email"
                           value="<?= htmlspecialchars($branch['email']) ?>"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-1">Address</label>
                    <textarea name="address"
                              rows="4"
                              class="w-full border rounded px-3 py-2"><?= htmlspecialchars($branch['address']) ?></textarea>
                </div>

                <div>
                    <label class="block mb-1">Status</label>
                    <select name="status"
                            class="w-full border rounded px-3 py-2">

                        <option value="active"
                            <?= $branch['status']=='active' ? 'selected' : '' ?>>
                            Active
                        </option>

                        <option value="inactive"
                            <?= $branch['status']=='inactive' ? 'selected' : '' ?>>
                            Inactive
                        </option>

                    </select>
                </div>

            </div>

            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded">
                    Update Branch
                </button>
            </div>

        </form>

    </div>

</div>

<?php require '../includes/footer.php'; ?>