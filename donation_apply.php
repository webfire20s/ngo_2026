<?php
// donation_apply.php
?>

<?php include 'includes/header.php'; ?>

<main>

<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4">

        <div class="bg-white shadow-lg rounded-2xl p-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-purple-700">
                Make a Donation
            </h2>

            <form action="donation_submit.php" method="POST" class="space-y-6">

                <input type="text" name="name" required
                       placeholder="Full Name"
                       class="w-full border rounded px-4 py-3">

                <input type="email" name="email" required
                       placeholder="Email Address"
                       class="w-full border rounded px-4 py-3">

                <input type="text" name="phone" required
                       placeholder="Phone Number"
                       class="w-full border rounded px-4 py-3">

                <input type="number" name="amount" required min="1"
                       placeholder="Donation Amount (₹)"
                       class="w-full border rounded px-4 py-3">

                <select name="donation_type" required
                        class="w-full border rounded px-4 py-3">
                    <option value="">Select Donation Type</option>
                    <option value="General Donation">General Donation</option>
                    <option value="Education Support">Education Support</option>
                    <option value="Medical Support">Medical Support</option>
                    <option value="Research Funding">Research Funding</option>
                </select>

                <textarea name="message" rows="4"
                          placeholder="Message (Optional)"
                          class="w-full border rounded px-4 py-3"></textarea>

                <button
                    class="bg-purple-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-purple-700 transition w-full">
                    Donate Now
                </button>

            </form>

        </div>

    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
