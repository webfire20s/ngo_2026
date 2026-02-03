<?php
$page_title = "Products | Neel Foundation";
$active = "products";

include 'includes/db.php';
include 'includes/header.php';

$products = $conn->query("SELECT * FROM products WHERE status = 1 ORDER BY id DESC");
?>

<!-- Main Content -->
<main>
    <!-- Hero Section -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Products</h1>
            <p class="text-xl max-w-3xl mx-auto">
                Fresh fish and value-added fish products from our sustainable aquaculture practices
            </p>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Product Categories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Quality products from our sustainable fish farming and processing units
                </p>
            </div>

            <!-- ✅ Dynamic Product Cards Start -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while($product = $products->fetch_assoc()): ?>
                <div class="product-card bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-2">
                        <?= htmlspecialchars($product['product_title']) ?>
                    </h3>

                    <p class="text-gray-600 mb-4">
                        <?= nl2br(htmlspecialchars($product['product_description'])) ?>
                    </p>

                    <span class="text-green-600 font-bold">
                        <?= htmlspecialchars($product['price']) ?>
                    </span>
                </div>
            <?php endwhile; ?>
            </div>
            <!-- ✅ Dynamic Product Cards End -->

        </div>
    </section>

    <!-- Quality Assurance -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Quality Assurance</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our commitment to quality and food safety
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Certified Quality</h3>
                    <p class="text-gray-600">All products are quality certified and meet food safety standards</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Organic Farming</h3>
                    <p class="text-gray-600">Sustainable farming practices without harmful chemicals</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-snowflake text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Cold Chain</h3>
                    <p class="text-gray-600">Maintained cold chain for freshness and quality</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Fresh Delivery</h3>
                    <p class="text-gray-600">Prompt delivery ensuring product freshness</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ordering Information -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">How to Order</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Simple ordering process for our quality products
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-2xl">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Select Products</h3>
                    <p class="text-gray-600">Choose from our wide range of fresh and processed fish products</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-2xl">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Place Order</h3>
                    <p class="text-gray-600">Call or WhatsApp us with your order details</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-2xl">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Confirm Payment</h3>
                    <p class="text-gray-600">Pay online or cash on delivery</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-2xl">4</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Receive Delivery</h3>
                    <p class="text-gray-600">Get fresh products delivered to your doorstep</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact for Orders -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Place Your Order Today</h2>
            <p class="text-xl mb-8">
                Get fresh, quality fish products delivered to your doorstep
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                <a href="tel:+911234567890" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full font-semibold transition-colors flex items-center justify-center">
                    <i class="fas fa-phone mr-2"></i>
                    Call Us: +91 12345 67890
                </a>
                <a href="https://wa.me/911234567890?text=Hello%20Neelkranti%20Foundation%2C%20I%20would%20like%20to%20order%20fish%20products" 
                   class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-semibold transition-colors flex items-center justify-center"
                   target="_blank">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp Us
                </a>
            </div>
            <div class="mt-8 text-white">
                <p class="mb-2">📧 Email: orders@neelkrantifoundation.org.in</p>
                <p>🕐 Delivery Time: 24-48 hours</p>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
