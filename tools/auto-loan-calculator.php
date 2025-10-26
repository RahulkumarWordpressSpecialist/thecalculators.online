<?php
require_once '../includes/config.php';
$page_title = get_page_title('Auto Loan Calculator');
$meta_description = "Calculate car loan EMI, total interest, and repayment schedule. Free auto loan calculator for vehicle financing.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $principal = floatval($_POST['principal']);
    $rate = floatval($_POST['rate']);
    $tenure = intval($_POST['tenure']);
    if ($principal > 0 && $rate > 0 && $tenure > 0) {
        $monthly_rate = $rate / 12 / 100;
        $num_payments = $tenure * 12;
        $emi = ($principal * $monthly_rate * pow(1 + $monthly_rate, $num_payments)) / (pow(1 + $monthly_rate, $num_payments) - 1);
        $total_payment = $emi * $num_payments;
        $total_interest = $total_payment - $principal;
        $result = [
            'emi' => number_format($emi, 2),
            'total_payment' => number_format($total_payment, 2),
            'total_interest' => number_format($total_interest, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Auto Loan Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate car loan EMI and interest</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Loan Amount ₹</label><input type="number" name="principal" value="<?php echo $principal ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Interest Rate (%) p.a.</label><input type="number" name="rate" value="<?php echo $rate ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Loan Tenure (Years)</label><input type="number" name="tenure" value="<?php echo $tenure ?? ''; ?>" class="form-input" required></div>
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Loan Summary</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Monthly EMI</p><p class="text-3xl font-bold">₹<?php echo $result['emi']; ?></p></div>
                <div><p class="text-sm opacity-80">Total Interest</p><p class="text-2xl font-bold">₹<?php echo $result['total_interest']; ?></p></div>
                <div><p class="text-sm opacity-80">Total Payment</p><p class="text-2xl font-bold">₹<?php echo $result['total_payment']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Auto Loans</h2>
        <p class="text-gray-700 mb-4">Auto loans help you finance vehicle purchases with fixed monthly payments. Calculate your EMI before buying to plan your budget.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Tips for Car Loans</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>Make a higher down payment to reduce EMI</li><li>Compare interest rates from multiple lenders</li><li>Choose shorter tenure to pay less interest</li><li>Check for prepayment penalties</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="loan-emi-calculator.php" class="text-blue-600 hover:text-blue-800">→ Loan EMI Calculator</a><a href="sip-calculator.php" class="text-blue-600 hover:text-blue-800">→ SIP Calculator</a><a href="fd-calculator.php" class="text-blue-600 hover:text-blue-800">→ FD Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
