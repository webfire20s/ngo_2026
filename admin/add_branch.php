<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $stmt = $pdo->prepare("
        INSERT INTO branches
        (
            branch_name,
            branch_code,
            state,
            district,
            city,
            address,
            phone,
            email,
            status
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['branch_name'],
        $_POST['branch_code'],
        $_POST['state'],
        $_POST['district'],
        $_POST['city'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['status']
    ]);

    header("Location: branches.php");
    exit;
}

require '../includes/admin_header.php';
require '../includes/sidebar.php';
?>

<div class="max-w-3xl">

<h2 class="text-2xl font-bold mb-6">
Add Branch
</h2>

<form method="POST" class="space-y-4">

<input type="text"
       name="branch_name"
       placeholder="Branch Name"
       required
       class="w-full border p-3">

<input type="text"
       name="branch_code"
       placeholder="Branch Code"
       required
       class="w-full border p-3">

<input type="text"
       name="state"
       placeholder="State"
       class="w-full border p-3">

<input type="text"
       name="district"
       placeholder="District"
       class="w-full border p-3">

<input type="text"
       name="city"
       placeholder="City"
       class="w-full border p-3">

<textarea name="address"
          placeholder="Address"
          class="w-full border p-3"></textarea>

<input type="text"
       name="phone"
       placeholder="Phone"
       class="w-full border p-3">

<input type="email"
       name="email"
       placeholder="Email"
       class="w-full border p-3">

<select name="status"
        class="w-full border p-3">

    <option value="active">Active</option>
    <option value="inactive">Inactive</option>

</select>

<button class="bg-black text-white px-6 py-3 rounded">
Save Branch
</button>

</form>

</div>

<?php require '../includes/footer.php'; ?>