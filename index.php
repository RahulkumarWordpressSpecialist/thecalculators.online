<?php
require_once 'includes/config.php';

$page_title = get_page_title();
$meta_description = "Free online calculators and tools including financial calculators, ecommerce tools, conversion calculators, and more. Fast, accurate, and SEO-friendly.";
$keywords = "online calculator, financial calculator, EMI calculator, GST calculator, percentage calculator, unit converter, age calculator, tools online";

$tools = [
    'financial' => [
        ['name' => 'Loan EMI Calculator', 'url' => 'tools/loan-emi-calculator.php', 'icon' => 'fa-coins', 'desc' => 'Calculate monthly EMI for loans'],
        ['name' => 'GST Calculator', 'url' => 'tools/gst-calculator.php', 'icon' => 'fa-file-invoice-dollar', 'desc' => 'Calculate GST inclusive and exclusive amounts'],
        ['name' => 'Auto Loan Calculator', 'url' => 'tools/auto-loan-calculator.php', 'icon' => 'fa-car', 'desc' => 'Calculate car loan EMI and total interest'],
        ['name' => 'Brokerage Calculator', 'url' => 'tools/brokerage-calculator.php', 'icon' => 'fa-chart-line', 'desc' => 'Calculate stock trading brokerage fees'],
        ['name' => 'SIP Calculator', 'url' => 'tools/sip-calculator.php', 'icon' => 'fa-piggy-bank', 'desc' => 'Calculate SIP returns and maturity amount'],
        ['name' => 'Income Tax Calculator', 'url' => 'tools/income-tax-calculator.php', 'icon' => 'fa-calculator', 'desc' => 'Calculate income tax liability'],
        ['name' => 'CAGR Calculator', 'url' => 'tools/cagr-calculator.php', 'icon' => 'fa-chart-area', 'desc' => 'Calculate compound annual growth rate'],
        ['name' => 'FD Calculator', 'url' => 'tools/fd-calculator.php', 'icon' => 'fa-university', 'desc' => 'Calculate fixed deposit maturity amount'],
    ],
    'ecommerce' => [
        ['name' => 'Ecommerce Calculator', 'url' => 'tools/ecommerce-calculator.php', 'icon' => 'fa-shopping-cart', 'desc' => 'Calculate ecommerce profit margins'],
         ['name' => 'Advance ecommerce-calculator', 'url' => 'tools/Invoice/index.php', 'icon' => 'fa-shopping-cart', 'desc' => 'Analyze costs, margins, breakeven & get smart pricing tips.
'],
        ['name' => 'Cashback Calculator', 'url' => 'tools/cashback-calculator.php', 'icon' => 'fa-wallet', 'desc' => 'Calculate cashback and savings'],
        ['name' => 'Margin Calculator', 'url' => 'tools/margin-calculator.php', 'icon' => 'fa-percent', 'desc' => 'Calculate profit margin and markup'],
        ['name' => 'Profit & Loss Calculator', 'url' => 'tools/profit-loss-calculator.php', 'icon' => 'fa-balance-scale', 'desc' => 'Calculate profit or loss percentage'],
        ['name' => 'Risk Reward Ratio Calculator', 'url' => 'tools/risk-reward-calculator.php', 'icon' => 'fa-scale-balanced', 'desc' => 'Calculate trading risk reward ratio'],
        ['name' => 'Position Size Calculator', 'url' => 'tools/position-size-calculator.php', 'icon' => 'fa-calculator', 'desc' => 'Calculate optimal position size for trading'],
    ],
    'conversion' => [
        ['name' => 'Percentage Calculator', 'url' => 'tools/percentage-calculator.php', 'icon' => 'fa-percentage', 'desc' => 'Calculate percentages easily'],
        ['name' => 'Unit Converter', 'url' => 'tools/unit-converter.php', 'icon' => 'fa-exchange-alt', 'desc' => 'Convert units of measurement'],
        ['name' => 'Currency Converter', 'url' => 'tools/currency-converter.php', 'icon' => 'fa-money-bill-wave', 'desc' => 'Convert currency rates in real-time'],
        ['name' => 'SGPA to Percentage Calculator', 'url' => 'tools/sgpa-to-percentage.php', 'icon' => 'fa-graduation-cap', 'desc' => 'Convert SGPA to percentage'],
    ],
    'utility' => [
        ['name' => 'Age Calculator', 'url' => 'tools/age-calculator.php', 'icon' => 'fa-birthday-cake', 'desc' => 'Calculate your exact age'],
        ['name' => 'Image Compress Tool', 'url' => 'tools/image-compress.php', 'icon' => 'fa-image', 'desc' => 'Compress images for faster loading'],
        ['name' => 'PDF Compress Tool', 'url' => 'tools/pdf-compress.php', 'icon' => 'fa-file-pdf', 'desc' => 'Compress PDF files easily'],
        ['name' => 'Word Count Tool', 'url' => 'tools/word-count.php', 'icon' => 'fa-font', 'desc' => 'Count words and characters'],
        ['name' => 'Calories Burn Calculator', 'url' => 'tools/calories-calculator.php', 'icon' => 'fa-fire', 'desc' => 'Calculate calories burned during activities'],
    ]
];

$schema_markup = json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => SITE_NAME,
    "url" => SITE_URL,
    "description" => $meta_description,
    "potentialAction" => [
        "@type" => "SearchAction",
        "target" => SITE_URL . "?search={search_term_string}",
        "query-input" => "required name=search_term_string"
    ]
]);

