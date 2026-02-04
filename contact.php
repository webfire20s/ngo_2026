<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    $success = true;
}
?>

<main>
<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Contact Us</h1>
    <p class="text-xl mt-4 max-w-3xl mx-auto">
        We’d love to hear from you.
    </p>
</section>

<section class="py-20 bg-white">
<div class="max-w-4xl mx-auto px-4">
    <?php if (!empty($success)): ?>
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
            Message sent successfully!
        </div>
    <?php endif; ?>

    <form method="POST" class="bg-gray-50 p-8 rounded-lg shadow-lg space-y-6">
        <input type="text" name="name" placeholder="Your Name" required
               class="w-full border rounded px-4 py-3">

        <input type="email" name="email" placeholder="Your Email" required
               class="w-full border rounded px-4 py-3">

        <textarea name="message" rows="5" placeholder="Your Message" required
                  class="w-full border rounded px-4 py-3"></textarea>

        <button class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700">
            Send Message
        </button>
    </form>
</div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
