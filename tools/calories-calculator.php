<?php
require_once '../includes/config.php';
$page_title = get_page_title('Calories Burn Calculator');
$meta_description = "Calculate calories burned during exercise and activities. Free online calorie burn calculator.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $weight = floatval($_POST['weight']);
    $activity = $_POST['activity'];
    $duration = intval($_POST['duration']);
    $met_values = [
        'walking' => 3.5, 'jogging' => 7, 'running' => 9.8, 'cycling' => 8,
        'swimming' => 6, 'yoga' => 2.5, 'weightlifting' => 6, 'dancing' => 4.5
    ];
    if ($weight > 0 && $duration > 0) {
        $met = $met_values[$activity];
        $calories = ($met * 3.5 * $weight / 200) * $duration;
        $result = [
            'calories' => number_format($calories, 0),
            'activity' => ucfirst($activity),
            'duration' => $duration,
            'weight' => $weight
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Calories Burn Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Calculate calories burned during activities</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Your Weight (kg)</label><input type="number" name="weight" value="<?php echo $weight ?? ''; ?>" class="form-input" required step="0.1"></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Activity</label><select name="activity" class="form-input"><option value="walking">Walking</option><option value="jogging">Jogging</option><option value="running">Running</option><option value="cycling">Cycling</option><option value="swimming">Swimming</option><option value="yoga">Yoga</option><option value="weightlifting">Weightlifting</option><option value="dancing">Dancing</option></select></div>
            <div><label class="block text-gray-700 font-semibold mb-2">Duration (minutes)</label><input type="number" name="duration" value="<?php echo $duration ?? ''; ?>" class="form-input" required></div>
            <button type="submit" class="btn-primary w-full">Calculate Calories</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Calories Burned</h3>
            <p class="text-5xl font-bold mb-4"><?php echo $result['calories']; ?> cal</p>
            <p class="text-lg opacity-90"><?php echo $result['activity']; ?> for <?php echo $result['duration']; ?> minutes at <?php echo $result['weight']; ?> kg</p>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Calorie Burn</h2>
        <p class="text-gray-700 mb-4">Calories burned depend on your weight, activity type, intensity, and duration. This calculator uses MET (Metabolic Equivalent) values.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Formula</h3>
        <p class="text-gray-700">Calories = (MET × 3.5 × Weight in kg / 200) × Duration in minutes</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="age-calculator.php" class="text-blue-600 hover:text-blue-800">→ Age Calculator</a><a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a><a href="unit-converter.php" class="text-blue-600 hover:text-blue-800">→ Unit Converter</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
