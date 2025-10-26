<?php
require_once '../includes/config.php';

$page_title = get_page_title('Loan EMI Calculator');
$meta_description = "Calculate your loan EMI (Equated Monthly Installment) with our free online calculator. Get instant results for home loans, personal loans, car loans, and more.";
$keywords = "EMI calculator, loan calculator, home loan EMI, personal loan calculator, monthly installment calculator";
$canonical_url = SITE_URL . '/tools/loan-emi-calculator.php';

$result = '';
$principal = $rate = $tenure = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $principal = floatval($_POST['principal']);
    $rate = floatval($_POST['rate']);
    $tenure = intval($_POST['tenure']);
    
    if ($principal > 0 && $rate > 0 && $tenure > 0) {
        $monthly_rate = $rate / 12 / 100;
        $num_payments = $tenure * 12;
        
        $emi = ($principal * $monthly_rate * pow(1 + $monthly_rate, $num_payments)) / 
               (pow(1 + $monthly_rate, $num_payments) - 1);
        
        $total_payment = $emi * $num_payments;
        $total_interest = $total_payment - $principal;
        
        $result = [
            'emi' => number_format($emi, 2),
            'total_payment' => number_format($total_payment, 2),
            'total_interest' => number_format($total_interest, 2),
            'principal' => number_format($principal, 2)
        ];
    }
}

$schema_markup = json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebApplication",
    "name" => "Loan EMI Calculator",
    "description" => $meta_description,
    "url" => $canonical_url,
    "applicationCategory" => "FinanceApplication",
    "offers" => [
        "@type" => "Offer",
        "price" => "0",
        "priceCurrency" => "USD"
    ]
]);

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Loan EMI Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate your monthly loan EMI (Equated Monthly Installment) instantly</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Loan Amount (Principal) ₹</label>
                <input type="number" name="principal" value="<?php echo $principal; ?>" class="form-input" required step="0.01" placeholder="e.g., 500000">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Annual Interest Rate (%)</label>
                <input type="number" name="rate" value="<?php echo $rate; ?>" class="form-input" required step="0.01" placeholder="e.g., 8.5">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Loan Tenure (Years)</label>
                <input type="number" name="tenure" value="<?php echo $tenure; ?>" class="form-input" required step="1" placeholder="e.g., 20">
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate EMI</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Your EMI Breakdown</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm opacity-80">Monthly EMI</p>
                    <p class="text-3xl font-bold">₹<?php echo $result['emi']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Total Interest</p>
                    <p class="text-2xl font-semibold">₹<?php echo $result['total_interest']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Principal Amount</p>
                    <p class="text-2xl font-semibold">₹<?php echo $result['principal']; ?></p>
                </div>
                <div>
                    <p class="text-sm opacity-80">Total Payment</p>
                    <p class="text-2xl font-semibold">₹<?php echo $result['total_payment']; ?></p>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4 justify-center">
            <button onclick="shareOnSocial('facebook', '<?php echo $canonical_url; ?>', 'Loan EMI Calculator')" class="text-blue-600 hover:text-blue-800">
                <i class="fab fa-facebook fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('twitter', '<?php echo $canonical_url; ?>', 'Loan EMI Calculator')" class="text-blue-400 hover:text-blue-600">
                <i class="fab fa-twitter fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('whatsapp', '<?php echo $canonical_url; ?>', 'Loan EMI Calculator')" class="text-green-600 hover:text-green-800">
                <i class="fab fa-whatsapp fa-2x"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">What is EMI?</h2>
        <p class="text-gray-700 mb-4">EMI stands for Equated Monthly Installment. It is a fixed payment amount made by a borrower to a lender at a specified date each calendar month. EMIs are used to pay off both interest and principal each month so that over a specified number of years, the loan is fully paid off.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">How to Use This EMI Calculator?</h3>
        <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
            <li>Enter the total loan amount (principal) you wish to borrow</li>
            <li>Input the annual interest rate offered by your lender</li>
            <li>Specify the loan tenure in years</li>
            <li>Click "Calculate EMI" to get instant results</li>
        </ol>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">EMI Calculation Formula</h3>
        <p class="text-gray-700 mb-4">EMI = [P x R x (1+R)^N] / [(1+R)^N-1]</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>P = Principal loan amount</li>
            <li>R = Monthly interest rate (Annual Rate / 12 / 100)</li>
            <li>N = Total number of monthly installments (Tenure in Years x 12)</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Example Calculation</h3>
        <p class="text-gray-700 mb-4">If you take a home loan of ₹50,00,000 at 8.5% annual interest for 20 years:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Monthly EMI: ₹43,391</li>
            <li>Total Interest: ₹54,13,840</li>
            <li>Total Amount Payable: ₹1,04,13,840</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
        
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is a good EMI to income ratio?</h3>
                <p class="text-gray-700">A: Ideally, your EMI should not exceed 40-50% of your monthly income. This ensures you have enough funds for other expenses and emergencies.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Can I prepay my loan to reduce EMI?</h3>
                <p class="text-gray-700">A: Yes, most banks allow prepayment. You can either reduce your EMI amount or reduce the loan tenure by making prepayments.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Is EMI calculator accurate?</h3>
                <p class="text-gray-700">A: Yes, this calculator uses the standard EMI formula and provides accurate results. However, actual EMI may vary slightly based on your lender's specific terms.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What happens if I miss an EMI payment?</h3>
                <p class="text-gray-700">A: Missing EMI payments can result in penalty charges, negative impact on your credit score, and in severe cases, loan default and asset seizure.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="auto-loan-calculator.php" class="text-blue-600 hover:text-blue-800">→ Auto Loan Calculator</a>
            <a href="fd-calculator.php" class="text-blue-600 hover:text-blue-800">→ FD Calculator</a>
            <a href="sip-calculator.php" class="text-blue-600 hover:text-blue-800">→ SIP Calculator</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
