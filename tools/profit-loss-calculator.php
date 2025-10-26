<?php
require_once '../includes/config.php';

$page_title = get_page_title('Profit & Loss Calculator');
$meta_description = "Calculate profit or loss percentage on your investments and sales. Free online profit and loss calculator with instant results.";
$keywords = "profit loss calculator, profit percentage, loss percentage, profit calculator";
$canonical_url = SITE_URL . '/tools/profit-loss-calculator.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cost_price = floatval($_POST['cost_price']);
    $selling_price = floatval($_POST['selling_price']);
    
    if ($cost_price > 0 && $selling_price > 0) {
        $difference = $selling_price - $cost_price;
        $percentage = abs(($difference / $cost_price) * 100);
        $type = $difference >= 0 ? 'Profit' : 'Loss';
        
        $result = [
            'type' => $type,
            'amount' => number_format(abs($difference), 2),
            'percentage' => number_format($percentage, 2),
            'cost_price' => number_format($cost_price, 2),
            'selling_price' => number_format($selling_price, 2)
        ];
    }
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Profit & Loss Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate profit or loss percentage on your transactions</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Cost Price (CP) ₹</label>
                <input type="number" name="cost_price" value="<?php echo $cost_price ?? ''; ?>" class="form-input" required step="0.01" placeholder="Enter cost price">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Selling Price (SP) ₹</label>
                <input type="number" name="selling_price" value="<?php echo $selling_price ?? ''; ?>" class="form-input" required step="0.01" placeholder="Enter selling price">
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Result: <?php echo $result['type']; ?></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm opacity-80"><?php echo $result['type']; ?> Amount</p>
                    <p class="text-3xl font-bold">₹<?php echo $result['amount']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80"><?php echo $result['type']; ?> Percentage</p>
                    <p class="text-3xl font-bold"><?php echo $result['percentage']; ?>%</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-white border-opacity-30">
                <div>
                    <p class="text-sm opacity-80">Cost Price</p>
                    <p class="text-xl font-semibold">₹<?php echo $result['cost_price']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Selling Price</p>
                    <p class="text-xl font-semibold">₹<?php echo $result['selling_price']; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">How to Calculate Profit and Loss</h2>
        <p class="text-gray-700 mb-4">Profit and loss calculations help you understand the financial outcome of buying and selling transactions.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Formulas</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li><strong>Profit:</strong> Selling Price - Cost Price (when SP > CP)</li>
            <li><strong>Loss:</strong> Cost Price - Selling Price (when CP > SP)</li>
            <li><strong>Profit %:</strong> (Profit / Cost Price) × 100</li>
            <li><strong>Loss %:</strong> (Loss / Cost Price) × 100</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Example</h3>
        <p class="text-gray-700">If you buy a product for ₹1000 and sell it for ₹1200:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Profit = ₹1200 - ₹1000 = ₹200</li>
            <li>Profit % = (₹200 / ₹1000) × 100 = 20%</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is a good profit percentage?</h3>
                <p class="text-gray-700">A: It depends on the industry, but typically 10-20% is considered good, and 20%+ is excellent.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How can I reduce losses in business?</h3>
                <p class="text-gray-700">A: Focus on reducing costs, improving product quality, better marketing, and competitive pricing.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="margin-calculator.php" class="text-blue-600 hover:text-blue-800">→ Margin Calculator</a>
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
            <a href="ecommerce-calculator.php" class="text-blue-600 hover:text-blue-800">→ Ecommerce Calculator</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
