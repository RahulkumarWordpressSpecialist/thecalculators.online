<?php
require_once '../includes/config.php';
$page_title = get_page_title('Risk Reward Ratio Calculator');
$meta_description = "Calculate risk reward ratio for trading. Free online risk reward calculator for stock and forex trading.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entry = floatval($_POST['entry']);
    $stop_loss = floatval($_POST['stop_loss']);
    $target = floatval($_POST['target']);
    if ($entry > 0 && $stop_loss > 0 && $target > 0) {
        $risk = abs($entry - $stop_loss);
        $reward = abs($target - $entry);
        $ratio = $reward / $risk;
        $result = [
            'risk' => number_format($risk, 2),
            'reward' => number_format($reward, 2),
            'ratio' => number_format($ratio, 2),
            'entry' => number_format($entry, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Risk Reward Ratio Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate risk reward ratio for your trades</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Entry Price ₹</label><input type="number" name="entry" value="<?php echo $entry ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Stop Loss ₹</label><input type="number" name="stop_loss" value="<?php echo $stop_loss ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Target Price ₹</label><input type="number" name="target" value="<?php echo $target ?? ''; ?>" class="form-input" required step="0.01"></div>
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Risk Reward Analysis</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Risk Reward Ratio</p><p class="text-4xl font-bold">1:<?php echo $result['ratio']; ?></p></div>
                <div><p class="text-sm opacity-80">Risk Amount</p><p class="text-2xl font-bold">₹<?php echo $result['risk']; ?></p></div>
                <div><p class="text-sm opacity-80">Reward Amount</p><p class="text-2xl font-bold">₹<?php echo $result['reward']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Understanding Risk Reward Ratio</h2>
        <p class="text-gray-700 mb-4">Risk Reward Ratio compares potential profit to potential loss. A ratio of 1:3 means you risk ₹1 to potentially gain ₹3.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Good Risk Reward Ratios</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>1:2 or higher is generally considered good</li><li>1:3 is excellent for most trading strategies</li><li>Never trade with ratio less than 1:1</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="position-size-calculator.php" class="text-blue-600 hover:text-blue-800">→ Position Size Calculator</a><a href="brokerage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Brokerage Calculator</a><a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