require_once 'includes/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">The Calculators Online</h1>
        <p class="text-xl text-gray-600 mb-8">All types of calculators and online tools in one place</p>
        
        <div class="search-box">
            <div class="relative">
                <input 
                    type="text" 
                    id="search-tools" 
                    placeholder="Search for calculators and tools..." 
                    class="form-input pl-12"
                >
                <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
            </div>
        </div>
    </div>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><i class="fas fa-fire text-orange-500 mr-2"></i>Popular Calculators</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $popular = array_merge(
                array_slice($tools['financial'], 0, 2),
                array_slice($tools['ecommerce'], 0, 1),
                array_slice($tools['conversion'], 0, 1)
            );
            foreach ($popular as $tool): ?>
                <div>
                    <a href="<?php echo $tool['url']; ?>" class="calculator-card block bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl">
                        <i class="fas <?php echo $tool['icon']; ?> tool-icon"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $tool['name']; ?></h3>
                        <p class="text-gray-600"><?php echo $tool['desc']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><i class="fas fa-chart-line text-green-500 mr-2"></i>Financial Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($tools['financial'] as $tool): ?>
                <div>
                    <a href="<?php echo $tool['url']; ?>" class="calculator-card block bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl">
                        <i class="fas <?php echo $tool['icon']; ?> tool-icon"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $tool['name']; ?></h3>
                        <p class="text-gray-600"><?php echo $tool['desc']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><i class="fas fa-shopping-bag text-purple-500 mr-2"></i>Ecommerce & Business Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($tools['ecommerce'] as $tool): ?>
                <div>
                    <a href="<?php echo $tool['url']; ?>" class="calculator-card block bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl">
                        <i class="fas <?php echo $tool['icon']; ?> tool-icon"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $tool['name']; ?></h3>
                        <p class="text-gray-600"><?php echo $tool['desc']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><i class="fas fa-exchange-alt text-blue-500 mr-2"></i>Conversion Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($tools['conversion'] as $tool): ?>
                <div>
                    <a href="<?php echo $tool['url']; ?>" class="calculator-card block bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl">
                        <i class="fas <?php echo $tool['icon']; ?> tool-icon"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $tool['name']; ?></h3>
                        <p class="text-gray-600"><?php echo $tool['desc']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><i class="fas fa-tools text-red-500 mr-2"></i>Utility Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($tools['utility'] as $tool): ?>
                <div>
                    <a href="<?php echo $tool['url']; ?>" class="calculator-card block bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl">
                        <i class="fas <?php echo $tool['icon']; ?> tool-icon"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $tool['name']; ?></h3>
                        <p class="text-gray-600"><?php echo $tool['desc']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php require_once 'includes/footer.php'; ?>
