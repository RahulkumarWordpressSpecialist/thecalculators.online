<?php
define('SITE_NAME', 'The Calculators Online');
define('SITE_URL', 'https://thecalculators.online');
define('SITE_EMAIL', 'help@thecalculators.online');
define('SITE_PHONE', '9113451527');
define('DEVELOPER_NAME', 'Rahul Kumar');
define('DEVELOPER_URL', 'https://rahul.wp-fixhub.com');

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_page_title($page = '') {
    return $page ? $page . ' - ' . SITE_NAME : SITE_NAME . ' - All Types of Calculators and Tools';
}

function get_meta_description($desc = '') {
    return $desc ? $desc : 'Free online calculators and tools including financial calculators, conversion tools, utility tools, and more. Fast, accurate, and easy to use.';
}
?>
