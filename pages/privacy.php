<?php
require_once '../includes/config.php';

$page_title = get_page_title('Privacy Policy');
$meta_description = "Privacy Policy for The Calculators Online. Learn how we protect your privacy and handle your data.";
$canonical_url = SITE_URL . '/pages/privacy.php';

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Privacy Policy</h1>
    <p class="text-gray-600 mb-8">Last Updated: January 2025</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Introduction</h2>
        <p class="text-gray-700 mb-4">At The Calculators Online (<?php echo SITE_URL; ?>), we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website and use our calculators.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Information We Collect</h2>
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Information You Provide</h3>
        <p class="text-gray-700 mb-4">When you use our contact form, we collect:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Name</li>
            <li>Email address</li>
            <li>Message content</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Automatically Collected Information</h3>
        <p class="text-gray-700 mb-4">When you visit our website, we may automatically collect:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>IP address</li>
            <li>Browser type and version</li>
            <li>Operating system</li>
            <li>Pages visited and time spent</li>
            <li>Referring website</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">How We Use Your Information</h2>
        <p class="text-gray-700 mb-4">We use the collected information for:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Responding to your inquiries and providing customer support</li>
            <li>Improving our website and calculators</li>
            <li>Analyzing website usage and performance</li>
            <li>Complying with legal obligations</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Calculator Data</h2>
        <p class="text-gray-700 mb-4"><strong>Important:</strong> All calculations are performed locally in your browser or on our server temporarily. We do NOT store any data you enter into our calculators. Your calculation inputs and results are not saved, logged, or shared with any third parties.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Cookies</h2>
        <p class="text-gray-700 mb-4">We may use cookies to improve your browsing experience. Cookies are small text files stored on your device. You can control cookie settings in your browser preferences.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Third-Party Services</h2>
        <p class="text-gray-700 mb-4">We may use third-party services such as:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li><strong>Google Analytics:</strong> To analyze website traffic (if implemented)</li>
            <li><strong>Google AdSense:</strong> To display advertisements (if implemented)</li>
        </ul>
        <p class="text-gray-700 mb-4">These services have their own privacy policies governing data collection and use.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Data Security</h2>
        <p class="text-gray-700 mb-4">We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Your Rights (GDPR Compliance)</h2>
        <p class="text-gray-700 mb-4">If you are in the European Economic Area (EEA), you have the right to:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Access your personal data</li>
            <li>Correct inaccurate data</li>
            <li>Request deletion of your data</li>
            <li>Object to data processing</li>
            <li>Data portability</li>
            <li>Withdraw consent</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Children's Privacy</h2>
        <p class="text-gray-700 mb-4">Our website is not directed to children under 13. We do not knowingly collect personal information from children under 13. If you believe we have collected information from a child under 13, please contact us immediately.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Changes to This Policy</h2>
        <p class="text-gray-700 mb-4">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Contact Us</h2>
        <p class="text-gray-700 mb-4">If you have questions about this Privacy Policy, please contact us:</p>
        <ul class="list-none text-gray-700 space-y-2">
            <li><strong>Email:</strong> <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-blue-600 hover:underline"><?php echo SITE_EMAIL; ?></a></li>
            <li><strong>Phone:</strong> <a href="tel:<?php echo SITE_PHONE; ?>" class="text-blue-600 hover:underline"><?php echo SITE_PHONE; ?></a></li>
        </ul>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
