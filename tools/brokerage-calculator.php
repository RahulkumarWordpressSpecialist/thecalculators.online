<?php
require_once '../includes/config.php';
$page_title = get_page_title('Brokerage Calculator');
$meta_description = "Calculate stock trading brokerage fees and total charges. Free online brokerage calculator for Indian stock market.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buy_price = floatval($_POST['buy_price']);
    $sell_price = floatval($_POST['sell_price']);
    $quantity = intval($_POST['quantity']);
    $brokerage_rate = floatval($_POST['brokerage_rate']);
    if ($buy_price > 0 && $sell_price > 0 && $quantity > 0) {
        $buy_value = $buy_price * $quantity;
        $sell_value = $sell_price * $quantity;
        $buy_brokerage = $buy_value * $brokerage_rate / 100;
        $sell_brokerage = $sell_value * $brokerage_rate / 100;
        $total_brokerage = $buy_brokerage + $sell_brokerage;
        $stt = ($sell_value * 0.025) / 100;
        $transaction_charges = (($buy_value + $sell_value) * 0.00325) / 100;
        $gst = ($total_brokerage + $transaction_charges) * 0.18;
        $total_charges = $total_brokerage + $stt + $transaction_charges + $gst;
        $net_pnl = ($sell_value - $buy_value) - $total_charges;
        $result = [
            'total_charges' => number_format($total_charges, 2),
            'brokerage' => number_format($total_brokerage, 2),
            'net_pnl' => number_format($net_pnl, 2),
            'buy_value' => number_format($buy_value, 2),
            'sell_value' => number_format($sell_value, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Brokerage Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate stock trading brokerage and total charges</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Buy Price ₹</label><input type="number" name="buy_price" value="<?php echo $buy_price ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Sell Price ₹</label><input type="number" name="sell_price" value="<?php echo $sell_price ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Quantity</label><input type="number" name="quantity" value="<?php echo $quantity ?? ''; ?>" class="form-input" required></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Brokerage Rate (%)</label><input type="number" name="brokerage_rate" value="<?php echo $brokerage_rate ?? 0.03; ?>" class="form-input" required step="0.01" placeholder="e.g., 0.03"></div>
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Trading Summary</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Net P&L</p><p class="text-3xl font-bold">₹<?php echo $result['net_pnl']; ?></p></div>
                <div><p class="text-sm opacity-80">Total Charges</p><p class="text-2xl font-bold">₹<?php echo $result['total_charges']; ?></p></div>
                <div><p class="text-sm opacity-80">Brokerage</p><p class="text-2xl font-bold">₹<?php echo $result['brokerage']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Brokerage Charges</h2>
        <p class="text-gray-700 mb-4">Brokerage charges are fees paid to your broker for executing trades. Understanding total costs helps you calculate actual profit/loss.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Typical Charges</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>Brokerage Fee (varies by broker)</li><li>STT (Securities Transaction Tax) - 0.025%</li><li>Transaction Charges - 0.00325%</li><li>GST - 18% on brokerage and charges</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="risk-reward-calculator.php" class="text-blue-600 hover:text-blue-800">→ Risk Reward Calculator</a><a href="position-size-calculator.php" class="text-blue-600 hover:text-blue-800">→ Position Size Calculator</a><a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
