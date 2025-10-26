<?php
require_once '../includes/config.php';
$page_title = get_page_title('CAGR Calculator');
$meta_description = "Calculate Compound Annual Growth Rate (CAGR) for your investments. Free online CAGR calculator.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $initial_value = floatval($_POST['initial_value']);
    $final_value = floatval($_POST['final_value']);
    $years = floatval($_POST['years']);
    if ($initial_value > 0 && $final_value > 0 && $years > 0) {
        $cagr = (pow(($final_value / $initial_value), (1 / $years)) - 1) * 100;
        $absolute_return = (($final_value - $initial_value) / $initial_value) * 100;
        $result = [
            'cagr' => number_format($cagr, 2),
            'absolute_return' => number_format($absolute_return, 2),
            'initial_value' => number_format($initial_value, 2),
            'final_value' => number_format($final_value, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">CAGR Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate Compound Annual Growth Rate</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Initial Investment ₹</label><input type="number" name="initial_value" value="<?php echo $initial_value ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Final Value ₹</label><input type="number" name="final_value" value="<?php echo $final_value ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Investment Period (Years)</label><input type="number" name="years" value="<?php echo $years ?? ''; ?>" class="form-input" required step="0.01"></div>
            <button type="submit" class="btn-primary w-full">Calculate CAGR</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Investment Returns</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><p class="text-sm opacity-80">CAGR</p><p class="text-4xl font-bold"><?php echo $result['cagr']; ?>%</p></div>
                <div><p class="text-sm opacity-80">Absolute Return</p><p class="text-3xl font-bold"><?php echo $result['absolute_return']; ?>%</p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">What is CAGR?</h2>
        <p class="text-gray-700 mb-4">CAGR (Compound Annual Growth Rate) measures the mean annual growth rate of an investment over a specified period longer than one year.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">CAGR Formula</h3>
        <p class="text-gray-700">CAGR = [(Final Value / Initial Value)^(1/Years)] - 1</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="sip-calculator.php" class="text-blue-600 hover:text-blue-800">→ SIP Calculator</a><a href="fd-calculator.php" class="text-blue-600 hover:text-blue-800">→ FD Calculator</a><a href="loan-emi-calculator.php" class="text-blue-600 hover:text-blue-800">→ Loan EMI Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
