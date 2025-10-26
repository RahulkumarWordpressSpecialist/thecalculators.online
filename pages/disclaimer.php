<?php
require_once '../includes/config.php';

$page_title = get_page_title('Disclaimer');
$meta_description = "Disclaimer for The Calculators Online. Important information about the use of our calculators and tools.";
$canonical_url = SITE_URL . '/pages/disclaimer.php';

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Disclaimer</h1>
    <p class="text-gray-600 mb-8">Last Updated: January 2025</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">General Disclaimer</h2>
        <p class="text-gray-700 mb-4">The information and calculators provided on The Calculators Online (<?php echo SITE_URL; ?>) are for <strong>educational and informational purposes only</strong>. While we strive to provide accurate and up-to-date calculations, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information, calculators, or related services contained on the website.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">No Professional Advice</h2>
        <p class="text-gray-700 mb-4">The calculators and information on this website do NOT constitute:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Financial advice or investment recommendations</li>
            <li>Tax advice or tax planning services</li>
            <li>Legal advice or legal counsel</li>
            <li>Medical or health advice</li>
            <li>Professional consultation of any kind</li>
        </ul>
        <p class="text-gray-700 mb-4"><strong>Always consult with qualified professionals</strong> (financial advisors, tax consultants, lawyers, doctors, etc.) before making important decisions based on calculator results.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Accuracy of Calculations</h2>
        <p class="text-gray-700 mb-4">While we use industry-standard formulas and regularly test our calculators, we cannot guarantee 100% accuracy in all scenarios. Calculation results may vary based on:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Rounding differences</li>
            <li>Changes in laws, tax rates, and regulations</li>
            <li>Different calculation methodologies</li>
            <li>Input errors or assumptions</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Financial Calculations Disclaimer</h2>
        <p class="text-gray-700 mb-4">Financial calculators (EMI, SIP, Tax, etc.) provide estimates only. Actual results may differ due to:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Changes in interest rates</li>
            <li>Market fluctuations</li>
            <li>Bank-specific terms and conditions</li>
            <li>Processing fees and charges</li>
            <li>Tax law changes</li>
        </ul>
        <p class="text-gray-700 mb-4">Always verify with your financial institution or advisor before making financial commitments.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Investment Disclaimer</h2>
        <p class="text-gray-700 mb-4">Investment-related calculators (SIP, CAGR, etc.) show potential returns based on assumed rates. <strong>Past performance does not guarantee future results.</strong> All investments carry risk, and you may lose money. Consult a certified financial planner before investing.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Tax Calculations Disclaimer</h2>
        <p class="text-gray-700 mb-4">Tax calculators provide estimates based on standard tax slabs and rules. Your actual tax liability may differ based on:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Specific deductions and exemptions applicable to you</li>
            <li>Changes in tax laws</li>
            <li>Your complete financial situation</li>
        </ul>
        <p class="text-gray-700 mb-4">Consult a certified tax professional or chartered accountant for accurate tax planning.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Third-Party Links</h2>
        <p class="text-gray-700 mb-4">Our website may contain links to third-party websites. We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Limitation of Liability</h2>
        <p class="text-gray-700 mb-4">In no event shall The Calculators Online, its developers, or affiliates be liable for any direct, indirect, incidental, consequential, or special damages arising from:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Use of our calculators or information</li>
            <li>Reliance on calculation results</li>
            <li>Financial decisions based on our tools</li>
            <li>Errors or inaccuracies in calculations</li>
            <li>Website downtime or technical issues</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Your Responsibility</h2>
        <p class="text-gray-700 mb-4">By using our calculators, you acknowledge that:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>You understand the limitations of automated calculations</li>
            <li>You will verify important results with professionals</li>
            <li>You are responsible for double-checking all inputs</li>
            <li>You accept full responsibility for decisions made using our tools</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Changes to This Disclaimer</h2>
        <p class="text-gray-700 mb-4">We reserve the right to modify this disclaimer at any time. Changes will be posted on this page with an updated date.</p>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Contact Us</h2>
        <p class="text-gray-700 mb-4">If you have questions about this disclaimer, please contact us:</p>
        <ul class="list-none text-gray-700 space-y-2">
            <li><strong>Email:</strong> <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-blue-600 hover:underline"><?php echo SITE_EMAIL; ?></a></li>
            <li><strong>Phone:</strong> <a href="tel:<?php echo SITE_PHONE; ?>" class="text-blue-600 hover:underline"><?php echo SITE_PHONE; ?></a></li>
        </ul>
    </div>
    
    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6">
        <p class="text-gray-800 font-semibold mb-2">Important Notice</p>
        <p class="text-gray-700">By using The Calculators Online, you acknowledge that you have read, understood, and agree to this disclaimer. If you do not agree, please do not use our calculators or services.</p>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
