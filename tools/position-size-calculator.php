<?php
require_once '../includes/config.php';
$page_title = get_page_title('Position Size Calculator');
$meta_description = "Calculate optimal position size for trading based on risk management. Free position size calculator.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $capital = floatval($_POST['capital']);
    $risk_percent = floatval($_POST['risk_percent']);
    $entry = floatval($_POST['entry']);
    $stop_loss = floatval($_POST['stop_loss']);
    if ($capital > 0 && $risk_percent > 0 && $entry > 0 && $stop_loss > 0) {
        $risk_amount = ($capital * $risk_percent) / 100;
        $risk_per_share = abs($entry - $stop_loss);
        $position_size = floor($risk_amount / $risk_per_share);
        $total_investment = $position_size * $entry;
        $result = [
            'position_size' => $position_size,
            'risk_amount' => number_format($risk_amount, 2),
            'investment' => number_format($total_investment, 2),
            'risk_per_share' => number_format($risk_per_share, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Position Size Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate optimal position size for trading</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Total Capital ₹</label><input type="number" name="capital" value="<?php echo $capital ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Risk per Trade (%)</label><input type="number" name="risk_percent" value="<?php echo $risk_percent ?? ''; ?>" class="form-input" required step="0.01" placeholder="e.g., 2"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Entry Price ₹</label><input type="number" name="entry" value="<?php echo $entry ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Stop Loss ₹</label><input type="number" name="stop_loss" value="<?php echo $stop_loss ?? ''; ?>" class="form-input" required step="0.01"></div>
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Position Sizing</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><p class="text-sm opacity-80">Position Size</p><p class="text-4xl font-bold"><?php echo $result['position_size']; ?> shares</p></div>
                <div><p class="text-sm opacity-80">Total Investment</p><p class="text-3xl font-bold">₹<?php echo $result['investment']; ?></p></div>
                <div><p class="text-sm opacity-80">Risk Amount</p><p class="text-2xl font-bold">₹<?php echo $result['risk_amount']; ?></p></div>
                <div><p class="text-sm opacity-80">Risk per Share</p><p class="text-2xl font-bold">₹<?php echo $result['risk_per_share']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Position Sizing Strategy</h2>
        <p class="text-gray-700 mb-4">Position sizing determines how many shares to buy based on your risk tolerance and stop loss level.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Formula</h3>
        <p class="text-gray-700">Position Size = (Capital × Risk%) / (Entry Price - Stop Loss)</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="risk-reward-calculator.php" class="text-blue-600 hover:text-blue-800">→ Risk Reward Calculator</a><a href="brokerage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Brokerage Calculator</a><a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
