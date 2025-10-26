<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}

$page_title = isset($page_title) ? $page_title : get_page_title();
$meta_description = isset($meta_description) ? $meta_description : get_meta_description();
$canonical_url = isset($canonical_url) ? $canonical_url : SITE_URL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QVYNLJQZ50"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QVYNLJQZ50');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : 'calculator, online tools, financial calculator, conversion tools, utility tools'; ?>">
    <meta name="author" content="<?php echo DEVELOPER_NAME; ?>">
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    
    <meta property="og:title" content="<?php echo $page_title; ?>">
    <meta property="og:description" content="<?php echo $meta_description; ?>">
    <meta property="og:url" content="<?php echo $canonical_url; ?>">
    <meta property="og:type" content="website">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $page_title; ?>">
    <meta name="twitter:description" content="<?php echo $meta_description; ?>">
    
    <title><?php echo $page_title; ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    
    <?php if (isset($schema_markup)): ?>
    <script type="application/ld+json">
    <?php echo $schema_markup; ?>
    </script>
    <?php endif; ?>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="<?php echo SITE_URL; ?>" class="text-2xl font-bold text-blue-600">
                    <i class="fas fa-calculator mr-2"></i><?php echo SITE_NAME; ?>
                </a>
                <div class="hidden md:flex space-x-6">
                    <a href="<?php echo SITE_URL; ?>" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="<?php echo SITE_URL; ?>/pages/about.php" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="<?php echo SITE_URL; ?>/pages/contact.php" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                    <a href="https://inrai.wp-fixhub.com/" class="text-gray-700 hover:text-blue-600 transition">INRAI</a>
                    <a href="https://inraivoice.wp-fixhub.com/" class="text-gray-700 hover:text-blue-600 transition">INRAI Voice</a>
                </div>
                <button id="mobile-menu-btn" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <a href="<?php echo SITE_URL; ?>" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
                <a href="<?php echo SITE_URL; ?>/pages/about.php" class="block py-2 text-gray-700 hover:text-blue-600">About</a>
                <a href="<?php echo SITE_URL; ?>/pages/contact.php" class="block py-2 text-gray-700 hover:text-blue-600">Contact</a>
                <a href="https://inrai.wp-fixhub.com/" class="block py-2 text-gray-700 hover:text-blue-600">INRAI</a>
                <a href="https://inraivoice.wp-fixhub.com/" class="block py-2 text-gray-700 hover:text-blue-600">inraivoice</a>

            </div>
        </nav>
    </header>
    <main class="min-h-screen">
