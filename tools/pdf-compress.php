<?php
require_once '../includes/config.php';
$page_title = get_page_title('PDF Compress Tool');
$meta_description = "Compress PDF files online for free. Reduce PDF file size quickly and easily.";
require_once '../includes/header.php';
?>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">PDF Compress Tool</h1>
    <p class="text-lg text-gray-600 mb-8">Compress and reduce PDF file size online</p>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center">
            <i class="fas fa-file-pdf text-6xl text-red-400 mb-4"></i>
            <p class="text-xl text-gray-600 mb-4">PDF compression requires server-side processing</p>
            <p class="text-gray-500">This feature would compress PDFs using Ghostscript or similar tools</p>
            <div class="mt-6 text-left bg-gray-50 p-6 rounded">
                <h3 class="font-semibold mb-2">Implementation would include:</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Upload PDF file</li>
                    <li>Compress with quality options (Low, Medium, High)</li>
                    <li>Download compressed PDF</li>
                    <li>Show before/after file sizes</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Why Compress PDFs?</h2>
        <p class="text-gray-700 mb-4">PDF compression helps reduce file size for easier sharing via email and faster uploads.</p>
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Benefits</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2"><li>Email PDFs without size limits</li><li>Faster upload and download</li><li>Save storage space</li><li>Maintain document quality</li></ul>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8"><h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3><div class="grid grid-cols-1 md:grid-cols-3 gap-4"><a href="image-compress.php" class="text-blue-600 hover:text-blue-800">→ Image Compress Tool</a><a href="word-count.php" class="text-blue-600 hover:text-blue-800">→ Word Count Tool</a><a href="unit-converter.php" class="text-blue-600 hover:text-blue-800">→ Unit Converter</a></div></div>
</div>
<?php require_once '../includes/footer.php'; ?>
