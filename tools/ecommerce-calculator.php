<?php
require_once '../includes/config.php';
$page_title = get_page_title('Ecommerce Calculator');
$meta_description = "Calculate ecommerce profit margins, fees, and net profit. Free online ecommerce calculator for online sellers.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selling_price = floatval($_POST['selling_price']);
    $cost_price = floatval($_POST['cost_price']);
    $platform_fee = floatval($_POST['platform_fee']);
    $shipping_cost = floatval($_POST['shipping_cost']);
    if ($selling_price > 0) {
        $gross_profit = $selling_price - $cost_price;
        $fees = ($selling_price * $platform_fee / 100) + $shipping_cost;
        $net_profit = $gross_profit - $fees;
        $profit_margin = ($net_profit / $selling_price) * 100;
        $result = [
            'selling_price' => number_format($selling_price, 2),
            'cost_price' => number_format($cost_price, 2),
            'gross_profit' => number_format($gross_profit, 2),
            'fees' => number_format($fees, 2),
            'net_profit' => number_format($net_profit, 2),
            'margin' => number_format($profit_margin, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Ecommerce Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate profit margins and fees for online selling</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Selling Price ₹</label><input type="number" name="selling_price" value="<?php echo $selling_price ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Cost Price ₹</label><input type="number" name="cost_price" value="<?php echo $cost_price ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Platform Fee (%)</label><input type="number" name="platform_fee" value="<?php echo $platform_fee ?? ''; ?>" class="form-input" required step="0.01" placeholder="e.g., 5"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Shipping Cost ₹</label><input type="number" name="shipping_cost" value="<?php echo $shipping_cost ?? ''; ?>" class="form-input" required step="0.01"></div>
            <button type="submit" class="btn-primary w-full">Calculate Profit</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Profit Analysis</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Net Profit</p><p class="text-3xl font-bold">₹<?php echo $result['net_profit']; ?></p></div>
                <div><p class="text-sm opacity-80">Profit Margin</p><p class="text-2xl font-bold"><?php echo $result['margin']; ?>%</p></div>
                <div><p class="text-sm opacity-80">Total Fees</p><p class="text-2xl font-bold">₹<?php echo $result['fees']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Ecommerce Profit Calculation</h2>
        <p class="text-gray-700 mb-4">Calculate your actual profit after deducting platform fees and shipping costs. Essential for pricing strategy.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Key Metrics</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>Gross Profit = Selling Price - Cost Price</li><li>Net Profit = Gross Profit - All Fees and Costs</li><li>Profit Margin = (Net Profit / Selling Price) × 100</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="margin-calculator.php" class="text-blue-600 hover:text-blue-800">→ Margin Calculator</a><a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a><a href="gst-calculator.php" class="text-blue-600 hover:text-blue-800">→ GST Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
