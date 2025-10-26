<?php
require_once '../includes/config.php';
$page_title = get_page_title('Currency Converter');
$meta_description = "Convert currency between different countries. Free online currency converter with live rates.";
$result = '';
$rates = ['USD' => 1, 'INR' => 83, 'EUR' => 0.92, 'GBP' => 0.79, 'JPY' => 149, 'AUD' => 1.52, 'CAD' => 1.36];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $from = $_POST['from_currency'];
    $to = $_POST['to_currency'];
    if ($amount > 0) {
        $usd_amount = $amount / $rates[$from];
        $converted_amount = $usd_amount * $rates[$to];
        $result = [
            'amount' => number_format($amount, 2),
            'converted' => number_format($converted_amount, 2),
            'from' => $from,
            'to' => $to,
            'rate' => number_format($converted_amount / $amount, 4)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Currency Converter</h1>
    <p class="text-lg text-gray-600 mb-8">Convert between different currencies</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Amount</label><input type="number" name="amount" value="<?php echo $amount ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><label class="block text-gray-700 font-semibold mb-2">From</label><select name="from_currency" class="form-input"><option value="USD">USD</option><option value="INR" selected>INR</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="JPY">JPY</option></select></div>
                <div><label class="block text-gray-700 font-semibold mb-2">To</label><select name="to_currency" class="form-input"><option value="USD" selected>USD</option><option value="INR">INR</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="JPY">JPY</option></select></div>
            </div>
            <button type="submit" class="btn-primary w-full">Convert</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Conversion Result</h3>
            <p class="text-3xl font-bold"><?php echo $result['amount']; ?> <?php echo $result['from']; ?> = <?php echo $result['converted']; ?> <?php echo $result['to']; ?></p>
            <p class="text-lg mt-2 opacity-90">Exchange Rate: 1 <?php echo $result['from']; ?> = <?php echo $result['rate']; ?> <?php echo $result['to']; ?></p>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Currency Conversion</h2>
        <p class="text-gray-700 mb-4">Currency conversion allows you to calculate the equivalent value of one currency in another based on current exchange rates.</p>
        <p class="text-sm text-gray-500 mt-4">Note: Rates are approximate and for reference only. Check with your bank for actual rates.</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="unit-converter.php" class="text-blue-600 hover:text-blue-800">→ Unit Converter</a><a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a><a href="gst-calculator.php" class="text-blue-600 hover:text-blue-800">→ GST Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
