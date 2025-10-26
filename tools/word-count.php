<?php
require_once '../includes/config.php';

$page_title = get_page_title('Word Count Tool');
$meta_description = "Free online word counter tool. Count words, characters, sentences, and paragraphs instantly. Perfect for writers, students, and content creators.";
$keywords = "word counter, character counter, word count tool, count words, text analysis";
$canonical_url = SITE_URL . '/tools/word-count.php';

require_once '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Word Count Tool</h1>
    <p class="text-lg text-gray-600 mb-8">Count words, characters, sentences, and paragraphs in real-time</p>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Enter or Paste Your Text</label>
            <textarea 
                id="text-input" 
                class="form-input min-h-[300px] font-mono" 
                placeholder="Start typing or paste your text here..."
                oninput="countWords()"
            ></textarea>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Words</p>
                <p id="word-count" class="text-3xl font-bold text-blue-600">0</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Characters</p>
                <p id="char-count" class="text-3xl font-bold text-green-600">0</p>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Sentences</p>
                <p id="sentence-count" class="text-3xl font-bold text-purple-600">0</p>
            </div>
            <div class="bg-orange-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Paragraphs</p>
                <p id="paragraph-count" class="text-3xl font-bold text-orange-600">0</p>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Characters (no spaces)</p>
                <p id="char-no-space-count" class="text-2xl font-bold text-gray-700">0</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Reading Time</p>
                <p id="reading-time" class="text-2xl font-bold text-gray-700">0 min</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Speaking Time</p>
                <p id="speaking-time" class="text-2xl font-bold text-gray-700">0 min</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg text-center">
                <p class="text-gray-600 text-sm mb-1">Average Word Length</p>
                <p id="avg-word-length" class="text-2xl font-bold text-gray-700">0</p>
            </div>
        </div>
        
        <div class="flex gap-4">
            <button onclick="clearText()" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Clear Text</button>
            <button onclick="copyText()" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Copy Text</button>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">How to Use Word Counter Tool</h2>
        <p class="text-gray-700 mb-4">Simply type or paste your text into the text area above, and the word counter will automatically count words, characters, sentences, and paragraphs in real-time.</p>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Features</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
            <li><strong>Word Count:</strong> Total number of words in your text</li>
            <li><strong>Character Count:</strong> Total characters including spaces</li>
            <li><strong>Character Count (No Spaces):</strong> Characters excluding spaces</li>
            <li><strong>Sentence Count:</strong> Number of sentences in your text</li>
            <li><strong>Paragraph Count:</strong> Number of paragraphs in your text</li>
            <li><strong>Reading Time:</strong> Estimated time to read (based on 200 words/minute)</li>
            <li><strong>Speaking Time:</strong> Estimated time to speak (based on 130 words/minute)</li>
            <li><strong>Average Word Length:</strong> Average length of words used</li>
        </ul>
        
        <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Use Cases</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Students writing essays and assignments with word limits</li>
            <li>Writers and authors tracking manuscript length</li>
            <li>Content creators optimizing SEO content</li>
            <li>Social media managers staying within character limits</li>
            <li>Bloggers ensuring optimal post length</li>
            <li>Translators calculating translation costs</li>
        </ul>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How does the word counter work?</h3>
                <p class="text-gray-700">A: The tool splits your text by spaces and counts each word. It uses smart algorithms to identify sentences and paragraphs accurately.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: What is a good word count for a blog post?</h3>
                <p class="text-gray-700">A: For SEO purposes, blog posts typically range from 1000-2500 words, with longer, in-depth articles (2000+ words) often ranking better in search results.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: Does this tool save my text?</h3>
                <p class="text-gray-700">A: No, all counting happens in your browser. Your text is not sent to any server, ensuring complete privacy.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Q: How is reading time calculated?</h3>
                <p class="text-gray-700">A: Reading time is calculated based on an average reading speed of 200 words per minute for silent reading.</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Related Tools</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="percentage-calculator.php" class="text-blue-600 hover:text-blue-800">→ Percentage Calculator</a>
            <a href="age-calculator.php" class="text-blue-600 hover:text-blue-800">→ Age Calculator</a>
            <a href="unit-converter.php" class="text-blue-600 hover:text-blue-800">→ Unit Converter</a>
        </div>
    </div>
</div>

<script>
function countWords() {
    const text = document.getElementById('text-input').value;
    
    const words = text.trim() ? text.trim().split(/\s+/).filter(word => word.length > 0) : [];
    const wordCount = words.length;
    
    const charCount = text.length;
    
    const charNoSpaceCount = text.replace(/\s/g, '').length;
    
    const sentences = text.split(/[.!?]+/).filter(sentence => sentence.trim().length > 0);
    const sentenceCount = sentences.length;
    
    const paragraphs = text.split(/\n+/).filter(para => para.trim().length > 0);
    const paragraphCount = paragraphs.length;
    
    const readingTime = Math.ceil(wordCount / 200);
    
    const speakingTime = Math.ceil(wordCount / 130);
    
    const avgWordLength = wordCount > 0 ? (charNoSpaceCount / wordCount).toFixed(1) : 0;
    
    document.getElementById('word-count').textContent = wordCount;
    document.getElementById('char-count').textContent = charCount;
    document.getElementById('char-no-space-count').textContent = charNoSpaceCount;
    document.getElementById('sentence-count').textContent = sentenceCount;
    document.getElementById('paragraph-count').textContent = paragraphCount;
    document.getElementById('reading-time').textContent = readingTime + ' min';
    document.getElementById('speaking-time').textContent = speakingTime + ' min';
    document.getElementById('avg-word-length').textContent = avgWordLength;
}

function clearText() {
    document.getElementById('text-input').value = '';
    countWords();
}

function copyText() {
    const text = document.getElementById('text-input');
    text.select();
    document.execCommand('copy');
    alert('Text copied to clipboard!');
}
</script>

<?php require_once '../includes/footer.php'; ?>
