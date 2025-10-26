<?php
require_once '../includes/config.php';

$page_title = get_page_title('Margin Calculator');
$meta_description = "Calculate profit margin, markup percentage, and pricing for your business. Free online margin calculator with instant results.";
$keywords = "margin calculator, profit margin, markup calculator, pricing calculator, gross margin";
$canonical_url = SITE_URL . '/tools/margin-calculator.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cost = floatval($_POST['cost']);
    $selling_price = floatval($_POST['selling_price']);
    
    if ($cost > 0 && $selling_price > 0) {
        $profit = $selling_price - $cost;
        $margin = ($profit / $selling_price) * 100;
        $markup = ($profit / $cost) * 100;
        
        $result = [
            'cost' => number_format($cost, 2),
            'selling_price' => number_format($selling_price, 2),
            'profit' => number_format($profit, 2),
            'margin' => number_format($margin, 2),
            'markup' => number_format($markup, 2)
        ];
    }
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Margin Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate profit margin and markup percentage</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Cost Price ₹</label>
                <input type="number" name="cost" value="<?php echo $cost ?? ''; ?>" class="form-input" required step="0.01" placeholder="Enter cost price">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Selling Price ₹</label>
                <input type="number" name="selling_price" value="<?php echo $selling_price ?? ''; ?>" class="form-input" required step="0.01" placeholder="Enter selling price">
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate Margin</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Margin & Markup Analysis</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm opacity-80">Profit Amount</p>
                    <p class="text-3xl font-bold">₹<?php echo $result['profit']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Profit Margin</p>
                    <p class="text-3xl font-bold"><?php echo $result['margin']; ?>%</p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Markup Percentage</p>
                    <p class="text-2xl font-bold"><?php echo $result['markup']; ?>%</p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Cost Price</p>
                    <p class="text-2xl font-bold">₹<?php echo $result['cost']; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Understanding Margin vs Markup</h2>
        <p class="text-gray-700 mb-4"><strong>Profit Margin</strong> is the percentage of selling price that is profit. <strong>Markup</strong> is the percentage added to the cost price to get the selling price.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Formulas</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li><strong>Profit:</strong> Selling Price - Cost Price</li>
            <li><strong>Profit Margin:</strong> (Profit / Selling Price) × 100</li>
            <li><strong>Markup:</strong> (Profit / Cost Price) × 100</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What's the difference between margin and markup?</h3>
                <p class="text-gray-700">A: Margin is calculated as a percentage of selling price, while markup is calculated as a percentage of cost price.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is a good profit margin?</h3>
                <p class="text-gray-700">A: It varies by industry, but generally 10% is average, 20% is good, and 25%+ is excellent.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a>
            <a href="gst-calculator.php" class="text-blue-600 hover:text-blue-800">→ GST Calculator</a>
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
