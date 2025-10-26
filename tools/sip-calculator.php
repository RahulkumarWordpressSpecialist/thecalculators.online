<?php
require_once '../includes/config.php';

$page_title = get_page_title('SIP Calculator');
$meta_description = "Calculate SIP (Systematic Investment Plan) returns and maturity amount. Free online SIP calculator for mutual fund investments.";
$keywords = "SIP calculator, mutual fund calculator, systematic investment plan, investment calculator";
$canonical_url = SITE_URL . '/tools/sip-calculator.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $monthly_investment = floatval($_POST['monthly_investment']);
    $rate = floatval($_POST['rate']);
    $tenure = intval($_POST['tenure']);
    
    if ($monthly_investment > 0 && $rate > 0 && $tenure > 0) {
        $monthly_rate = $rate / 12 / 100;
        $months = $tenure * 12;
        
        $maturity_amount = $monthly_investment * ((pow(1 + $monthly_rate, $months) - 1) / $monthly_rate) * (1 + $monthly_rate);
        
        $total_investment = $monthly_investment * $months;
        $total_returns = $maturity_amount - $total_investment;
        
        $result = [
            'maturity_amount' => number_format($maturity_amount, 2),
            'total_investment' => number_format($total_investment, 2),
            'total_returns' => number_format($total_returns, 2)
        ];
    }
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">SIP Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate your SIP returns and plan your investment goals</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Monthly Investment Amount ₹</label>
                <input type="number" name="monthly_investment" value="<?php echo $monthly_investment ?? ''; ?>" class="form-input" required step="0.01" placeholder="e.g., 5000">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Expected Annual Return Rate (%)</label>
                <input type="number" name="rate" value="<?php echo $rate ?? ''; ?>" class="form-input" required step="0.01" placeholder="e.g., 12">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Investment Period (Years)</label>
                <input type="number" name="tenure" value="<?php echo $tenure ?? ''; ?>" class="form-input" required step="1" placeholder="e.g., 10">
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate Returns</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Investment Summary</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <p class="text-sm opacity-80">Total Investment</p>
                    <p class="text-2xl font-bold">₹<?php echo $result['total_investment']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Expected Returns</p>
                    <p class="text-2xl font-bold">₹<?php echo $result['total_returns']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Maturity Amount</p>
                    <p class="text-3xl font-bold">₹<?php echo $result['maturity_amount']; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">What is SIP?</h2>
        <p class="text-gray-700 mb-4">A Systematic Investment Plan (SIP) is a smart financial planning tool that helps you invest a fixed amount regularly in mutual funds. SIP allows you to invest in a disciplined manner without worrying about market volatility and timing the market.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Benefits of SIP</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Rupee Cost Averaging - Buy more units when prices are low</li>
            <li>Power of Compounding - Earn returns on returns</li>
            <li>Disciplined Investing - Regular investment habit</li>
            <li>Flexible - Start, pause, or stop anytime</li>
            <li>Affordable - Start with as low as ₹500</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is the minimum amount for SIP?</h3>
                <p class="text-gray-700">A: Most mutual funds allow SIP starting from ₹500 per month, though some funds may have higher minimum requirements.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Can I withdraw my SIP investment anytime?</h3>
                <p class="text-gray-700">A: Yes, SIPs are generally flexible and you can redeem your units anytime. However, ELSS funds have a 3-year lock-in period.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How is SIP return calculated?</h3>
                <p class="text-gray-700">A: SIP returns are calculated using the future value of an annuity formula, accounting for monthly compounding of returns.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="fd-calculator.php" class="text-blue-600 hover:text-blue-800">→ FD Calculator</a>
            <a href="cagr-calculator.php" class="text-blue-600 hover:text-blue-800">→ CAGR Calculator</a>
            <a href="loan-emi-calculator.php" class="text-blue-600 hover:text-blue-800">→ Loan EMI Calculator</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
