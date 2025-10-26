<?php
require_once '../includes/config.php';
$page_title = get_page_title('FD Calculator');
$meta_description = "Calculate Fixed Deposit maturity amount and interest. Free online FD calculator for India.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $principal = floatval($_POST['principal']);
    $rate = floatval($_POST['rate']);
    $tenure = floatval($_POST['tenure']);
    $frequency = intval($_POST['frequency']);
    if ($principal > 0 && $rate > 0 && $tenure > 0) {
        $r = $rate / 100;
        $n = $frequency;
        $t = $tenure;
        $maturity_amount = $principal * pow((1 + $r / $n), $n * $t);
        $interest_earned = $maturity_amount - $principal;
        $result = [
            'maturity_amount' => number_format($maturity_amount, 2),
            'interest_earned' => number_format($interest_earned, 2),
            'principal' => number_format($principal, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">FD Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate Fixed Deposit maturity and interest</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Principal Amount ₹</label><input type="number" name="principal" value="<?php echo $principal ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Interest Rate (% p.a.)</label><input type="number" name="rate" value="<?php echo $rate ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Tenure (Years)</label><input type="number" name="tenure" value="<?php echo $tenure ?? ''; ?>" class="form-input" required step="0.01"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Compounding Frequency</label><select name="frequency" class="form-input"><option value="4">Quarterly</option><option value="12">Monthly</option><option value="1">Annually</option></select></div>
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">FD Maturity Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><p class="text-sm opacity-80">Maturity Amount</p><p class="text-3xl font-bold">₹<?php echo $result['maturity_amount']; ?></p></div>
                <div><p class="text-sm opacity-80">Interest Earned</p><p class="text-2xl font-bold">₹<?php echo $result['interest_earned']; ?></p></div>
                <div><p class="text-sm opacity-80">Principal</p><p class="text-2xl font-bold">₹<?php echo $result['principal']; ?></p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Fixed Deposits</h2>
        <p class="text-gray-700 mb-4">Fixed Deposits (FD) are secure investment instruments offering fixed returns. Interest is compounded quarterly, monthly, or annually.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">FD Formula</h3>
        <p class="text-gray-700">Maturity Amount = P × (1 + r/n)^(n×t)</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="sip-calculator.php" class="text-blue-600 hover:text-blue-800">→ SIP Calculator</a><a href="cagr-calculator.php" class="text-blue-600 hover:text-blue-800">→ CAGR Calculator</a><a href="loan-emi-calculator.php" class="text-blue-600 hover:text-blue-800">→ Loan EMI Calculator</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
