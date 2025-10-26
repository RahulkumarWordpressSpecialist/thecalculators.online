<?php
require_once '../includes/config.php';
$page_title = get_page_title('SGPA to Percentage Calculator');
$meta_description = "Convert SGPA to percentage easily. Free online SGPA to percentage converter for students.";
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sgpa = floatval($_POST['sgpa']);
    if ($sgpa > 0 && $sgpa <= 10) {
        $percentage = ($sgpa - 0.75) * 10;
        $result = [
            'sgpa' => number_format($sgpa, 2),
            'percentage' => number_format($percentage, 2)
        ];
    }
}
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">SGPA to Percentage Calculator</h1>
    <p class="text-lg text-gray-600 mb-8">Convert your SGPA to percentage instantly</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" class="space-y-6">
            <div><label class="block text-gray-700 font-semibold mb-2">Enter SGPA (Out of 10)</label><input type="number" name="sgpa" value="<?php echo $sgpa ?? ''; ?>" class="form-input" required step="0.01" min="0" max="10" placeholder="e.g., 8.5"></div>
            <button type="submit" class="btn-primary w-full">Convert to Percentage</button>
        </form>
        <?php if ($result): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Conversion Result</h3>
            <div class="text-center">
                <p class="text-lg opacity-90 mb-2">SGPA: <?php echo $result['sgpa']; ?></p>
                <p class="text-5xl font-bold">≈ <?php echo $result['percentage']; ?>%</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">How to Convert SGPA to Percentage</h2>
        <p class="text-gray-700 mb-4">SGPA (Semester Grade Point Average) is commonly converted to percentage using the formula: Percentage = (SGPA - 0.75) × 10</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Conversion Formula</h3>
        <p class="text-gray-700 mb-4">Percentage = (SGPA - 0.75) × 10</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Example</h3>
        <p class="text-gray-700">If your SGPA is 8.5, then Percentage = (8.5 - 0.75) × 10 = 77.5%</p>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div><h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Is this conversion formula accurate?</h3><p class="text-gray-700">A: This is the most commonly used formula, but some universities may use different conversion methods.</p></div>
            <div><h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is a good SGPA?</h3><p class="text-gray-700">A: SGPA above 8.0 is generally considered excellent, 7.0-8.0 is good, and 6.0-7.0 is average.</p></div>
        </div>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a><a href="age-calculator.php" class="text-blue-600 hover:text-blue-800">→ Age Calculator</a><a href="word-count.php" class="text-blue-600 hover:text-blue-800">→ Word Count Tool</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
