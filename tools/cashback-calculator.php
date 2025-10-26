<?php
require_once '../includes/config.php';
$page_title = get_page_title('Cashback Calculator');
$meta_description = "Calculate cashback earnings and savings. Free online cashback calculator for shopping rewards.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $cashback_rate = floatval($_POST['cashback_rate']);
    $max_cashback = floatval($_POST['max_cashback']);
    if ($amount > 0 && $cashback_rate > 0) {
        $cashback = ($amount * $cashback_rate) / 100;
        if ($max_cashback > 0 && $cashback > $max_cashback) {
            $cashback = $max_cashback;
        }
        $final_amount = $amount - $cashback;
        $result = [
            'cashback' => number_format($cashback, 2),
            'final_amount' => number_format($final_amount, 2),
            'original_amount' => number_format($amount, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Cashback Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate your cashback earnings and savings</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Purchase Amount ₹</label><input type="number" name="amount" value="<?php echo $amount ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Cashback Rate (%)</label><input type="number" name="cashback_rate" value="<?php echo $cashback_rate ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Maximum Cashback (Optional) ₹</label><input type="number" name="max_cashback" value="<?php echo $max_cashback ?? ''; ?>" class="form-input" step="0.01" placeholder="Leave blank if no cap"></div>
            <button type="submit" class="btn-primary w-full">Calculate Cashback</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Cashback Summary</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Cashback Earned</p><p class="text-3xl font-bold">₹<?php echo $result['cashback']; ?></p></div>
                <div><p class="text-sm opacity-80">Final Amount</p><p class="text-2xl font-bold">₹<?php echo $result['final_amount']; ?></p></div>
                <div><p class="text-sm opacity-80">Original Amount</p><p class="text-2xl font-bold">₹<?php echo $result['original_amount']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Cashback</h2>
        <p class="text-gray-700 mb-4">Cashback is a reward program where you receive a percentage of your purchase amount back. Use this calculator to estimate your savings.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Cashback Tips</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>Compare cashback offers before purchasing</li><li>Check for maximum cashback limits</li><li>Use credit cards with best cashback rates</li><li>Combine offers when possible</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a><a href="ecommerce-calculator.php" class="text-blue-600 hover:text-blue-800">→ Ecommerce Calculator</a><a href="margin-calculator.php" class="text-blue-600 hover:text-blue-800">→ Margin Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
