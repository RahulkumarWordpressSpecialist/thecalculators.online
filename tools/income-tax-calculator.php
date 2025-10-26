<?php
require_once '../includes/config.php';
$page_title = get_page_title('Income Tax Calculator');
$meta_description = "Calculate income tax liability for India. Free online income tax calculator for new and old tax regime.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $income = floatval($_POST['income']);
    $regime = $_POST['regime'];
    $deductions = floatval($_POST['deductions'] ?? 0);
    if ($income > 0) {
        $taxable_income = $regime == 'old' ? max(0, $income - $deductions) : $income;
        $tax = 0;
        if ($regime == 'new') {
            if ($taxable_income > 1500000) $tax += ($taxable_income - 1500000) * 0.30;
            if ($taxable_income > 1200000) $tax += min($taxable_income - 1200000, 300000) * 0.20;
            if ($taxable_income > 900000) $tax += min($taxable_income - 900000, 300000) * 0.15;
            if ($taxable_income > 600000) $tax += min($taxable_income - 600000, 300000) * 0.10;
            if ($taxable_income > 300000) $tax += min($taxable_income - 300000, 300000) * 0.05;
        } else {
            if ($taxable_income > 1000000) $tax += ($taxable_income - 1000000) * 0.30;
            if ($taxable_income > 500000) $tax += min($taxable_income - 500000, 500000) * 0.20;
            if ($taxable_income > 250000) $tax += min($taxable_income - 250000, 250000) * 0.05;
        }
        $cess = $tax * 0.04;
        $total_tax = $tax + $cess;
        $net_income = $income - $total_tax;
        $result = [
            'tax' => number_format($tax, 2),
            'cess' => number_format($cess, 2),
            'total_tax' => number_format($total_tax, 2),
            'net_income' => number_format($net_income, 2),
            'taxable_income' => number_format($taxable_income, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Income Tax Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate your income tax liability for India</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Annual Income ₹</label><input type="number" name="income" value="<?php echo $income ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Tax Regime</label><select name="regime" class="form-input"><option value="new">New Tax Regime</option><option value="old">Old Tax Regime</option></select></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Deductions (Old Regime Only) ₹</label><input type="number" name="deductions" value="<?php echo $deductions ?? ''; ?>" class="form-input" step="0.01" placeholder="80C, 80D, etc."></div>
            <button type="submit" class="btn-primary w-full">Calculate Tax</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Tax Summary</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Total Tax</p><p class="text-3xl font-bold">₹<?php echo $result['total_tax']; ?></p></div>
                <div><p class="text-sm opacity-80">Net Income</p><p class="text-2xl font-bold">₹<?php echo $result['net_income']; ?></p></div>
                <div><p class="text-sm opacity-80">Taxable Income</p><p class="text-2xl font-bold">₹<?php echo $result['taxable_income']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Income Tax Slabs</h2>
        <p class="text-gray-700 mb-4">India has two tax regimes - New and Old. Choose based on your deductions and income level.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">New Tax Regime</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>0-3 lakhs: Nil</li><li>3-6 lakhs: 5%</li><li>6-9 lakhs: 10%</li><li>9-12 lakhs: 15%</li><li>12-15 lakhs: 20%</li><li>Above 15 lakhs: 30%</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="gst-calculator.php" class="text-blue-600 hover:text-blue-800">→ GST Calculator</a><a href="sip-calculator.php" class="text-blue-600 hover:text-blue-800">→ SIP Calculator</a><a href="fd-calculator.php" class="text-blue-600 hover:text-blue-800">→ FD Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
