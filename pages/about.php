<?php
require_once '../includes/config.php';

$page_title = get_page_title('About Us');
$meta_description = "Learn about The Calculators Online - your one-stop destination for all types of online calculators and tools.";
$canonical_url = SITE_URL . '/pages/about.php';

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">About The Calculators Online</h1>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to The Calculators Online</h2>
        <p class="text-gray-700 mb-4">The Calculators Online is your comprehensive destination for all types of free online calculators and tools. We provide accurate, fast, and easy-to-use calculators for various purposes including financial planning, educational needs, business calculations, and everyday utilities.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Our Mission</h3>
        <p class="text-gray-700 mb-4">Our mission is to make complex calculations simple and accessible to everyone. Whether you're a student, professional, business owner, or individual planning your finances, we have the right tool for you.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">What We Offer</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li><strong>Financial Calculators:</strong> EMI, SIP, FD, GST, Income Tax, CAGR, and more</li>
            <li><strong>Ecommerce & Business Tools:</strong> Profit margins, cashback, brokerage calculations</li>
            <li><strong>Conversion Tools:</strong> Unit converter, currency converter, percentage calculator</li>
            <li><strong>Utility Tools:</strong> Age calculator, word counter, calorie calculator</li>
            <li><strong>Educational Tools:</strong> SGPA to percentage converter</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Why Choose Us?</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>100% Free to use - No hidden charges or subscriptions</li>
            <li>Fast and accurate calculations</li>
            <li>Mobile-responsive design - Works on all devices</li>
            <li>No registration required - Instant access to all tools</li>
            <li>Privacy-focused - Your data stays with you</li>
            <li>SEO-optimized with detailed explanations and FAQs</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Our Commitment</h3>
        <p class="text-gray-700 mb-4">We are committed to providing high-quality, accurate calculators that help you make informed decisions. All our calculators are thoroughly tested and use industry-standard formulas to ensure precision.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Continuous Improvement</h3>
        <p class="text-gray-700">We continuously update our tools based on user feedback and add new calculators regularly. If you have suggestions for new calculators or improvements, please <a href="contact.php" class="text-blue-600 hover:underline">contact us</a>.</p>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Get in Touch</h3>
        <p class="text-gray-700 mb-4">Have questions or feedback? We'd love to hear from you!</p>
        <div class="space-y-2">
            <p class="text-gray-700"><i class="fas fa-envelope mr-2 text-blue-600"></i>Email: <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-blue-600 hover:underline"><?php echo SITE_EMAIL; ?></a></p>
            <p class="text-gray-700"><i class="fas fa-phone mr-2 text-blue-600"></i>Helpline: <a href="tel:<?php echo SITE_PHONE; ?>" class="text-blue-600 hover:underline"><?php echo SITE_PHONE; ?></a></p>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
