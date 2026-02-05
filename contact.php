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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if (!empty($success)): ?>
            <div class="mb-8 p-4 bg-green-100 text-green-700 rounded text-center">
                Message sent successfully!
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <!-- Contact Form (UNCHANGED LOGIC) -->
            <div>
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

            <!-- Map & Contact Info -->
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <iframe
                        class="w-full h-80 border-0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q=Raviraj%20Park,%20Parbhani,%20Maharashtra%20431491&output=embed">
                    </iframe>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Our Address
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Raviraj Park,<br>
                        Parbhani, Maharashtra – 431491
                    </p>

                    <div class="mt-4 flex items-center gap-3 text-gray-700">
                        <i class="fas fa-phone-alt text-blue-600"></i>
                        <span class="font-medium">+91 9284476047</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
