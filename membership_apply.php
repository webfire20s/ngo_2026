<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $membership_type = $_POST['membership_type'];
    $message = $_POST['message'];

    $stmt = $conn->prepare(
        "INSERT INTO memberships 
        (full_name, email, phone, address, membership_type, message)
        VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "ssssss",
        $full_name,
        $email,
        $phone,
        $address,
        $membership_type,
        $message
    );
    $stmt->execute();

    $success = true;
}
?>

<main>
<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Membership Application</h1>
    <p class="text-xl mt-4 max-w-3xl mx-auto">
        Become a part of Neelkranti Foundation
    </p>
</section>

<section class="py-20 bg-white">
<div class="max-w-4xl mx-auto px-4">

<?php if (!empty($success)): ?>
    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded text-center">
        Application submitted successfully!
    </div>
<?php endif; ?>

<form method="POST" class="bg-gray-50 p-8 rounded-lg shadow-lg space-y-6">

    <input type="text" name="full_name" required
           placeholder="Full Name"
           class="w-full border rounded px-4 py-3">

    <input type="email" name="email" required
           placeholder="Email Address"
           class="w-full border rounded px-4 py-3">

    <input type="text" name="phone" required
           placeholder="Phone Number"
           class="w-full border rounded px-4 py-3">

    <textarea name="address" rows="3" required
              placeholder="Full Address"
              class="w-full border rounded px-4 py-3"></textarea>

    <select name="membership_type" required
            class="w-full border rounded px-4 py-3">
        <option value="">Select Membership Type</option>
        <option value="General Member">General Member</option>
        <option value="Volunteer">Volunteer</option>
        <option value="Research Member">Research Member</option>
        <option value="Donor">Donor</option>
    </select>

    <textarea name="message" rows="4"
              placeholder="Why do you want to join? (Optional)"
              class="w-full border rounded px-4 py-3"></textarea>

    <button class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700">
        Submit Application
    </button>

</form>
</div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
