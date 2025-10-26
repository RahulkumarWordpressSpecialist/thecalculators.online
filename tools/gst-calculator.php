<?php
require_once '../includes/config.php';

$page_title = get_page_title('GST Calculator');
$meta_description = "Calculate GST (Goods and Services Tax) inclusive and exclusive amounts. Free online GST calculator for India with instant results.";
$keywords = "GST calculator, GST calculation, tax calculator, India GST, goods and services tax calculator";
$canonical_url = SITE_URL . '/tools/gst-calculator.php';

$result = '';
$amount = $gst_rate = '';
$calc_type = 'exclusive';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $gst_rate = floatval($_POST['gst_rate']);
    $calc_type = $_POST['calc_type'];
    
    if ($amount > 0 && $gst_rate > 0) {
        if ($calc_type == 'exclusive') {
            $gst_amount = ($amount * $gst_rate) / 100;
            $total = $amount + $gst_amount;
            
            $result = [
                'original_amount' => number_format($amount, 2),
                'gst_amount' => number_format($gst_amount, 2),
                'total' => number_format($total, 2),
                'cgst' => number_format($gst_amount / 2, 2),
                'sgst' => number_format($gst_amount / 2, 2)
            ];
        } else {
            $original_amount = ($amount * 100) / (100 + $gst_rate);
            $gst_amount = $amount - $original_amount;
            
            $result = [
                'original_amount' => number_format($original_amount, 2),
                'gst_amount' => number_format($gst_amount, 2),
                'total' => number_format($amount, 2),
                'cgst' => number_format($gst_amount / 2, 2),
                'sgst' => number_format($gst_amount / 2, 2)
            ];
        }
    }
}

$schema_markup = json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebApplication",
    "name" => "GST Calculator",
    "description" => $meta_description,
    "url" => $canonical_url
]);

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">GST Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate GST inclusive and exclusive amounts for India</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Calculation Type</label>
                <select name="calc_type" class="form-input">
                    <option value="exclusive" <?php echo $calc_type == 'exclusive' ? 'selected' : ''; ?>>Add GST (Exclusive)</option>
                    <option value="inclusive" <?php echo $calc_type == 'inclusive' ? 'selected' : ''; ?>>Remove GST (Inclusive)</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Amount ₹</label>
                <input type="number" name="amount" value="<?php echo $amount; ?>" class="form-input" required step="0.01" placeholder="Enter amount">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">GST Rate (%)</label>
                <select name="gst_rate" class="form-input" required>
                    <option value="5" <?php echo $gst_rate == 5 ? 'selected' : ''; ?>>5%</option>
                    <option value="12" <?php echo $gst_rate == 12 ? 'selected' : ''; ?>>12%</option>
                    <option value="18" <?php echo $gst_rate == 18 ? 'selected' : ''; ?>>18%</option>
                    <option value="28" <?php echo $gst_rate == 28 ? 'selected' : ''; ?>>28%</option>
                </select>
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate GST</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">GST Calculation Result</h3>
            <div class="space-y-3">
                <div class="flex justify-between border-b border-white border-opacity-30 pb-2">
                    <span>Original Amount:</span>
                    <span class="font-bold">₹<?php echo $result['original_amount']; ?></span>
                </div>
                <div class="flex justify-between border-b border-white border-opacity-30 pb-2">
                    <span>GST Amount:</span>
                    <span class="font-bold">₹<?php echo $result['gst_amount']; ?></span>
                </div>
                <div class="flex justify-between border-b border-white border-opacity-30 pb-2">
                    <span>CGST (<?php echo $gst_rate/2; ?>%):</span>
                    <span class="font-bold">₹<?php echo $result['cgst']; ?></span>
                </div>
                <div class="flex justify-between border-b border-white border-opacity-30 pb-2">
                    <span>SGST (<?php echo $gst_rate/2; ?>%):</span>
                    <span class="font-bold">₹<?php echo $result['sgst']; ?></span>
                </div>
                <div class="flex justify-between pt-2">
                    <span class="text-xl">Total Amount:</span>
                    <span class="text-2xl font-bold">₹<?php echo $result['total']; ?></span>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4 justify-center">
            <button onclick="shareOnSocial('facebook', '<?php echo $canonical_url; ?>', 'GST Calculator')" class="text-blue-600 hover:text-blue-800">
                <i class="fab fa-facebook fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('twitter', '<?php echo $canonical_url; ?>', 'GST Calculator')" class="text-blue-400 hover:text-blue-600">
                <i class="fab fa-twitter fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('whatsapp', '<?php echo $canonical_url; ?>', 'GST Calculator')" class="text-green-600 hover:text-green-800">
                <i class="fab fa-whatsapp fa-2x"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About GST (Goods and Services Tax)</h2>
        <p class="text-gray-700 mb-4">GST is an indirect tax levied on the supply of goods and services in India. It replaced multiple cascading taxes levied by the central and state governments. GST is a comprehensive, multi-stage, destination-based tax.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">GST Rates in India</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li><strong>0% GST:</strong> Essential items like fresh vegetables, unbranded food grains, milk, etc.</li>
            <li><strong>5% GST:</strong> Items of mass consumption like sugar, tea, coffee, edible oils, etc.</li>
            <li><strong>12% GST:</strong> Processed food items, mobile phones (up to ₹5000), etc.</li>
            <li><strong>18% GST:</strong> Most goods and services including mobile phones above ₹5000, AC restaurants, etc.</li>
            <li><strong>28% GST:</strong> Luxury items like cars, cigarettes, aerated drinks, etc.</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">How to Calculate GST?</h3>
        <p class="text-gray-700 mb-2"><strong>Add GST (Exclusive):</strong></p>
        <p class="text-gray-700 mb-4">GST Amount = (Original Amount × GST Rate) / 100<br>Total Amount = Original Amount + GST Amount</p>
        
        <p class="text-gray-700 mb-2"><strong>Remove GST (Inclusive):</strong></p>
        <p class="text-gray-700 mb-4">Original Amount = (Total Amount × 100) / (100 + GST Rate)<br>GST Amount = Total Amount - Original Amount</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">CGST and SGST</h3>
        <p class="text-gray-700">For intra-state supplies, GST is divided equally into CGST (Central GST) and SGST (State GST). For inter-state supplies, IGST (Integrated GST) is applicable.</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
        
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is the difference between GST exclusive and inclusive?</h3>
                <p class="text-gray-700">A: GST exclusive means GST is added on top of the base price. GST inclusive means GST is already included in the total price.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Who needs to pay GST?</h3>
                <p class="text-gray-700">A: Businesses with annual turnover exceeding ₹20 lakhs (₹10 lakhs for special category states) must register for GST and collect it from customers.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How is GST different from previous taxes?</h3>
                <p class="text-gray-700">A: GST replaced multiple indirect taxes like VAT, Service Tax, Excise Duty, etc., creating a unified tax system across India.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="income-tax-calculator.php" class="text-blue-600 hover:text-blue-800">→ Income Tax Calculator</a>
            <a href="margin-calculator.php" class="text-blue-600 hover:text-blue-800">→ Margin Calculator</a>
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
