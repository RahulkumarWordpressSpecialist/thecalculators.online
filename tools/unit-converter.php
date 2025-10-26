<?php
require_once '../includes/config.php';

$page_title = get_page_title('Unit Converter');
$meta_description = "Free online unit converter for length, weight, temperature, volume, area, speed, and more. Convert units instantly.";
$keywords = "unit converter, conversion tool, length converter, weight converter, temperature converter";
$canonical_url = SITE_URL . '/tools/unit-converter.php';

$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $value = floatval($_POST['value']);
    $category = $_POST['category'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];
    
    $conversions = [
        'length' => [
            'meter' => 1,
            'kilometer' => 0.001,
            'centimeter' => 100,
            'millimeter' => 1000,
            'mile' => 0.000621371,
            'yard' => 1.09361,
            'foot' => 3.28084,
            'inch' => 39.3701
        ],
        'weight' => [
            'kilogram' => 1,
            'gram' => 1000,
            'milligram' => 1000000,
            'pound' => 2.20462,
            'ounce' => 35.274
        ],
        'temperature' => []
    ];
    
    if ($category == 'temperature') {
        if ($from_unit == 'celsius' && $to_unit == 'fahrenheit') {
            $result_value = ($value * 9/5) + 32;
        } elseif ($from_unit == 'fahrenheit' && $to_unit == 'celsius') {
            $result_value = ($value - 32) * 5/9;
        } elseif ($from_unit == 'celsius' && $to_unit == 'kelvin') {
            $result_value = $value + 273.15;
        } elseif ($from_unit == 'kelvin' && $to_unit == 'celsius') {
            $result_value = $value - 273.15;
        } else {
            $result_value = $value;
        }
    } else {
        $base_value = $value / $conversions[$category][$from_unit];
        $result_value = $base_value * $conversions[$category][$to_unit];
    }
    
    $result = number_format($result_value, 4);
}

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Unit Converter</h1>
    <p class="text-lg text-gray-600 mb-8">Convert between different units of measurement</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Category</label>
                <select name="category" id="category" class="form-input" onchange="updateUnits()">
                    <option value="length">Length</option>
                    <option value="weight">Weight</option>
                    <option value="temperature">Temperature</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Value</label>
                <input type="number" name="value" value="<?php echo $value ?? ''; ?>" class="form-input" required step="any" placeholder="Enter value">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">From</label>
                    <select name="from_unit" id="from_unit" class="form-input">
                        <option value="meter">Meter</option>
                        <option value="kilometer">Kilometer</option>
                        <option value="centimeter">Centimeter</option>
                        <option value="mile">Mile</option>
                        <option value="foot">Foot</option>
                        <option value="inch">Inch</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">To</label>
                    <select name="to_unit" id="to_unit" class="form-input">
                        <option value="meter">Meter</option>
                        <option value="kilometer">Kilometer</option>
                        <option value="centimeter">Centimeter</option>
                        <option value="mile">Mile</option>
                        <option value="foot">Foot</option>
                        <option value="inch">Inch</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn-primary w-full">Convert</button>
        </form>
        
        <?php if ($result !== ''): ?>
        <div class="result-box mt-6">
            <h3 class="text-2xl font-bold mb-4">Conversion Result</h3>
            <p class="text-3xl font-bold"><?php echo $value; ?> <?php echo $from_unit; ?> = <?php echo $result; ?> <?php echo $to_unit; ?></p>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Unit Conversion</h2>
        <p class="text-gray-700 mb-4">Unit conversion is the process of converting a measurement from one unit to another equivalent unit. Our tool supports multiple categories including length, weight, and temperature.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Supported Categories</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li><strong>Length:</strong> Meter, Kilometer, Centimeter, Mile, Foot, Inch</li>
            <li><strong>Weight:</strong> Kilogram, Gram, Milligram, Pound, Ounce</li>
            <li><strong>Temperature:</strong> Celsius, Fahrenheit, Kelvin</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">FAQs</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How accurate are the conversions?</h3>
                <p class="text-gray-700">A: Our conversions are highly accurate using standard conversion factors recognized internationally.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Can I convert between metric and imperial units?</h3>
                <p class="text-gray-700">A: Yes, the converter supports both metric and imperial (US/UK) units.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="currency-converter.php" class="text-blue-600 hover:text-blue-800">→ Currency Converter</a>
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
            <a href="age-calculator.php" class="text-blue-600 hover:text-blue-800">→ Age Calculator</a>
        </div>
    </div>
</div>

<script>
function updateUnits() {
    const category = document.getElementById('category').value;
    const fromUnit = document.getElementById('from_unit');
    const toUnit = document.getElementById('to_unit');
    
    let options = '';
    
    if (category === 'length') {
        options = '<option value="meter">Meter</option><option value="kilometer">Kilometer</option><option value="centimeter">Centimeter</option><option value="mile">Mile</option><option value="foot">Foot</option><option value="inch">Inch</option>';
    } else if (category === 'weight') {
        options = '<option value="kilogram">Kilogram</option><option value="gram">Gram</option><option value="milligram">Milligram</option><option value="pound">Pound</option><option value="ounce">Ounce</option>';
    } else if (category === 'temperature') {
        options = '<option value="celsius">Celsius</option><option value="fahrenheit">Fahrenheit</option><option value="kelvin">Kelvin</option>';
    }
    
    fromUnit.innerHTML = options;
    toUnit.innerHTML = options;
}
</script>

<?php require_once '../includes/footer.php'; ?>
