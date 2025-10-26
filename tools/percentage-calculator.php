<?php
require_once '../includes/config.php';

$page_title = get_page_title('Percentage Calculator');
$meta_description = "Free online percentage calculator. Calculate percentages, percentage increase/decrease, and find what percentage one number is of another.";
$keywords = "percentage calculator, calculate percentage, percent calculator, percentage increase, percentage decrease";
$canonical_url = SITE_URL . '/tools/percentage-calculator.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $calc_type = $_POST['calc_type'];
    
    if ($calc_type == 'basic') {
        $number = floatval($_POST['number']);
        $percentage = floatval($_POST['percentage']);
        $result = ($number * $percentage) / 100;
        $result_text = "$percentage% of $number = " . number_format($result, 2);
    } elseif ($calc_type == 'increase') {
        $number = floatval($_POST['number']);
        $percentage = floatval($_POST['percentage']);
        $increase = ($number * $percentage) / 100;
        $result = $number + $increase;
        $result_text = "$number increased by $percentage% = " . number_format($result, 2);
    } elseif ($calc_type == 'decrease') {
        $number = floatval($_POST['number']);
        $percentage = floatval($_POST['percentage']);
        $decrease = ($number * $percentage) / 100;
        $result = $number - $decrease;
        $result_text = "$number decreased by $percentage% = " . number_format($result, 2);
    } elseif ($calc_type == 'what_percent') {
        $part = floatval($_POST['part']);
        $whole = floatval($_POST['whole']);
        if ($whole > 0) {
            $result = ($part / $whole) * 100;
            $result_text = "$part is " . number_format($result, 2) . "% of $whole";
        }
    }
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Percentage Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate percentages easily and quickly</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Calculation Type</label>
                <select name="calc_type" id="calc_type" class="form-input" onchange="toggleFields()">
                    <option value="basic">What is X% of Y?</option>
                    <option value="increase">Increase by percentage</option>
                    <option value="decrease">Decrease by percentage</option>
                    <option value="what_percent">What % is X of Y?</option>
                </select>
            </div>
            
            <div id="basic_fields">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Number</label>
                    <input type="number" name="number" class="form-input" step="0.01" placeholder="Enter number">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Percentage (%)</label>
                    <input type="number" name="percentage" class="form-input" step="0.01" placeholder="Enter percentage">
                </div>
            </div>
            
            <div id="what_percent_fields" style="display:none;">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Part (X)</label>
                    <input type="number" name="part" class="form-input" step="0.01" placeholder="Enter part">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Whole (Y)</label>
                    <input type="number" name="whole" class="form-input" step="0.01" placeholder="Enter whole">
                </div>
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate</button>
        </form>
        
        <?php if ($result !== ''): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Result</h3>
            <p class="text-3xl font-bold"><?php echo $result_text; ?></p>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">How to Calculate Percentages</h2>
        <p class="text-gray-700 mb-4">A percentage is a number or ratio expressed as a fraction of 100. It is denoted using the percent sign "%".</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Common Percentage Formulas</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li><strong>Finding X% of Y:</strong> (X ÷ 100) × Y</li>
            <li><strong>What % is X of Y:</strong> (X ÷ Y) × 100</li>
            <li><strong>Percentage Increase:</strong> Original Number + (Original Number × Percentage ÷ 100)</li>
            <li><strong>Percentage Decrease:</strong> Original Number - (Original Number × Percentage ÷ 100)</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Examples</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>20% of 500 = 100</li>
            <li>50 is 10% of 500</li>
            <li>500 increased by 20% = 600</li>
            <li>500 decreased by 20% = 400</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How do I calculate percentage increase?</h3>
                <p class="text-gray-700">A: Divide the increase by the original number and multiply by 100. Formula: ((New Value - Old Value) / Old Value) × 100</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is the difference between percentage and percentile?</h3>
                <p class="text-gray-700">A: Percentage is a fraction of 100, while percentile is a measure used in statistics indicating the value below which a given percentage of observations fall.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Calculators</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="margin-calculator.php" class="text-blue-600 hover:text-blue-800">→ Margin Calculator</a>
            <a href="gst-calculator.php" class="text-blue-600 hover:text-blue-800">→ GST Calculator</a>
            <a href="profit-loss-calculator.php" class="text-blue-600 hover:text-blue-800">→ Profit & Loss Calculator</a>
        </div>
    </div>
</div>

<script>
function toggleFields() {
    const calcType = document.getElementById('calc_type').value;
    const basicFields = document.getElementById('basic_fields');
    const whatPercentFields = document.getElementById('what_percent_fields');
    
    if (calcType === 'what_percent') {
        basicFields.style.display = 'none';
        whatPercentFields.style.display = 'block';
    } else {
        basicFields.style.display = 'block';
        whatPercentFields.style.display = 'none';
    }
}
</script>

<?php require_once '../includes/footer.php'; ?>
