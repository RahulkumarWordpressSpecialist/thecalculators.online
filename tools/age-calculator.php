<?php
require_once '../includes/config.php';

$page_title = get_page_title('Age Calculator');
$meta_description = "Calculate your exact age in years, months, days, hours, and minutes. Free online age calculator with accurate results.";
$keywords = "age calculator, calculate age, age in days, age in months, birthday calculator";
$canonical_url = SITE_URL . '/tools/age-calculator.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dob = $_POST['dob'];
    $current_date = $_POST['current_date'] ?: date('Y-m-d');
    
    if ($dob) {
        $birth = new DateTime($dob);
        $today = new DateTime($current_date);
        $age = $birth->diff($today);
        
        $total_days = $birth->diff($today)->days;
        $total_months = ($age->y * 12) + $age->m;
        $total_weeks = floor($total_days / 7);
        $total_hours = $total_days * 24;
        $total_minutes = $total_hours * 60;
        
        $next_birthday = new DateTime($birth->format('Y') . '-' . $birth->format('m-d'));
        if ($next_birthday < $today) {
            $next_birthday->modify('+1 year');
        }
        $days_to_birthday = $today->diff($next_birthday)->days;
        
        $result = [
            'years' => $age->y,
            'months' => $age->m,
            'days' => $age->d,
            'total_days' => $total_days,
            'total_months' => $total_months,
            'total_weeks' => $total_weeks,
            'total_hours' => number_format($total_hours),
            'total_minutes' => number_format($total_minutes),
            'next_birthday' => $next_birthday->format('F d, Y'),
            'days_to_birthday' => $days_to_birthday
        ];
    }
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Age Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate your exact age in years, months, days, and more</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                <input type="date" name="dob" class="form-input" required value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''; ?>">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Calculate Age As On (Optional)</label>
                <input type="date" name="current_date" class="form-input" value="<?php echo isset($_POST['current_date']) ? $_POST['current_date'] : date('Y-m-d'); ?>">
                <p class="text-sm text-gray-500 mt-1">Leave blank to calculate current age</p>
            </div>
            
            <button type="submit" class="btn-primary w-full">Calculate Age</button>
        </form>
        
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Your Age</h3>
            <div class="text-center mb-6">
                <p class="text-5xl font-bold mb-2"><?php echo $result['years']; ?> Years</p>
                <p class="text-2xl opacity-90"><?php echo $result['months']; ?> Months, <?php echo $result['days']; ?> Days</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                <div class="text-center">
                    <p class="text-sm opacity-80">Total Months</p>
                    <p class="text-2xl font-bold"><?php echo $result['total_months']; ?></p>
                </div>
                <div class="text-center">
                    <p class="text-sm opacity-80">Total Weeks</p>
                    <p class="text-2xl font-bold"><?php echo $result['total_weeks']; ?></p>
                </div>
                <div class="text-center">
                    <p class="text-sm opacity-80">Total Days</p>
                    <p class="text-2xl font-bold"><?php echo $result['total_days']; ?></p>
                </div>
                <div class="text-center">
                    <p class="text-sm opacity-80">Total Hours</p>
                    <p class="text-2xl font-bold"><?php echo $result['total_hours']; ?></p>
                </div>
            </div>
            
            <div class="mt-6 pt-6 border-t border-white border-opacity-30">
                <p class="text-lg">Next Birthday: <strong><?php echo $result['next_birthday']; ?></strong></p>
                <p class="text-lg mt-2">Days Until Birthday: <strong><?php echo $result['days_to_birthday']; ?> days</strong></p>
            </div>
        </div>
        
        <div class="mt-6 flex gap-4 justify-center">
            <button onclick="shareOnSocial('facebook', '<?php echo $canonical_url; ?>', 'Age Calculator')" class="text-blue-600 hover:text-blue-800">
                <i class="fab fa-facebook fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('twitter', '<?php echo $canonical_url; ?>', 'Age Calculator')" class="text-blue-400 hover:text-blue-600">
                <i class="fab fa-twitter fa-2x"></i>
            </button>
            <button onclick="shareOnSocial('whatsapp', '<?php echo $canonical_url; ?>', 'Age Calculator')" class="text-green-600 hover:text-green-800">
                <i class="fab fa-whatsapp fa-2x"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">How Age is Calculated</h2>
        <p class="text-gray-700 mb-4">Age is typically measured in years from the date of birth to the current date. This calculator provides your exact age in multiple formats including years, months, days, weeks, hours, and even minutes.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Features of Our Age Calculator</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li>Calculate exact age in years, months, and days</li>
            <li>View total age in months, weeks, days, hours, and minutes</li>
            <li>Find out when your next birthday is</li>
            <li>Calculate days remaining until your next birthday</li>
            <li>Option to calculate age as on any specific date</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Why Calculate Age?</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Fill age-related forms and documents</li>
            <li>Plan birthday celebrations</li>
            <li>Calculate retirement age</li>
            <li>Determine eligibility for various programs</li>
            <li>Track milestones and anniversaries</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How accurate is this age calculator?</h3>
                <p class="text-gray-700">A: This calculator is 100% accurate. It uses precise date calculations to determine your exact age down to the day.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Can I calculate age for a future date?</h3>
                <p class="text-gray-700">A: Yes, you can select any date in the "Calculate Age As On" field to find out how old you will be on that future date.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Why does my age in months differ from years × 12?</h3>
                <p class="text-gray-700">A: The total months calculation accounts for partial months, while years × 12 only counts complete years.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="unit-converter.php" class="text-blue-600 hover:text-blue-800">→ Unit Converter</a>
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
            <a href="word-count.php" class="text-blue-600 hover:text-blue-800">→ Word Count Tool</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
